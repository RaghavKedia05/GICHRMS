<?php

namespace App\Models;

use CodeIgniter\Model;

class AttendanceModel extends Model
{
    protected $table = 'attendance_records';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'company_id', 'user_id', 'attendance_date', 'check_in', 'check_out',
        'break_started_at', 'break_minutes', 'status', 'notes',
    ];

    public function forUserDate(int $companyId, int $userId, string $date): ?array
    {
        return $this->where('company_id', $companyId)->where('user_id', $userId)
            ->where('attendance_date', $date)->first();
    }
}
