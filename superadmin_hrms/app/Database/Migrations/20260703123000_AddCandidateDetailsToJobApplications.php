<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCandidateDetailsToJobApplications extends Migration
{
    public function up()
    {
        $this->forge->addColumn('job_applications', [
            'candidate_name' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => true,
                'after' => 'user_id',
            ],
            'candidate_email' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
                'after' => 'candidate_name',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true,
                'after' => 'candidate_email',
            ],
            'current_company' => [
                'type' => 'VARCHAR',
                'constraint' => 150,
                'null' => true,
                'after' => 'phone',
            ],
            'experience_years' => [
                'type' => 'DECIMAL',
                'constraint' => '4,1',
                'null' => true,
                'after' => 'current_company',
            ],
            'current_location' => [
                'type' => 'VARCHAR',
                'constraint' => 120,
                'null' => true,
                'after' => 'experience_years',
            ],
            'linkedin_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'current_location',
            ],
            'portfolio_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'linkedin_url',
            ],
            'cover_letter' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'portfolio_url',
            ],
            'resume_file' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'cover_letter',
            ],
            'resume_original_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'resume_file',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('job_applications', [
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
        ]);
    }
}
