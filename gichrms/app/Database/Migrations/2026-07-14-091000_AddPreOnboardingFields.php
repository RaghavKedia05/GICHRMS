<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPreOnboardingFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('job_applications', [
            'onboarding_status' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => true,
                'after' => 'employee_profile_id',
            ],
            'onboarding_notes' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'onboarding_status',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('job_applications', ['onboarding_status', 'onboarding_notes']);
    }
}
