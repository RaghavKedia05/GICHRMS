<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateCompanyEmailSettings extends Migration
{
    public function up()
    {
        if (!$this->db->tableExists('companies')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 150,
                ],
                'slug' => [
                    'type' => 'VARCHAR',
                    'constraint' => 170,
                ],
                'is_active' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'default' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('slug');
            $this->forge->createTable('companies');
        }

        $company = $this->db->table('companies')->orderBy('id', 'ASC')->get()->getRowArray();

        if (!$company) {
            $this->db->table('companies')->insert([
                'name' => 'Global Info Cloud',
                'slug' => 'global-info-cloud',
                'is_active' => 1,
            ]);
            $defaultCompanyId = (int) $this->db->insertID();
        } else {
            $defaultCompanyId = (int) $company['id'];
        }

        if (!$this->db->fieldExists('company_id', 'users')) {
            $this->forge->addColumn('users', [
                'company_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'after' => 'id',
                ],
            ]);
        }

        if (!$this->db->fieldExists('company_id', 'job_requisitions')) {
            $this->forge->addColumn('job_requisitions', [
                'company_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'null' => true,
                    'after' => 'id',
                ],
            ]);
        }

        $this->db->table('users')
            ->where('company_id', null)
            ->update(['company_id' => $defaultCompanyId]);

        $this->db->table('job_requisitions')
            ->where('company_id', null)
            ->update(['company_id' => $defaultCompanyId]);

        if (!$this->db->tableExists('company_email_settings')) {
            $this->forge->addField([
                'id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                    'auto_increment' => true,
                ],
                'company_id' => [
                    'type' => 'INT',
                    'constraint' => 11,
                    'unsigned' => true,
                ],
                'from_name' => [
                    'type' => 'VARCHAR',
                    'constraint' => 150,
                ],
                'from_email' => [
                    'type' => 'VARCHAR',
                    'constraint' => 190,
                ],
                'smtp_host' => [
                    'type' => 'VARCHAR',
                    'constraint' => 190,
                ],
                'smtp_port' => [
                    'type' => 'INT',
                    'constraint' => 5,
                    'default' => 587,
                ],
                'smtp_encryption' => [
                    'type' => 'VARCHAR',
                    'constraint' => 10,
                    'default' => 'tls',
                ],
                'smtp_username' => [
                    'type' => 'VARCHAR',
                    'constraint' => 190,
                ],
                'smtp_password_encrypted' => [
                    'type' => 'TEXT',
                ],
                'is_active' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1,
                ],
                'last_tested_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
                'last_test_status' => [
                    'type' => 'VARCHAR',
                    'constraint' => 20,
                    'null' => true,
                ],
                'last_test_error' => [
                    'type' => 'VARCHAR',
                    'constraint' => 500,
                    'null' => true,
                ],
                'created_at' => [
                    'type' => 'DATETIME',
                    'default' => new RawSql('CURRENT_TIMESTAMP'),
                ],
                'updated_at' => [
                    'type' => 'DATETIME',
                    'null' => true,
                ],
            ]);
            $this->forge->addKey('id', true);
            $this->forge->addUniqueKey('company_id');
            $this->forge->createTable('company_email_settings');
        }
    }

    public function down()
    {
        $this->forge->dropTable('company_email_settings', true);

        if ($this->db->fieldExists('company_id', 'job_requisitions')) {
            $this->forge->dropColumn('job_requisitions', 'company_id');
        }

        if ($this->db->fieldExists('company_id', 'users')) {
            $this->forge->dropColumn('users', 'company_id');
        }

        $this->forge->dropTable('companies', true);
    }
}
