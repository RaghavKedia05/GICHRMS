<?php

namespace App\Models;

use CodeIgniter\Model;

class CompanyEmailSettingModel extends Model
{
    protected $table = 'company_email_settings';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'company_id',
        'from_name',
        'from_email',
        'smtp_host',
        'smtp_port',
        'smtp_encryption',
        'smtp_username',
        'smtp_password_encrypted',
        'is_active',
        'last_tested_at',
        'last_test_status',
        'last_test_error',
    ];

    public function forCompany(int $companyId): ?array
    {
        return $this->where('company_id', $companyId)->first();
    }
}
