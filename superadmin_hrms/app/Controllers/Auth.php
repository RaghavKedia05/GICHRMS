<?php

namespace App\Controllers;
use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function saveUser()
    {
        helper(['form']);

        $rules = [

            'name' => 'required|min_length[3]',

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

        $userModel = new UserModel();
        $employeeId = 'EMP' . str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);

        $userModel->insert([

            'employee_id' => $employeeId,

            'name' => $this->request->getPost('name'),

            'email' => $this->request->getPost('email'),

            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),

            'role' => 'employee',

            'is_active' => 1

        ]);

        return redirect()->to('/login')
            ->with('success', 'Registered Successfully!');
    }

    public function authenticate()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $userModel = new UserModel();

        $user = $userModel
            ->where('email', $email)
            ->first();

        if (!$user) {

            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid email. Please enter a valid email address.');
        }

        if (!password_verify($password, $user['password'])) {

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

            'name' => $user['name'],

            'email' => $user['email'],

            'role' => $user['role'],

            'logged_in' => true

        ]);

        return redirect()->to('/dashboard');
    }

    public function logout()
    {
        $session = session();

        // Avoid session()->destroy() here because Windows can lock the session file
        // and make CodeIgniter's unlink() fail during logout.
        $session->remove([
            'user_id',
            'name',
            'email',
            'role',
            'logged_in',
        ]);

        return redirect()->to('/login')
            ->with('success', 'Logged out successfully.');
    }
}
