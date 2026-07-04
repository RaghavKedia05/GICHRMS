<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
use App\Models\Recruitment\JobApplicationModel;
use App\Models\Recruitment\RequisitionModel;

class RecruitmentController extends BaseController
{
    protected $requisitionModel;
    protected $jobApplicationModel;

    public function __construct()
    {
        $this->requisitionModel = new RequisitionModel();
        $this->jobApplicationModel = new JobApplicationModel();
    }

    private function getPublishedJobFilters()
    {
        $role = $this->request->getGet('role');
        $status = $this->request->getGet('status');
        $sortBy = $this->request->getGet('sort_by');
        $search = trim($this->request->getGet('search'));

        $builder = $this->requisitionModel
            ->where('status', 'Published')
            ->where('hr_status', 'Approved');

        if (!empty($role)) {
            $builder->where('department', $role);
        }

        if (!empty($status)) {
            $builder->where('employment_type', $status);
        }

        if (!empty($search)) {
            $builder->groupStart()
                ->like('job_title', $search)
                ->orLike('department', $search)
                ->orLike('description', $search)
                ->groupEnd();
        }

        switch ($sortBy) {
            case 'oldest':
                $builder->orderBy('published_at', 'ASC');
                break;
            case 'title':
                $builder->orderBy('job_title', 'ASC');
                break;
            case 'department':
                $builder->orderBy('department', 'ASC');
                break;
            default:
                $builder->orderBy('published_at', 'DESC');
                break;
        }

        $roles = array_column($this->requisitionModel
            ->select('department')
            ->where('status', 'Published')
            ->where('hr_status', 'Approved')
            ->groupBy('department')
            ->orderBy('department')
            ->findAll(), 'department');

        $statuses = array_column($this->requisitionModel
            ->select('employment_type')
            ->where('status', 'Published')
            ->where('hr_status', 'Approved')
            ->groupBy('employment_type')
            ->orderBy('employment_type')
            ->findAll(), 'employment_type');

        return [
            'jobs' => $builder->findAll(),
            'roles' => $roles,
            'statuses' => $statuses,
            'filterRole' => $role,
            'filterStatus' => $status,
            'filterSort' => $sortBy,
            'searchQuery' => $search,
        ];
    }

    public function jobs()
    {
        return view('/Recruitment/jobs', $this->getPublishedJobFilters());
    }

    public function jobsGrid()
    {
        return view('/Recruitment/jobs-grid', $this->getPublishedJobFilters());
    }

    public function viewJob($id)
    {
        $requisition = $this->requisitionModel->find($id);

        if (!$requisition) {
            return redirect()->to('/Recruitment/jobs')
                ->with('error', 'Job not found.');
        }

        return view('/Recruitment/view_job', [
            'requisition' => $requisition,
        ]);
    }

    public function employeeJobs()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        $jobs = $this->getPublishedJobFilters();

        $appliedIds = $this->jobApplicationModel
            ->getAppliedJobIds($userId);

        return view('Recruitment/employee-jobs', [

            'jobs' => $jobs['jobs'],
            'roles' => $jobs['roles'],
            'statuses' => $jobs['statuses'],
            'filterRole' => $jobs['filterRole'],
            'filterStatus' => $jobs['filterStatus'],
            'filterSort' => $jobs['filterSort'],
            'searchQuery' => $jobs['searchQuery'],

            'appliedIds' => $appliedIds ?? []

        ]);
    }

    public function applyJob()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->back();
        }

        $userId = session('user_id');
        $userRole = session('role');

        if (!$userId || $userRole !== 'employee') {
            return redirect()->back()
                ->with('error', 'Only employees can submit job applications.');
        }

        $userId = session('user_id');
        $requisitionId = (int) $this->request->getPost('requisition_id');

        if (!$userId || !$requisitionId) {
            return redirect()->back()
                ->with('error', 'Unable to submit application.');
        }

        $requisition = $this->requisitionModel
            ->where('id', $requisitionId)
            ->where('status', 'Published')
            ->where('hr_status', 'Approved')
            ->first();

        if (!$requisition) {
            return redirect()->back()
                ->with('error', 'Job not available for application.');
        }

        if ($this->jobApplicationModel->hasApplied($requisitionId, $userId)) {
            return redirect()->back()
                ->with('error', 'You have already applied for this job.');
        }

        $this->jobApplicationModel->insert([
            'requisition_id' => $requisitionId,
            'user_id' => $userId,
            'status' => 'Applied',
            'applied_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()
            ->with('success', 'Your application has been submitted.');
    }

    public function viewJobModal($id)
    {
        $requisition = $this->requisitionModel
            ->where('id', $id)
            ->where('status', 'Published')
            ->where('hr_status', 'Approved')
            ->first();

        if (!$requisition) {
            return $this->response
                ->setStatusCode(404)
                ->setBody('<div class="p-8 text-center text-red-600">Job details not available.</div>');
        }

        return view('/Recruitment/view_requisition_modal', [
            'requisition' => $requisition,
        ]);
    }

    public function candidates()
    {
        try {
            $applications = $this->jobApplicationModel->getApplicationsWithDetails();
        } catch (\Throwable $e) {
            log_message('error', 'Failed to load job applications: ' . $e->getMessage());
            $applications = [];
        }

        return view('/Recruitment/candidates', [
            'applications' => $applications,
        ]);
    }

    public function candidatesGrid()
    {
        return view('/Recruitment/candidates-grid');
    }

    public function candidatesKanban()
    {
        return view('/Recruitment/candidates-kanban');
    }


}
