<?php

namespace App\Controllers\Settings;

use App\Controllers\BaseController;
use App\Models\UserModel;

class ProfileController extends BaseController
{
    public function index()
    {
        $profile = $this->currentProfile();

        if (!$profile) {
            return redirect()->to('/dashboard')->with('error', 'Your profile could not be loaded.');
        }

        return view('Settings/profile', [
            'profile' => $profile,
        ]);
    }

    public function update()
    {
        $userId = (int) session('user_id');
        $profile = $this->currentProfile();

        if (!$profile) {
            return redirect()->to('/dashboard')->with('error', 'Your profile could not be loaded.');
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'email' => 'required|valid_email|max_length[100]|is_unique[users.email,id,' . $userId . ']',
            'phone' => 'permit_empty|min_length[7]|max_length[20]',
            'address' => 'permit_empty|max_length[1000]',
        ];

        $changePassword = trim((string) $this->request->getPost('new_password')) !== ''
            || trim((string) $this->request->getPost('current_password')) !== ''
            || trim((string) $this->request->getPost('confirm_password')) !== '';

        if ($changePassword) {
            $rules += [
                'current_password' => 'required',
                'new_password' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/]',
                'confirm_password' => 'required|matches[new_password]',
            ];
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $payload = [
            'name' => trim((string) $this->request->getPost('name')),
            'email' => strtolower(trim((string) $this->request->getPost('email'))),
            'phone' => trim((string) $this->request->getPost('phone')) ?: null,
            'address' => trim((string) $this->request->getPost('address')) ?: null,
        ];

        if ($changePassword) {
            if (! password_verify((string) $this->request->getPost('current_password'), (string) $profile['password'])) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', ['current_password' => 'The current password is incorrect.']);
            }

            $payload['password'] = password_hash((string) $this->request->getPost('new_password'), PASSWORD_DEFAULT);
        }

        (new UserModel())->update($userId, $payload);

        session()->set([
            'name' => $payload['name'],
            'email' => $payload['email'],
        ]);

        return redirect()->to('/settings/profile')
            ->with('success', $changePassword ? 'Your profile and password were updated successfully.' : 'Your profile was updated successfully.');
    }

    private function currentProfile(): ?array
    {
        return (new UserModel())
            ->select('users.*, departments.department_name, companies.name AS company_name')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->join('companies', 'companies.id = users.company_id', 'left')
            ->where('users.id', (int) session('user_id'))
            ->where('users.company_id', (int) session('company_id'))
            ->first();
    }
}
