<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use RuntimeException;

class RoleDemoSeeder extends Seeder
{
    private const PASSWORD = 'Demo@12345';

    public function run(): void
    {
        $company = $this->db->table('companies')->where('is_active', 1)->orderBy('id')->get()->getRowArray();
        if ($company === null) {
            throw new RuntimeException('No active company exists. Run the migrations before this seeder.');
        }

        $department = $this->db->table('departments')->where('department_code', 'DEMO')->get()->getRowArray();
        if ($department === null) {
            $this->db->table('departments')->insert([
                'department_name' => 'Demo Operations',
                'department_code' => 'DEMO',
                'status' => 1,
            ]);
            $departmentId = (int) $this->db->insertID();
        } else {
            $departmentId = (int) $department['id'];
        }

        $accounts = [
            ['ADMIN-DEMO', 'Demo Administrator', 'admin@demo.local', 'admin', 'System Administrator'],
            ['HR-DEMO', 'Demo HR Manager', 'hr@demo.local', 'hr', 'HR Manager'],
            ['HOD-DEMO', 'Demo Department Head', 'hod@demo.local', 'department_head', 'Department Head'],
            ['HM-DEMO', 'Demo Hiring Manager', 'hiring.manager@demo.local', 'hiring_manager', 'Hiring Manager'],
            ['EMP-DEMO', 'Demo Employee', 'employee@demo.local', 'employee', 'Employee'],
        ];

        $this->db->transStart();
        foreach ($accounts as [$employeeId, $name, $email, $role, $position]) {
            if ($this->db->table('users')->where('email', $email)->countAllResults() > 0) {
                continue;
            }

            $this->db->table('users')->insert([
                'company_id' => (int) $company['id'],
                'employee_id' => $employeeId,
                'name' => $name,
                'email' => $email,
                'password' => password_hash(self::PASSWORD, PASSWORD_DEFAULT),
                'login_enabled' => 1,
                'role' => $role,
                'position' => $position,
                'employment_type' => 'Full Time',
                'department_id' => $departmentId,
                'is_active' => 1,
            ]);
        }

        $head = $this->db->table('users')->select('id')->where('email', 'hod@demo.local')->get()->getRowArray();
        if ($head !== null) {
            $this->db->table('departments')->where('id', $departmentId)->update(['hod_id' => (int) $head['id']]);
        }
        $this->db->transComplete();

        if (! $this->db->transStatus()) {
            throw new RuntimeException('Demo role accounts could not be created.');
        }
    }
}
