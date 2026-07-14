<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddApplicationDecisionNotifications extends Migration
{
    public function up()
    {
        $this->forge->addColumn('job_applications', [
            'decision_viewed_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'evaluated_at',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('job_applications', 'decision_viewed_at');
    }
}
