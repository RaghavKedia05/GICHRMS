<?php

namespace App\Libraries;

use App\Models\CompanyEmailSettingModel;

class CompanyEmailService
{
    private CompanyEmailSettingModel $settingsModel;
    private string $lastError = '';

    public function __construct()
    {
        $this->settingsModel = new CompanyEmailSettingModel();
    }

    public function hasEncryptionKey(): bool
    {
        return trim((string) config('Encryption')->key) !== '';
    }

    public function encryptPassword(string $password): string
    {
        if (!$this->hasEncryptionKey()) {
            throw new \RuntimeException('The application encryption key is not configured. Run "php spark key:generate" first.');
        }

        return base64_encode(service('encrypter')->encrypt($password));
    }

    public function sendForCompany(
        int $companyId,
        string $recipient,
        string $subject,
        string $htmlMessage,
        ?string $replyToEmail = null,
        ?string $replyToName = null
    ): bool {
        $this->lastError = '';
        $settings = $this->settingsModel->forCompany($companyId);

        if (!$settings || !(int) ($settings['is_active'] ?? 0)) {
            return $this->fail('Outbound email is not configured or is disabled for this company.');
        }

        if (!filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            return $this->fail('The recipient email address is invalid.');
        }

        try {
            $password = $this->decryptPassword((string) ($settings['smtp_password_encrypted'] ?? ''));

            $email = service('email');
            $email->clear(true);
            $email->initialize([
                'protocol' => 'smtp',
                'SMTPHost' => trim((string) $settings['smtp_host']),
                'SMTPUser' => trim((string) $settings['smtp_username']),
                'SMTPPass' => $password,
                'SMTPPort' => (int) $settings['smtp_port'],
                'SMTPCrypto' => ($settings['smtp_encryption'] ?? 'tls') === 'none'
                    ? ''
                    : (string) $settings['smtp_encryption'],
                'SMTPTimeout' => 15,
                'mailType' => 'html',
                'charset' => 'UTF-8',
                'newline' => "\r\n",
                'CRLF' => "\r\n",
                'validate' => true,
            ]);
            $email->setFrom((string) $settings['from_email'], (string) $settings['from_name']);

            if ($replyToEmail && filter_var($replyToEmail, FILTER_VALIDATE_EMAIL)) {
                $email->setReplyTo($replyToEmail, $replyToName ?: $replyToEmail);
            }

            $email->setTo($recipient);
            $email->setSubject($subject);
            $email->setMessage($htmlMessage);

            if (!$email->send()) {
                return $this->fail('The SMTP server rejected the message. Verify the server, port, encryption, username and app password.');
            }

            return true;
        } catch (\Throwable $e) {
            log_message('error', 'Company email delivery failed for company {companyId}: {message}', [
                'companyId' => $companyId,
                'message' => $e->getMessage(),
            ]);

            return $this->fail($e->getMessage());
        }
    }

    public function getLastError(): string
    {
        return $this->lastError;
    }

    private function decryptPassword(string $encryptedPassword): string
    {
        if (!$this->hasEncryptionKey()) {
            throw new \RuntimeException('The application encryption key is not configured.');
        }

        $decoded = base64_decode($encryptedPassword, true);

        if ($decoded === false || $decoded === '') {
            throw new \RuntimeException('The saved SMTP password is invalid. Save the company email settings again.');
        }

        return service('encrypter')->decrypt($decoded);
    }

    private function fail(string $message): bool
    {
        $this->lastError = $message;
        return false;
    }
}
