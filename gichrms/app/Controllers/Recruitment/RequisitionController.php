<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
use App\Models\Recruitment\RequisitionModel;
use App\Models\DepartmentModel;

class RequisitionController extends BaseController
{
    protected $requisitionModel;

    public function __construct()
    {
        $this->requisitionModel = new RequisitionModel();
    }

    public function index()
    {
        $role = session('role');
        $userId = session('user_id');
        $companyId = $this->currentCompanyId();

        switch ($role) {
            case 'superadmin':
            case 'admin':
                $data['requisitions'] = $this->requisitionModel
                    ->where('company_id', $companyId)
                    ->orderBy('id', 'DESC')
                    ->findAll();
                break;

            case 'hiring_manager':
                $data['requisitions'] = $this->requisitionModel
                    ->where('company_id', $companyId)
                    ->where('requested_by', $userId)
                    ->orderBy('id', 'DESC')
                    ->findAll();
                break;

            case 'department_head':
                $data['requisitions'] = $this->requisitionModel
                    ->where('company_id', $companyId)
                    ->groupStart()
                        ->where('requested_by', $userId)
                        ->orGroupStart()
                            ->where('status', 'Pending Approval')
                            ->where('hod_status', 'Pending')
                        ->groupEnd()
                    ->groupEnd()
                    ->orderBy('id', 'DESC')
                    ->findAll();
                break;

            case 'hr':
                $data['requisitions'] = $this->requisitionModel
                    ->where('company_id', $companyId)
                    ->where('hod_status', 'Approved')
                    ->orderBy('id', 'DESC')
                    ->findAll();
                break;

            default:
                $data['requisitions'] = [];
                break;
        }

        return view('Recruitment/requisitions', $data);
    }

    private function generateRequisitionNo()
    {
        $year = date('Y');

        $last = $this->requisitionModel
            ->where('company_id', $this->currentCompanyId())
            ->like('requisition_no', "REQ-$year-", 'after')
            ->orderBy('id', 'DESC')
            ->first();

        if (!$last) {
            return "REQ-$year-001";
        }

        $parts = explode('-', $last['requisition_no']);
        $next = ((int) end($parts)) + 1;

        return "REQ-$year-" . str_pad($next, 3, '0', STR_PAD_LEFT);
    }
    public function create()
    {
        if (!$this->canCreateRequisition()) return $this->requisitionAccessDenied();
        $departmentModel = new DepartmentModel();

        $data['departments'] = $departmentModel
            ->where('company_id', $this->currentCompanyId())
            ->where('status', 1)
            ->orderBy('department_name')
            ->findAll();

        $data['requisition_id'] = $this->generateRequisitionNo();
        return view('Recruitment/create_requisition', $data);
    }

    private function validationRules(): array
    {
        return [
            'job_title' => 'required',
            'department' => 'required',
            'employment_type' => 'required',
            'vacancies' => 'required|integer',
        ];
    }

    private function payloadFromRequest(): array
    {
        return [
            'requisition_no' => $this->request->getPost('requisition_no'),
            'request_date' => $this->request->getPost('request_date'),
            'job_title' => $this->request->getPost('job_title'),
            'department' => $this->request->getPost('department'),
            'employment_type' => $this->request->getPost('employment_type'),
            'vacancies' => $this->request->getPost('vacancies'),
            'target_hire_date' => $this->request->getPost('target_hire_date'),
            'work_mode' => $this->request->getPost('work_mode'),
            'location' => $this->request->getPost('location'),
            'reason_for_hire' => $this->request->getPost('reason_for_hire'),
            'previous_employee' => $this->request->getPost('previous_employee'),
            'budget_status' => $this->request->getPost('budget_status'),
            'salary_from' => $this->request->getPost('salary_from'),
            'salary_to' => $this->request->getPost('salary_to'),
            'justification_notes' => $this->request->getPost('justification_notes'),
            'experience' => $this->request->getPost('experience'),
            'education' => $this->request->getPost('education'),
            'mandatory_skills' => $this->request->getPost('mandatory_skills'),
            'preferred_skills' => $this->request->getPost('preferred_skills'),
            'description' => $this->request->getPost('description'),
        ];
    }

