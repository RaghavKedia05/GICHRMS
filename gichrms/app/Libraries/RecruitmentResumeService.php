<?php

namespace App\Libraries;

use CodeIgniter\HTTP\Files\UploadedFile;

class RecruitmentResumeService
{
    private const MAX_BYTES = 5 * 1024 * 1024;
    private const EXTENSIONS = ['pdf', 'doc', 'docx'];
    private const MIME_TYPES = [
        'application/pdf',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/octet-stream',
    ];

    public function store(?UploadedFile $resume): array
    {
        if (!$resume || !$resume->isValid() || $resume->getSize() > self::MAX_BYTES) {
            return ['error' => 'Please upload a valid resume no larger than 5 MB.'];
        }

        $extension = strtolower((string) $resume->getClientExtension());
        if (!in_array($extension, self::EXTENSIONS, true) || !in_array($resume->getMimeType(), self::MIME_TYPES, true)) {
            return ['error' => 'Resume must be a PDF, DOC, or DOCX file.'];
        }

        $uploadPath = ROOTPATH . 'public/uploads/resumes';
        if (!is_dir($uploadPath) && !mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
            return ['error' => 'Resume storage is temporarily unavailable.'];
        }

        $storedName = $resume->getRandomName();
        $originalName = basename($resume->getClientName());

        try {
            $resume->move($uploadPath, $storedName);
        } catch (\Throwable $exception) {
            log_message('error', 'Resume upload failed: {message}', ['message' => $exception->getMessage()]);
            return ['error' => 'Resume upload failed. Please try again.'];
        }

        return [
            'stored_name' => $storedName,
            'original_name' => $originalName,
            'path' => $uploadPath . DIRECTORY_SEPARATOR . $storedName,
        ];
    }
}
