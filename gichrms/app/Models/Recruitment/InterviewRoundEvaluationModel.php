<?php

namespace App\Models\Recruitment;

use CodeIgniter\Model;

class InterviewRoundEvaluationModel extends Model
{
    protected $table = 'interview_round_evaluations';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $useTimestamps = false;
    protected $allowedFields = [
        'application_id', 'round_number', 'round_name', 'technical_score',
        'communication_score', 'culture_score', 'total_score', 'decision',
        'notes', 'evaluated_by', 'evaluated_at',
    ];

    public function forApplication(int $applicationId): array
    {
        return $this->where('application_id', $applicationId)->orderBy('round_number')->findAll();
    }
}
