<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStaffDetailsToUsers extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'position' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'role',
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'after' => 'position',
            ],
            'employment_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'phone',
            ],
            'date_of_joining' => [
                'type' => 'DATE',
                'null' => true,
                'after' => 'employment_type',
            ],
            'address' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'date_of_joining',
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', [
            'position',
            'phone',
            'employment_type',
            'date_of_joining',
            'address',
        ]);
    }
}
