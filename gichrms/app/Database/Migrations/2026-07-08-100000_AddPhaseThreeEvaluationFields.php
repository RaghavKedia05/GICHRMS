<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhaseThreeEvaluationFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('job_applications', [
            'screening_decision' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => true,
                'after' => 'application_source',
            ],
            'screening_notes' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'screening_decision',
            ],
            'shortlisted_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'screening_notes',
            ],
            'interview_round' => [
                'type' => 'VARCHAR',
                'constraint' => 80,
                'null' => true,
                'after' => 'shortlisted_at',
            ],
            'interview_date' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'interview_round',
            ],
            'interview_mode' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => true,
                'after' => 'interview_date',
            ],
            'interviewer_name' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => true,
                'after' => 'interview_mode',
            ],
            'interview_notes' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'interviewer_name',
            ],
            'technical_score' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
                'after' => 'interview_notes',
            ],
            'communication_score' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
                'after' => 'technical_score',
            ],
            'culture_score' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
                'after' => 'communication_score',
            ],
            'total_score' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => true,
                'after' => 'culture_score',
            ],
            'evaluation_status' => [
                'type' => 'VARCHAR',
                'constraint' => 40,
                'null' => true,
                'after' => 'total_score',
            ],
            'rejection_reason' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'evaluation_status',
            ],
            'evaluated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'rejection_reason',
            ],
            'selected_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'evaluated_at',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('job_applications', [
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
        ]);
    }
}
