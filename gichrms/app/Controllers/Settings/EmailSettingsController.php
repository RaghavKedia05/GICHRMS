<?php

namespace App\Controllers\Settings;

use App\Controllers\BaseController;
use App\Libraries\CompanyEmailService;
use App\Models\CompanyEmailSettingModel;
use App\Models\CompanyModel;
use App\Models\UserModel;

class EmailSettingsController extends BaseController
{
    private CompanyModel $companyModel;
    private CompanyEmailSettingModel $settingsModel;
    private CompanyEmailService $emailService;

    public function __construct()
    {
        $this->companyModel = new CompanyModel();
        $this->settingsModel = new CompanyEmailSettingModel();
        $this->emailService = new CompanyEmailService();
    }

    public function index()
    {
        if (!$this->canManageEmailSettings()) {
            return $this->accessDenied();
        }

        $companyId = $this->currentCompanyId();
        $company = $this->companyModel->find($companyId);

        if (!$company) {
            return redirect()->to('/dashboard')->with('error', 'Your account is not linked to a company.');
        }

        $settings = $this->settingsModel->forCompany($companyId);

        return view('Settings/email', [
            'company' => $company,
            'settings' => $settings,
            'hasSavedPassword' => !empty($settings['smtp_password_encrypted']),
            'hasEncryptionKey' => $this->emailService->hasEncryptionKey(),
        ]);
    }

    public function save()
    {
        if (!$this->canManageEmailSettings()) {
            return $this->accessDenied();
        }

        $companyId = $this->currentCompanyId();
        $existing = $this->settingsModel->forCompany($companyId);
        $password = trim((string) $this->request->getPost('smtp_password'));

        $rules = [
            'company_name' => 'required|min_length[2]|max_length[150]',
            'from_name' => 'required|min_length[2]|max_length[150]',
            'from_email' => 'required|valid_email|max_length[190]',
            'smtp_host' => 'required|max_length[190]',
            'smtp_port' => 'required|integer|greater_than_equal_to[1]|less_than_equal_to[65535]',
            'smtp_encryption' => 'required|in_list[tls,ssl,none]',
            'smtp_username' => 'required|max_length[190]',
        ];

        if (!$existing || empty($existing['smtp_password_encrypted'])) {
            $rules['smtp_password'] = 'required|min_length[8]';
        } elseif ($password !== '') {
            $rules['smtp_password'] = 'min_length[8]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        if (!$this->emailService->hasEncryptionKey()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Generate the application encryption key before saving SMTP credentials.');
        }

        $payload = [
            'company_id' => $companyId,
            'from_name' => trim((string) $this->request->getPost('from_name')),
            'from_email' => strtolower(trim((string) $this->request->getPost('from_email'))),
            'smtp_host' => strtolower(trim((string) $this->request->getPost('smtp_host'))),
            'smtp_port' => (int) $this->request->getPost('smtp_port'),
            'smtp_encryption' => (string) $this->request->getPost('smtp_encryption'),
            'smtp_username' => trim((string) $this->request->getPost('smtp_username')),
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
            'last_test_status' => null,
            'last_test_error' => null,
        ];

        try {
            if ($password !== '') {
                $payload['smtp_password_encrypted'] = $this->emailService->encryptPassword($password);
            }

            $this->companyModel->update($companyId, [
                'name' => trim((string) $this->request->getPost('company_name')),
            ]);

            if ($existing) {
                $this->settingsModel->update((int) $existing['id'], $payload);
            } else {
                $this->settingsModel->insert($payload);
            }
        } catch (\Throwable $e) {
            log_message('error', 'Could not save company email settings: ' . $e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Email settings could not be saved securely.');
        }

        return redirect()->to('/settings/email')
            ->with('success', 'Company email settings saved. Send a test email before using them for candidates.');
    }

    public function test()
    {
        if (!$this->canManageEmailSettings()) {
            return $this->accessDenied();
        }

        $testEmail = trim((string) $this->request->getPost('test_email'));

        if (!filter_var($testEmail, FILTER_VALIDATE_EMAIL)) {
            return redirect()->back()->with('error', 'Enter a valid recipient for the test email.');
        }

        $companyId = $this->currentCompanyId();
        $company = $this->companyModel->find($companyId);
        $sent = $this->emailService->sendForCompany(
            $companyId,
            $testEmail,
            'Test email from ' . ($company['name'] ?? 'your company'),
            '<div style="font-family:Arial,sans-serif;line-height:1.6;color:#334155">'
                . '<h2 style="color:#0f172a">Company email settings are working</h2>'
                . '<p>This test confirms that your HRMS can send recruitment emails using the configured company mailbox.</p>'
                . '<p><strong>Company:</strong> ' . esc($company['name'] ?? 'Company') . '</p>'
                . '</div>'
        );

        $settings = $this->settingsModel->forCompany($companyId);
        if ($settings) {
            $this->settingsModel->update((int) $settings['id'], [
                'last_tested_at' => date('Y-m-d H:i:s'),
                'last_test_status' => $sent ? 'success' : 'failed',
                'last_test_error' => $sent ? null : substr($this->emailService->getLastError(), 0, 500),
            ]);
        }

        if (!$sent) {
            return redirect()->back()->with('error', 'Test email failed: ' . $this->emailService->getLastError());
        }

        return redirect()->back()->with('success', 'Test email sent successfully to ' . $testEmail . '.');
    }

    private function currentCompanyId(): int
    {
        $companyId = (int) session('company_id');

        if ($companyId > 0) {
            return $companyId;
        }

        $user = (new UserModel())->find((int) session('user_id'));
        $companyId = (int) ($user['company_id'] ?? 0);

        if ($companyId > 0) {
            session()->set('company_id', $companyId);
        }

        return $companyId;
    }

    private function canManageEmailSettings(): bool
    {
        return in_array(session('role'), ['superadmin', 'admin', 'hr'], true);
    }

    private function accessDenied()
    {
        return redirect()->to('/dashboard')
            ->with('error', 'Only Admin and HR users can manage company email settings.');
    }
}
