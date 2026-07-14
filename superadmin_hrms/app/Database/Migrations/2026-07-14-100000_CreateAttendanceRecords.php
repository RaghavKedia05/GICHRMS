<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAttendanceRecords extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'company_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'attendance_date' => ['type' => 'DATE'],
            'check_in' => ['type' => 'DATETIME'],
            'check_out' => ['type' => 'DATETIME', 'null' => true],
            'break_started_at' => ['type' => 'DATETIME', 'null' => true],
            'break_minutes' => ['type' => 'INT', 'constraint' => 11, 'default' => 0],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'Present'],
            'notes' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['company_id', 'user_id', 'attendance_date']);
        $this->forge->addKey(['company_id', 'attendance_date']);
        $this->forge->createTable('attendance_records', true);
    }

    public function down()
    {
        $this->forge->dropTable('attendance_records', true);
    }
}