    public function saveDraft()
    {
        if (!$this->canCreateRequisition()) return $this->requisitionAccessDenied();
        if (!$this->validate($this->validationRules())) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = $this->payloadFromRequest();
        $data['status'] = 'Draft';
        $data['company_id'] = $this->currentCompanyId();
        $data['requested_by'] = session('user_id');
        $data['hod_status'] = 'Pending';
        $data['hr_status'] = 'Pending';

        $this->requisitionModel->insert($data);

        return redirect()->to('/Recruitment/requisitions')
            ->with('success', 'Draft Saved Successfully');
    }

    public function save()
    {
        // Legacy alias for older job requisition save routes.
        return $this->saveDraft();
    }

    public function submit()
    {
        if (!$this->canCreateRequisition()) return $this->requisitionAccessDenied();
        if (!$this->validate($this->validationRules())) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = $this->payloadFromRequest();
        $data['status'] = 'Pending Approval';
        $data['company_id'] = $this->currentCompanyId();
        $data['requested_by'] = session('user_id');
        $data['submitted_at'] = date('Y-m-d H:i:s');
        $data['hod_status'] = session('role') === 'department_head' ? 'Approved' : 'Pending';
        $data['hr_status'] = 'Pending';
        if (session('role') === 'department_head') {
            $data['approved_by'] = session('user_id');
        }

        $this->requisitionModel->insert($data);

        return redirect()->to('/Recruitment/requisitions')
            ->with('success', 'Requisition Submitted Successfully');
    }

    public function getRequisition($id)
    {
        $requisition = $this->companyRequisition((int) $id);

        if (!$requisition) {
            return $this->response->setStatusCode(404)
                ->setBody('<div class="text-center text-red-600 p-8">Requisition not found.</div>');
        }

        return view('Recruitment/view_requisition_modal', [
            'requisition' => $requisition,
        ]);
    }

    public function edit($id)
    {
        if (!$this->canCreateRequisition()) return $this->requisitionAccessDenied();
        $departmentModel = new DepartmentModel();

        $data['departments'] = $departmentModel->where('company_id', $this->currentCompanyId())->where('status', 1)->findAll();
        $data['requisition'] = $this->companyRequisition((int) $id);

        if (!$data['requisition']) {
            return $this->response->setStatusCode(404)
                ->setBody('<div class="text-center text-red-600 p-8">Requisition not found.</div>');
        }

        if (!$this->canModify($data['requisition'])) return $this->requisitionAccessDenied();
        return view('Recruitment/edit_requisition', $data);
    }

    public function update($id)
    {
        if (!$this->canCreateRequisition()) return $this->requisitionAccessDenied();
        $requisition = $this->companyRequisition((int) $id);

        if (!$requisition) {
            return redirect()->to('/Recruitment/requisitions')
                ->with('error', 'Requisition not found.');
        }

        if (!$this->canModify($requisition) || in_array($requisition['status'], ['Approved', 'Published'], true)) {
            return redirect()->to('/Recruitment/requisitions')->with('error', 'This requisition can no longer be edited.');
        }

        if (!$this->validate($this->validationRules())) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $payload = $this->payloadFromRequest();
        $action = $this->request->getPost('action');
        $status = $this->request->getPost('status');

        if ($status === 'Pending Approval' || $action === 'submit') {
            $payload['status'] = 'Pending Approval';
            $payload['hod_status'] = session('role') === 'department_head' ? 'Approved' : 'Pending';
            $payload['hr_status'] = 'Pending';
            $payload['submitted_at'] = date('Y-m-d H:i:s');
            if (session('role') === 'department_head') {
                $payload['approved_by'] = session('user_id');
            }
        } elseif ($action === 'draft') {
            $payload['status'] = 'Draft';
        }

        $this->requisitionModel->update($id, $payload);

        return redirect()->to('/Recruitment/requisitions')
            ->with('success', 'Requisition updated successfully.');
    }

    public function delete($id)
    {
        if (!in_array(session('role'), ['superadmin', 'admin', 'hiring_manager', 'department_head'], true)) return $this->requisitionAccessDenied();
        $requisition = $this->companyRequisition((int) $id);
        if (!$requisition) {
            return redirect()->to('/Recruitment/requisitions')->with('error', 'Requisition not found.');
        }
        if (!$this->canModify($requisition) || !in_array($requisition['status'], ['Draft', 'Rejected'], true)) {
            return redirect()->back()->with('error', 'Only draft or rejected requisitions can be deleted.');
        }

        $this->requisitionModel->delete($id);

        return redirect()->to('/Recruitment/requisitions')
            ->with('success', 'Requisition deleted successfully.');
    }

