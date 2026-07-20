<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('logged_in')) {

            return redirect()->to('/login')
                ->with('error', 'Please login first.');
        }

        $userId = (int) session()->get('user_id');
        $user = db_connect()->table('users')
            ->select('is_active, login_enabled, password')
            ->where('id', $userId)
            ->get()
            ->getRowArray();

        if (!$user || !(int) ($user['is_active'] ?? 0) || !(int) ($user['login_enabled'] ?? 1) || empty($user['password'])) {
            session()->remove([
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
                ->with('error', 'Your login access is no longer active. Please contact HR or an administrator.');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
