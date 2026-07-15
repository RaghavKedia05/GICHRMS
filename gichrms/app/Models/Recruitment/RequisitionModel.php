<?php

namespace App\Models\Recruitment;

use CodeIgniter\Model;

class RequisitionModel extends Model
{
    protected $table = 'job_requisitions';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'company_id',
        'requisition_no',
        'job_title',
        'department',
        'request_date',
        'vacancies',
        'target_hire_date',
        'employment_type',
        'work_mode',
        'location',
        'reason_for_hire',
        'previous_employee',
        'budget_status',
        'salary_from',
        'salary_to',
        'justification_notes',
        'experience',
        'education',
        'mandatory_skills',
        'preferred_skills',
        'description',
        'requested_by',
        'approved_by',
        'status',
        'hod_status',
        'hr_status',
        'submitted_at',
        'published_at',
        'publish_internal',
        'publish_external',
        'external_boards',
        'posting_notes',
        'rejection_reason',
    ];

    protected $useTimestamps = true;

    protected $createdField = 'created_at';

    protected $updatedField = 'updated_at';
}
