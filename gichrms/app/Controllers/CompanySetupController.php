<?php

namespace App\Controllers;

use App\Models\CompanyModel;
use App\Models\CompanyRoleModel;
use App\Models\DepartmentModel;
use App\Models\UserModel;
use App\Libraries\TenantDatabaseService;

class CompanySetupController extends BaseController
{
    public function index()
    {
        if (! $this->isOwner()) return redirect()->to('/dashboard')->with('error', 'Only the company superadmin can run setup.');

        $companyId = (int) session('company_id');
        $company = (new CompanyModel())->find($companyId);
        if ($company && (int) ($company['setup_completed'] ?? 0)) {
            return redirect()->to('/dashboard');
        }
        return view('company_setup', [
            'company' => $company,
            'departments' => (new DepartmentModel())->where('company_id', $companyId)->findAll(),
            'roles' => (new CompanyRoleModel())->where('company_id', $companyId)->findAll(),
        ]);
    }

    public function save()
    {
        if (! $this->isOwner()) return redirect()->to('/dashboard')->with('error', 'Only the company superadmin can run setup.');

        $companyId = (int) session('company_id');
        $rules = [
            'company_name' => 'required|min_length[2]|max_length[150]',
            'company_icon' => 'permit_empty|is_image[company_icon]|max_size[company_icon,2048]|ext_in[company_icon,png,jpg,jpeg,webp]',
        ];
        if (! $this->validate($rules)) return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());

        $db = db_connect();
        $db->transStart();
        $companyPayload = ['name' => trim((string) $this->request->getPost('company_name'))];
        $icon = $this->request->getFile('company_icon');
        if ($icon && $icon->isValid() && ! $icon->hasMoved()) {
            $name = $icon->getRandomName();
            $iconDirectory = FCPATH . 'uploads/company-icons';
            if (! is_dir($iconDirectory)) mkdir($iconDirectory, 0775, true);
            $icon->move($iconDirectory, $name);
            $companyPayload['icon'] = 'uploads/company-icons/' . $name;
        }

        $departmentModel = new DepartmentModel();
        $userModel = new UserModel();
        $names = (array) $this->request->getPost('department_name');
        $codes = (array) $this->request->getPost('department_code');
        $headNames = (array) $this->request->getPost('head_name');
        $headEmails = (array) $this->request->getPost('head_email');
        foreach ($names as $i => $name) {
            $name = trim((string) $name);
            if ($name === '') continue;
            $departmentId = (int) $departmentModel->insert([
                'company_id' => $companyId, 'department_name' => $name,
                'department_code' => strtoupper(trim((string) ($codes[$i] ?? ''))) ?: null, 'status' => 1,
            ], true);
            $email = strtolower(trim((string) ($headEmails[$i] ?? '')));
            if ($email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) && ! $userModel->where('email', $email)->first()) {
                $headId = (int) $userModel->insert($this->pendingUser($companyId, $email, trim((string) ($headNames[$i] ?? 'Department Head')), 'department_head', $departmentId), true);
                $departmentModel->update($departmentId, ['hod_id' => $headId]);
            }
        }

        $roleModel = new CompanyRoleModel();
        foreach ($this->lines((string) $this->request->getPost('roles')) as $role) {
            $slug = url_title($role, '_', true);
            if ($slug && ! $roleModel->where(['company_id' => $companyId, 'slug' => $slug])->first()) {
                $roleModel->insert(['company_id' => $companyId, 'name' => $role, 'slug' => $slug, 'created_at' => date('Y-m-d H:i:s')]);
            }
        }

        foreach ($this->lines((string) $this->request->getPost('employee_emails')) as $email) {
            $email = strtolower($email);
            if (filter_var($email, FILTER_VALIDATE_EMAIL) && ! $userModel->where('email', $email)->first()) {
                $userModel->insert($this->pendingUser($companyId, $email, strstr($email, '@', true) ?: 'Employee', 'employee'));
            }
        }

        $companyPayload['setup_completed'] = 1;
        (new CompanyModel())->update($companyId, $companyPayload);
        $db->transComplete();
        if (! $db->transStatus()) return redirect()->back()->withInput()->with('errors', ['setup' => 'Setup could not be saved. Check for duplicate departments or emails.']);

        $central = (new TenantDatabaseService())->central();
        $central->table('companies')->where('id', $companyId)->update($companyPayload);
        session()->set([
            'company_name' => $companyPayload['name'],
            'company_icon' => $companyPayload['icon'] ?? session('company_icon'),
        ]);

        return redirect()->to('/dashboard')->with('success', 'Your company workspace is ready.');
    }

    private function pendingUser(int $companyId, string $email, string $name, string $role, ?int $departmentId = null): array
    {
        return ['company_id' => $companyId, 'employee_id' => null, 'name' => $name ?: 'Employee', 'email' => $email,
            'password' => null, 'login_enabled' => 0, 'role' => $role, 'department_id' => $departmentId, 'is_active' => 1];
    }

    private function lines(string $value): array
    {
        return array_values(array_unique(array_filter(array_map('trim', preg_split('/[\r\n,]+/', $value) ?: []))));
    }

    private function isOwner(): bool
    {
        return session('role') === 'superadmin' && (int) session('company_id') > 0;
    }
}
