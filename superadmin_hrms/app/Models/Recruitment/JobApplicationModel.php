<?php

namespace App\Models\Recruitment;

use CodeIgniter\Model;

class JobApplicationModel extends Model
{
    protected $table = 'job_applications';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'requisition_id',
        'user_id',
        'candidate_name',
        'candidate_email',
        'phone',
        'current_company',
        'experience_years',
        'current_location',
        'linkedin_url',
        'portfolio_url',
        'cover_letter',
        'resume_file',
        'resume_original_name',
        'application_source',
        'screening_decision',
        'screening_notes',
        'shortlisted_at',
        'interview_round',
        'interview_date',
        'interview_mode',
        'interviewer_name',
        'interview_notes',
        'technical_score',
        'communication_score',
        'culture_score',
        'total_score',
        'evaluation_status',
        'rejection_reason',
        'evaluated_at',
        'selected_at',
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
        // Candidate screens need application, employee, and job data in one row.
        return $this->select(
                'job_applications.*,
                job_applications.id AS application_id,
                job_applications.status AS application_status,
                users.employee_id,
                users.name,
                users.email,
                job_requisitions.job_title,
                job_requisitions.department,
                job_requisitions.location'
            )
            ->join('users', 'users.id = job_applications.user_id')
            ->join('job_requisitions', 'job_requisitions.id = job_applications.requisition_id')
            ->orderBy('job_applications.applied_at', 'DESC')
            ->findAll();
    }

    public function getApplicationWithDetails(int $applicationId): ?array
    {
        // The profile page uses one complete joined record for the Phase 3 workflow.
        return $this->select(
                'job_applications.*,
                job_applications.id AS application_id,
                job_applications.status AS application_status,
                users.employee_id,
                users.name,
                users.email,
                job_requisitions.requisition_no,
                job_requisitions.job_title,
                job_requisitions.department,
                job_requisitions.location,
                job_requisitions.employment_type,
                job_requisitions.experience,
                job_requisitions.education'
            )
            ->join('users', 'users.id = job_applications.user_id')
            ->join('job_requisitions', 'job_requisitions.id = job_applications.requisition_id')
            ->where('job_applications.id', $applicationId)
            ->first();
    }

    public function hasApplied(int $requisitionId, int $userId): bool
    {
        return $this->where('requisition_id', $requisitionId)
            ->where('user_id', $userId)
            ->countAllResults() > 0;
    }

    public function getAppliedJobIds($userId)
    {
        return $this->where('user_id', $userId)
            ->findColumn('requisition_id');
    }
}
