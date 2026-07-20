<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTenantDatabaseToCompanies extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('tenant_database', 'companies')) {
            $this->forge->addColumn('companies', [
                'tenant_database' => ['type' => 'VARCHAR', 'constraint' => 64, 'null' => true, 'after' => 'slug'],
            ]);
        }
    }

    public function down()
    {
        if ($this->db->fieldExists('tenant_database', 'companies')) {
            $this->forge->dropColumn('companies', 'tenant_database');
        }
    }
}
