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

    private function publishedJobsQuery(?string $channel = null): RequisitionModel
    {
        $query = (new RequisitionModel())
            ->where('status', 'Published')
            ->where('hod_status', 'Approved')
            ->where('hr_status', 'Approved');

        if ($channel === 'internal') {
            $query->where('publish_internal', 1);
        }

        if ($channel === 'external') {
            $query->where('publish_external', 1);
        }

        return $query;
    }

    private function getPublishedJobFilters(?string $channel = null)
    {
        $role = $this->request->getGet('role');
        $status = $this->request->getGet('status');
        $sortBy = $this->request->getGet('sort_by');
        $search = trim((string) $this->request->getGet('search'));

        $jobsQuery = $this->publishedJobsQuery($channel);

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

        $roles = array_column($this->publishedJobsQuery($channel)
            ->select('department')
            ->groupBy('department')
            ->orderBy('department')
            ->findAll(), 'department');

        $statuses = array_column($this->publishedJobsQuery($channel)
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
        return view('/Recruitment/jobs', $this->getPublishedJobFilters('external'));
    }

    public function jobsGrid()
    {
        return view('/Recruitment/jobs-grid', $this->getPublishedJobFilters('external'));
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

        $jobs = $this->getPublishedJobFilters('internal');

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

        $jobs = $this->getPublishedJobFilters('internal');
        $jobs['appliedIds'] = $this->jobApplicationModel->getAppliedJobIds($userId) ?? [];

        return view('Recruitment/employee-jobs-grid', $jobs);
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

        return view('/Recruitment/view_job', [
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

    public function deleteCandidateApplication($id)
    {
        if (session('role') !== 'admin') {
            return redirect()->to('/Recruitment/candidates')
                ->with('error', 'Only admins can delete candidate applications.');
        }

        $application = $this->jobApplicationModel->find((int) $id);

        if (!$application) {
            return redirect()->to('/Recruitment/candidates')
                ->with('error', 'Candidate application not found.');
        }

        $this->jobApplicationModel->delete((int) $id);

        return redirect()->to('/Recruitment/candidates')
            ->with('success', 'Candidate application deleted successfully.');
    }

    public function shortlistCandidateApplication($id)
    {
        if (!$this->canManageCandidates()) {
            return $this->redirectCandidateAccessDenied();
        }

        $application = $this->jobApplicationModel->find((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }

        $this->jobApplicationModel->update((int) $id, [
            'status' => 'Shortlisted',
            'screening_decision' => 'Shortlisted',
            'screening_notes' => $this->request->getPost('screening_notes'),
            'shortlisted_at' => date('Y-m-d H:i:s'),
            'rejection_reason' => null,
        ]);

        return redirect()->back()->with('success', 'Candidate shortlisted successfully.');
    }

    public function rejectCandidateApplication($id)
    {
        if (!$this->canManageCandidates()) {
            return $this->redirectCandidateAccessDenied();
        }

        $application = $this->jobApplicationModel->find((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }

        $this->jobApplicationModel->update((int) $id, [
            'status' => 'Rejected',
            'screening_decision' => 'Rejected',
            'evaluation_status' => 'Rejected',
            'rejection_reason' => $this->request->getPost('rejection_reason'),
            'evaluated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Candidate rejected and moved out of the interview flow.');
    }

    public function scheduleCandidateInterview($id)
    {
        if (!$this->canManageCandidates()) {
            return $this->redirectCandidateAccessDenied();
        }

        $application = $this->jobApplicationModel->find((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }

        $interviewDate = $this->request->getPost('interview_date');
        $formattedDate = !empty($interviewDate) ? date('Y-m-d H:i:s', strtotime($interviewDate)) : null;

        if (!$formattedDate) {
            return redirect()->back()->with('error', 'Please select a valid interview date and time.');
        }

        $this->jobApplicationModel->update((int) $id, [
            'status' => 'Interview Scheduled',
            'interview_round' => $this->request->getPost('interview_round') ?: 'Round 1 - HR Screening',
            'interview_date' => $formattedDate,
            'interview_mode' => $this->request->getPost('interview_mode') ?: 'Online',
            'interviewer_name' => $this->request->getPost('interviewer_name'),
            'interview_notes' => $this->request->getPost('interview_notes'),
        ]);

        return redirect()->back()->with('success', 'Interview scheduled successfully.');
    }

    public function evaluateCandidateApplication($id)
    {
        if (!$this->canManageCandidates()) {
            return $this->redirectCandidateAccessDenied();
        }

        $application = $this->jobApplicationModel->find((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }

        $technicalScore = $this->boundedScore($this->request->getPost('technical_score'));
        $communicationScore = $this->boundedScore($this->request->getPost('communication_score'));
        $cultureScore = $this->boundedScore($this->request->getPost('culture_score'));
        $totalScore = (int) round(($technicalScore + $communicationScore + $cultureScore) / 3);
        $decision = $this->request->getPost('evaluation_status') === 'Selected' ? 'Selected' : 'Rejected';

        $this->jobApplicationModel->update((int) $id, [
            'status' => $decision,
            'technical_score' => $technicalScore,
            'communication_score' => $communicationScore,
            'culture_score' => $cultureScore,
            'total_score' => $totalScore,
            'evaluation_status' => $decision,
            'interview_notes' => $this->request->getPost('interview_notes'),
            'rejection_reason' => $decision === 'Rejected' ? $this->request->getPost('rejection_reason') : null,
            'evaluated_at' => date('Y-m-d H:i:s'),
            'selected_at' => $decision === 'Selected' ? date('Y-m-d H:i:s') : null,
        ]);

        return redirect()->back()->with('success', 'Candidate evaluation saved successfully.');
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

    private function canManageCandidates(): bool
    {
        return session('role') === 'admin';
    }

    private function redirectCandidateAccessDenied()
    {
        return redirect()->to('/Recruitment/candidates')
            ->with('error', 'Only admins can manage candidate evaluations.');
    }

    private function boundedScore($score): int
    {
        return max(0, min(100, (int) $score));
    }

}
