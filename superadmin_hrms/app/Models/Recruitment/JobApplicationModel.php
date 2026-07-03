<?php

namespace App\Models\Recruitment;

use CodeIgniter\Model;

class JobApplicationModel extends Model
{
    protected $table = 'job_applications';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'requisition_id',
        'user_id',
        'status',
        'applied_at',
    ];
    protected $useTimestamps = false;

    public function getApplicationsByUser(int $userId)
    {
        return $this->where('user_id', $userId)
            ->orderBy('applied_at', 'DESC')
            ->findAll();
    }

    public function getApplicationsWithDetails(): array
    {
        return $this->select(
                'job_applications.id as application_id, job_applications.status as application_status, ' .
                'job_applications.applied_at, users.id as user_id, users.employee_id, users.name as candidate_name, ' .
                'users.email as candidate_email, job_requisitions.id as requisition_id, job_requisitions.job_title, ' .
                'job_requisitions.department, job_requisitions.location'
            )
            ->join('users', 'users.id = job_applications.user_id')
            ->join('job_requisitions', 'job_requisitions.id = job_applications.requisition_id')
            ->orderBy('job_applications.applied_at', 'DESC')
            ->findAll();
    }

    public function hasApplied(int $requisitionId, int $userId): bool
    {
        return $this->where('requisition_id', $requisitionId)
            ->where('user_id', $userId)
            ->countAllResults() > 0;
    }
}
