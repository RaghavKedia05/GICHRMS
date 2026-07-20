<?php

namespace App\Controllers;
use App\Models\CompanyModel;
use App\Models\UserModel;
use App\Libraries\TenantDatabaseService;
use Config\Database as DatabaseConfig;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        if (session('logged_in')) return redirect()->to('/dashboard');
        return view('register');
    }

    public function saveUser()
    {
        if (session('logged_in')) return redirect()->to('/dashboard');
        helper(['form']);

        $rules = [

            'company_name' => 'required|min_length[2]|max_length[150]',

            'name' => 'required|min_length[3]|max_length[100]',

            'email' => 'required|valid_email|is_unique[users.email]',

            'password' => [
                'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/]',
                'errors' => [
                    'regex_match' => 'Password must contain at least one uppercase letter, one lowercase letter, one number and one special character.'
                ]
            ],

            'confirm_password' => 'required|matches[password]'
        ];

        if (!$this->validate($rules)) {

            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $db = db_connect();
        $db->transStart();

        $companyName = trim((string) $this->request->getPost('company_name'));
        $slugBase = url_title($companyName, '-', true) ?: 'company';
        $companyModel = new CompanyModel();
        $slug = $slugBase;
        $suffix = 2;
        while ($companyModel->where('slug', $slug)->first()) {
            $slug = $slugBase . '-' . $suffix++;
        }

        $companyId = (int) $companyModel->insert([
            'name' => $companyName,
            'slug' => $slug,
            'setup_completed' => 0,
            'is_active' => 1,
        ], true);

        $userModel = new UserModel();
        $userId = (int) $userModel->insert([
            'company_id' => $companyId,
            'employee_id' => 'OWNER-' . str_pad((string) $companyId, 5, '0', STR_PAD_LEFT),
            'name' => trim((string) $this->request->getPost('name')),
            'email' => strtolower(trim((string) $this->request->getPost('email'))),
            'password' => password_hash((string) $this->request->getPost('password'), PASSWORD_DEFAULT),
            'login_enabled' => 1,
            'role' => 'superadmin',
            'position' => 'Company Owner',
            'is_active' => 1,
        ], true);

        $db->transComplete();
        if (!$db->transStatus()) {
            return redirect()->back()->withInput()->with('errors', ['registration' => 'The company could not be registered. Please try again.']);
        }

        try {
            $tenantDatabase = (new TenantDatabaseService())->provision($slug, $companyId, $userId);
            $companyModel->update($companyId, ['tenant_database' => $tenantDatabase]);
        } catch (\Throwable $e) {
            log_message('error', 'Company database provisioning failed: ' . $e->getMessage());
            $userModel->delete($userId, true);
            $companyModel->delete($companyId, true);
            return redirect()->back()->withInput()->with('errors', ['registration' => 'The company database could not be created. Please contact the platform administrator.']);
        }

        session()->set([
            'user_id' => $userId, 'company_id' => $companyId,
            'name' => trim((string) $this->request->getPost('name')),
            'email' => strtolower(trim((string) $this->request->getPost('email'))),
            'role' => 'superadmin', 'tenant_database' => $tenantDatabase,
            'company_name' => $companyName, 'company_icon' => null, 'logged_in' => true,
        ]);

        return redirect()->to('/company/setup')->with('success', 'Company registered. Complete your workspace setup.');
    }

    public function authenticate()
    {
        $email = strtolower(trim((string) $this->request->getPost('email')));
        $password = $this->request->getPost('password');

        $central = (new TenantDatabaseService())->central();
        $user = $central->table('users')->where('email', $email)->get()->getRowArray();
        $company = $user ? $central->table('companies')->where('id', (int) ($user['company_id'] ?? 0))->get()->getRowArray() : null;

        if (!$user) {
            $companies = $central->table('companies')->where('tenant_database IS NOT NULL', null, false)->get()->getResultArray();
            foreach ($companies as $candidateCompany) {
                $tenantName = (string) ($candidateCompany['tenant_database'] ?? '');
                if (!preg_match('/^[a-zA-Z0-9_]+$/', $tenantName)) continue;
                $tenantConfig = config(DatabaseConfig::class)->default;
                $tenantConfig['database'] = $tenantName;
                $candidate = DatabaseConfig::connect($tenantConfig, false)
                    ->table('users')->where('email', $email)->get()->getRowArray();
                if ($candidate) {
                    $user = $candidate;
                    $company = $candidateCompany;
                    break;
                }
            }
        }

        if (!$user) {

            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid email. Please enter a valid email address.');
        }

        if (!(int) ($user['login_enabled'] ?? 1) || empty($user['password'])) {

            return redirect()->back()
                ->withInput()
                ->with('error', 'Login access has not been enabled for this employee. Please contact HR or an administrator.');
        }

        if (!password_verify($password, (string) $user['password'])) {

            return redirect()->back()
                ->withInput()
                ->with('error', 'Incorrect password. Please try again.');
        }

        if (!$user['is_active']) {

            return redirect()->back()
                ->with('error', 'Your account has been disabled.');
        }

        session()->set([

            'user_id' => $user['id'],

            'company_id' => $user['company_id'] ?? null,

            'name' => $user['name'],

            'email' => $user['email'],

            'role' => $user['role'],

            'tenant_database' => $company['tenant_database'] ?? null,

            'company_name' => $company['name'] ?? 'GICHRMS',

            'company_icon' => $company['icon'] ?? null,

            'logged_in' => true

        ]);

        if ($user['role'] === 'superadmin') {
            if ($company && !(int) ($company['setup_completed'] ?? 0)) {
                return redirect()->to('/company/setup');
            }
        }

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        $session = session();

        // Avoid session()->destroy() here because Windows can lock the session file
        // and make CodeIgniter's unlink() fail during logout.
        $session->remove([
            'user_id',
            'company_id',
            'name',
            'email',
            'role',
            'tenant_database',
            'company_name',
            'company_icon',
            'logged_in',
        ]);

        return redirect()->to('/login')
            ->with('success', 'Logged out successfully.');
    }
}
