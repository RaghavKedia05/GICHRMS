<?php

namespace App\Controllers\Employee;

use App\Controllers\BaseController;
use App\Models\DepartmentModel;
use App\Models\UserModel;

class EmployeeController extends BaseController
{
    public function staff()
    {
        $userModel = new UserModel();

        $staff = $userModel
            ->select('users.*, departments.department_name')
            ->join('departments', 'departments.id = users.department_id', 'left')
            ->orderBy('users.id', 'DESC')
            ->findAll();

        return view('Employee/staff', [
            'staff' => $staff,
        ]);
    }

    public function createStaff()
    {
        if (!$this->canManageStaff()) {
            return redirect()->to('/staff')->with('error', 'Only HR and Admin can add staff.');
        }

        $departmentModel = new DepartmentModel();

        return view('Employee/create_staff', [
            'departments' => $departmentModel
                ->where('status', 1)
                ->orderBy('department_name')
                ->findAll(),
        ]);
    }

    public function storeStaff()
    {
        if (!$this->canManageStaff()) {
            return redirect()->to('/staff')->with('error', 'Only HR and Admin can add staff.');
        }

        $rules = [
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'phone' => 'permit_empty|min_length[7]|max_length[20]',
            'role' => 'required|in_list[admin,hr,department_head,hiring_manager,employee]',
            'password' => 'required|min_length[6]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();

        $employeeId = $this->generateEmployeeId($userModel);

        $userModel->insert([
            'employee_id' => $employeeId,
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
            'position' => $this->request->getPost('position'),
            'phone' => $this->request->getPost('phone'),
            'employment_type' => $this->request->getPost('employment_type'),
            'date_of_joining' => $this->request->getPost('date_of_joining') ?: null,
            'address' => $this->request->getPost('address'),
            'department_id' => $this->request->getPost('department_id') ?: null,
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ]);

        return redirect()->to('/staff')
            ->with('success', 'Staff added successfully.');
    }

    public function editStaff($id)
    {
        if (!$this->canManageStaff()) {
            return redirect()->to('/staff')->with('error', 'Only HR and Admin can edit staff.');
        }

        $userModel = new UserModel();
        $departmentModel = new DepartmentModel();
        $staff = $userModel->find($id);

        if (!$staff) {
            return redirect()->to('/staff')->with('error', 'Staff member not found.');
        }

        return view('Employee/edit_staff', [
            'staff' => $staff,
            'departments' => $departmentModel
                ->where('status', 1)
                ->orderBy('department_name')
                ->findAll(),
        ]);
    }

    public function updateStaff($id)
    {
        if (!$this->canManageStaff()) {
            return redirect()->to('/staff')->with('error', 'Only HR and Admin can edit staff.');
        }

        $userModel = new UserModel();
        $staff = $userModel->find($id);

        if (!$staff) {
            return redirect()->to('/staff')->with('error', 'Staff member not found.');
        }

        $rules = [
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'phone' => 'permit_empty|min_length[7]|max_length[20]',
            'role' => 'required|in_list[admin,hr,department_head,hiring_manager,employee]',
        ];

        if ($this->request->getPost('password')) {
            $rules['password'] = 'min_length[6]';
        }

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $payload = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'position' => $this->request->getPost('position'),
            'phone' => $this->request->getPost('phone'),
            'employment_type' => $this->request->getPost('employment_type'),
            'date_of_joining' => $this->request->getPost('date_of_joining') ?: null,
            'address' => $this->request->getPost('address'),
            'department_id' => $this->request->getPost('department_id') ?: null,
            'is_active' => $this->request->getPost('is_active') ? 1 : 0,
        ];

        if ($this->request->getPost('password')) {
            $payload['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $userModel->update($id, $payload);

        return redirect()->to('/staff')
            ->with('success', 'Staff details updated successfully.');
    }

    private function generateEmployeeId(UserModel $userModel): string
    {
        do {
            $employeeId = 'EMP' . str_pad((string) random_int(1, 9999), 4, '0', STR_PAD_LEFT);
        } while ($userModel->where('employee_id', $employeeId)->first());

        return $employeeId;
    }

    private function canManageStaff(): bool
    {
        return in_array(session('role'), ['hr', 'admin'], true);
    }
}
