<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCompanyOnboarding extends Migration
{
    public function up()
    {
        if (! $this->db->fieldExists('icon', 'companies')) {
            $this->forge->addColumn('companies', [
                'icon' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true, 'after' => 'slug'],
            ]);
        }

        if (! $this->db->fieldExists('setup_completed', 'companies')) {
            $this->forge->addColumn('companies', [
                'setup_completed' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0, 'after' => 'icon'],
            ]);
        }

        if (! $this->db->fieldExists('company_id', 'departments')) {
            $this->forge->addColumn('departments', [
                'company_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'after' => 'id'],
            ]);
            $defaultCompany = $this->db->table('companies')->orderBy('id', 'ASC')->get()->getRowArray();
            if ($defaultCompany) {
                $this->db->table('departments')->where('company_id', null)->update(['company_id' => $defaultCompany['id']]);
            }
        }

        // Custom company roles require a value beyond the original fixed ENUM.
        $this->forge->modifyColumn('users', [
            'role' => ['name' => 'role', 'type' => 'VARCHAR', 'constraint' => 80, 'default' => 'employee'],
        ]);

        if (! $this->db->tableExists('company_roles')) {
            $this->forge->addField([
                'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
                'company_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
                'name' => ['type' => 'VARCHAR', 'constraint' => 80],
                'slug' => ['type' => 'VARCHAR', 'constraint' => 80],
                'created_at' => ['type' => 'DATETIME', 'null' => true],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addKey('company_id');
            $this->forge->createTable('company_roles');
        }
    }

    public function down()
    {
        $this->forge->dropTable('company_roles', true);
        if ($this->db->fieldExists('company_id', 'departments')) $this->forge->dropColumn('departments', 'company_id');
        if ($this->db->fieldExists('setup_completed', 'companies')) $this->forge->dropColumn('companies', 'setup_completed');
        if ($this->db->fieldExists('icon', 'companies')) $this->forge->dropColumn('companies', 'icon');
    }
}
