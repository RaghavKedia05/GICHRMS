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

    private function publishedJobsQuery(): RequisitionModel
    {
        return (new RequisitionModel())
            ->where('status', 'Published')
            ->where('hod_status', 'Approved')
            ->where('hr_status', 'Approved');
    }

    private function getPublishedJobFilters()
    {
        $role = $this->request->getGet('role');
        $status = $this->request->getGet('status');
        $sortBy = $this->request->getGet('sort_by');
        $search = trim((string) $this->request->getGet('search'));

        $jobsQuery = $this->publishedJobsQuery();

        if (!empty($role)) {
            $jobsQuery->where('department', $role);
        }

        if (!empty($status)) {
            $jobsQuery->where('employment_type', $status);
        }

        if (!empty($search)) {
            $jobsQuery->groupStart()
                ->like('job_title', $search)
                ->orLike('department', $search)
                ->orLike('description', $search)
                ->groupEnd();
        }

        switch ($sortBy) {
            case 'oldest':
                $jobsQuery->orderBy('published_at', 'ASC');
                break;
            case 'title':
                $jobsQuery->orderBy('job_title', 'ASC');
                break;
            case 'department':
                $jobsQuery->orderBy('department', 'ASC');
                break;
            default:
                $jobsQuery->orderBy('published_at', 'DESC');
                break;
        }

        $jobs = $jobsQuery->findAll();

        $roles = array_column($this->publishedJobsQuery()
            ->select('department')
            ->groupBy('department')
            ->orderBy('department')
            ->findAll(), 'department');

        $statuses = array_column($this->publishedJobsQuery()
            ->select('employment_type')
            ->groupBy('employment_type')
            ->orderBy('employment_type')
            ->findAll(), 'employment_type');

        return [
            'jobs' => $jobs,
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
        $requisition = $this->requisitionModel
            ->where('id', $id)
            ->where('status', 'Published')
            ->where('hod_status', 'Approved')
            ->where('hr_status', 'Approved')
            ->first();

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

    public function employeeJobsGrid()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        return view('Recruitment/employee-jobs-grid', $this->getPublishedJobFilters());
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

        $requisitionId = (int) $this->request->getPost('requisition_id');

        if (!$userId || !$requisitionId) {
            return redirect()->back()
                ->with('error', 'Unable to submit application.');
        }

        $requisition = $this->requisitionModel
            ->where('id', $requisitionId)
            ->where('status', 'Published')
            ->where('hod_status', 'Approved')
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
            ->where('hod_status', 'Approved')
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
        return view('/Recruitment/candidates', [
            'applications' => $this->getCandidateApplications(),
        ]);
    }

    public function candidatesGrid()
    {
        return view('/Recruitment/candidates-grid', [
            'applications' => $this->getCandidateApplications(),
        ]);
    }

    public function candidatesKanban()
    {
        return view('/Recruitment/candidates-kanban', [
            'applications' => $this->getCandidateApplications(),
        ]);
    }

    private function getCandidateApplications(): array
    {
        try {
            return $this->jobApplicationModel->getApplicationsWithDetails();
        } catch (\Throwable $e) {
            log_message('error', 'Failed to load job applications: ' . $e->getMessage());
            return [];
        }
    }

}
