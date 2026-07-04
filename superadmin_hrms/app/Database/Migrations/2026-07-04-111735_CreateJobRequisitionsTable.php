<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateJobRequisitionsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],

            'requisition_no' => [
                'type'       => 'VARCHAR',
                'constraint' => 30,
                'null'       => true,
            ],

            'job_title' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'department' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],

            'request_date' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'employment_type' => [
                'type'       => 'ENUM',
                'constraint' => ['Full Time', 'Part Time', 'Internship', 'Contract'],
            ],

            'work_mode' => [
                'type'       => 'ENUM',
                'constraint' => ['On-site', 'Remote', 'Hybrid'],
                'null'       => true,
            ],

            'reason_for_hire' => [
                'type'       => 'ENUM',
                'constraint' => ['New Headcount', 'Replacement'],
                'null'       => true,
            ],

            'previous_employee' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'budget_status' => [
                'type'       => 'ENUM',
                'constraint' => ['Budgeted', 'Unbudgeted'],
                'null'       => true,
            ],

            'justification_notes' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'vacancies' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],

            'target_hire_date' => [
                'type' => 'DATE',
                'null' => true,
            ],

            'experience' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],

            'education' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'mandatory_skills' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'preferred_skills' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'salary_from' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],

            'salary_to' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'null'       => true,
            ],

            'location' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
            ],

            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'skills' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'status' => [
                'type'       => 'ENUM',
                'constraint' => [
                    'Draft',
                    'Pending Approval',
                    'Approved',
                    'Rejected',
                    'Published'
                ],
                'default' => 'Draft',
            ],

            'requested_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],

            'approved_by' => [
                'type'       => 'INT',
                'constraint' => 11,
                'null'       => true,
            ],

            'created_at' => [
                'type' => 'TIMESTAMP',
                'null' => false,
            ],

            'updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],

            'submitted_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],

            'hod_status' => [
                'type'       => 'ENUM',
                'constraint' => ['Pending', 'Approved', 'Rejected'],
                'default'    => 'Pending',
            ],

            'hr_status' => [
                'type'       => 'ENUM',
                'constraint' => ['Pending', 'Approved', 'Rejected'],
                'default'    => 'Pending',
            ],

            'rejection_reason' => [
                'type' => 'TEXT',
                'null' => true,
            ],

            'published_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('job_requisitions', true);
    }

    public function down()
    {
        $this->forge->dropTable('job_requisitions', true);
    }
}