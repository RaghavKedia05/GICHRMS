<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLoginEnabledToUsers extends Migration
{
    public function up()
    {
        if (!$this->db->fieldExists('login_enabled', 'users')) {
            $this->forge->addColumn('users', [
                'login_enabled' => [
                    'type' => 'TINYINT',
                    'constraint' => 1,
                    'default' => 1,
                    'null' => false,
                    'after' => 'password',
                ],
            ]);
        }

        $this->db->table('users')
            ->where('password', null)
            ->update(['login_enabled' => 0]);
    }

    public function down()
    {
        if ($this->db->fieldExists('login_enabled', 'users')) {
            $this->forge->dropColumn('users', 'login_enabled');
        }
    }
}