    // Dormant for phase 1, kept for when department_head step is reactivated
    public function hodApprove($id)
    {
        if (!in_array(session('role'), ['superadmin', 'admin', 'department_head'], true)) return $this->requisitionAccessDenied();
        $requisition = $this->companyRequisition((int) $id);
        if (!$requisition) {
            return redirect()->back()->with('error', 'Requisition not found.');
        }
        if (($requisition['status'] ?? '') !== 'Pending Approval' || ($requisition['hod_status'] ?? '') !== 'Pending') {
            return redirect()->back()->with('error', 'This requisition is not awaiting HOD approval.');
        }

        $this->requisitionModel->update($id, [
            'hod_status' => 'Approved',
            'status' => 'Pending Approval',
            'approved_by' => session('user_id'),
        ]);

        return redirect()->back()->with('success', 'Approved successfully.');
    }

    public function hodReject($id)
    {
        if (!in_array(session('role'), ['superadmin', 'admin', 'department_head'], true)) return $this->requisitionAccessDenied();
        $requisition = $this->companyRequisition((int) $id);
        if (!$requisition) {
            return redirect()->back()->with('error', 'Requisition not found.');
        }
        if (($requisition['status'] ?? '') !== 'Pending Approval' || ($requisition['hod_status'] ?? '') !== 'Pending') {
            return redirect()->back()->with('error', 'This requisition is not awaiting HOD approval.');
        }

        $this->requisitionModel->update($id, [
            'hod_status' => 'Rejected',
            'status' => 'Rejected',
            'rejection_reason' => $this->request->getPost('rejection_reason'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Requisition rejected.');
    }

    public function hrApprove($id)
    {
        if (!in_array(session('role'), ['superadmin', 'admin', 'hr'], true)) return $this->requisitionAccessDenied();
        $requisition = $this->companyRequisition((int) $id);

        if (!$requisition) {
            return redirect()->back()->with('error', 'Requisition not found.');
        }

        if ($requisition['hod_status'] !== 'Approved' || ($requisition['hr_status'] ?? '') !== 'Pending' || ($requisition['status'] ?? '') !== 'Pending Approval') {
            return redirect()->back()
                ->with('error', 'HOD approval is required before HR can publish this job.');
        }

        $publishInternal = $this->request->getPost('publish_internal') ? 1 : 0;
        $publishExternal = $this->request->getPost('publish_external') ? 1 : 0;

        if (!$publishInternal && !$publishExternal) {
            $publishInternal = 1;
        }

        $this->requisitionModel->update($id, [
            'hr_status' => 'Approved',
            'status' => 'Published',
            'published_at' => date('Y-m-d H:i:s'),
            'publish_internal' => $publishInternal,
            'publish_external' => $publishExternal,
            'external_boards' => $this->request->getPost('external_boards'),
            'posting_notes' => $this->request->getPost('posting_notes'),
        ]);

        return redirect()->back()->with('success', 'Job published successfully.');
    }

    public function hrReject($id)
    {
        if (!in_array(session('role'), ['superadmin', 'admin', 'hr'], true)) return $this->requisitionAccessDenied();
        $requisition = $this->companyRequisition((int) $id);
        if (!$requisition) {
            return redirect()->back()->with('error', 'Requisition not found.');
        }
        if (($requisition['hod_status'] ?? '') !== 'Approved' || ($requisition['hr_status'] ?? '') !== 'Pending') {
            return redirect()->back()->with('error', 'This requisition is not awaiting HR approval.');
        }

        $this->requisitionModel->update($id, [
            'hr_status' => 'Rejected',
            'status' => 'Rejected',
            'rejection_reason' => $this->request->getPost('rejection_reason'),
        ]);

        return redirect()->back()->with('success', 'Requisition rejected by HR.');
    }

    private function currentCompanyId(): int
    {
        return (int) session('company_id');
    }

    private function companyRequisition(int $id): ?array
    {
        return $this->requisitionModel
            ->where('company_id', $this->currentCompanyId())
            ->where('id', $id)
            ->first();
    }

    private function canCreateRequisition(): bool
    {
        return in_array(session('role'), ['superadmin', 'admin', 'hiring_manager', 'department_head'], true);
    }

    private function canModify(array $requisition): bool
    {
        return in_array(session('role'), ['superadmin', 'admin'], true) || (int) ($requisition['requested_by'] ?? 0) === (int) session('user_id');
    }

    private function requisitionAccessDenied()
    {
        return redirect()->to('/Recruitment/requisitions')->with('error', 'You are not authorized to perform this requisition action.');
    }
}
