<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOnboardingCompletedToUsers extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('onboarding_completed', 'users')) {
            // Existing accounts must not be forced into onboarding.
            $this->forge->addColumn('users', [
                'onboarding_completed' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1,
                    'null' => false,
                    'after' => 'login_enabled',
                ],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('onboarding_completed', 'users')) {
            $this->forge->dropColumn('users', 'onboarding_completed');
        }
    }
}
