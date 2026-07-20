<?php

namespace App\Controllers;

use App\Models\DepartmentModel;

class DepartmentController extends BaseController
{
    public function index()
    {
        if (! $this->canManage()) {
            return redirect()->to('/dashboard')->with('error', 'Only HR and administrators can manage departments.');
        }

        return view('departments', [
            'departments' => (new DepartmentModel())->where('company_id', (int) session('company_id'))->orderBy('department_name')->findAll(),
        ]);
    }

    public function store()
    {
        if (! $this->canManage()) {
            return redirect()->to('/dashboard')->with('error', 'Only HR and administrators can manage departments.');
        }

        $rules = [
            'department_name' => 'required|min_length[2]|max_length[100]',
            'department_code' => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        (new DepartmentModel())->insert([
            'company_id' => (int) session('company_id'),
            'department_name' => trim((string) $this->request->getPost('department_name')),
            'department_code' => strtoupper(trim((string) $this->request->getPost('department_code'))) ?: null,
            'status' => 1,
        ]);

        return redirect()->to('/departments')->with('success', 'Department created successfully.');
    }

    public function toggle(int $id)
    {
        if (! $this->canManage()) {
            return redirect()->to('/dashboard')->with('error', 'Only HR and administrators can manage departments.');
        }

        $model = new DepartmentModel();
        $department = $model->where('company_id', (int) session('company_id'))->find($id);
        if (! $department) {
            return redirect()->to('/departments')->with('error', 'Department not found.');
        }

        $model->update($id, ['status' => (int) ! (int) $department['status']]);

        return redirect()->to('/departments')->with('success', 'Department status updated.');
    }

    private function canManage(): bool
    {
        return in_array(session('role'), ['superadmin', 'admin', 'hr'], true);
    }
}
