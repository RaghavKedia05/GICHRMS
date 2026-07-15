<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhaseTwoPostingFields extends Migration
{
    public function up()
    {
        $this->forge->addColumn('job_requisitions', [
            'publish_internal' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
                'after' => 'published_at',
            ],
            'publish_external' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1,
                'after' => 'publish_internal',
            ],
            'external_boards' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'publish_external',
            ],
            'posting_notes' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'external_boards',
            ],
        ]);

        $this->forge->addColumn('job_applications', [
            'application_source' => [
                'type' => 'VARCHAR',
                'constraint' => 80,
                'default' => 'Internal Career Portal',
                'after' => 'resume_original_name',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('job_requisitions', [
            'publish_internal',
            'publish_external',
            'external_boards',
            'posting_notes',
        ]);

        $this->forge->dropColumn('job_applications', 'application_source');
    }
}
