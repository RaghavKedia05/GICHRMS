<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ScopePerformanceReviews extends Migration
{
    public function up()
    {
        $this->forge->addColumn('performance_reviews', [
            'company_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'after' => 'id'],
            'employee_user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'after' => 'company_id'],
            'reviewed_by' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true, 'after' => 'employee_user_id'],
            'status' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => 'Completed', 'after' => 'grade'],
        ]);
        $this->forge->addKey(['company_id', 'employee_user_id']);

        $defaultCompany = $this->db->table('companies')->select('id')->orderBy('id')->get()->getRowArray();
        if ($defaultCompany) {
            $this->db->table('performance_reviews')->where('company_id', null)->update(['company_id' => (int) $defaultCompany['id']]);
            $reviews = $this->db->table('performance_reviews')->select('id, emp_id')->where('employee_user_id', null)->get()->getResultArray();
            foreach ($reviews as $review) {
                $user = $this->db->table('users')->select('id')->where('company_id', $defaultCompany['id'])->where('employee_id', $review['emp_id'])->get()->getRowArray();
                if ($user) $this->db->table('performance_reviews')->where('id', $review['id'])->update(['employee_user_id' => $user['id']]);
            }
        }
    }

    public function down()
    {
        $this->forge->dropColumn('performance_reviews', ['company_id', 'employee_user_id', 'reviewed_by', 'status']);
    }
}
