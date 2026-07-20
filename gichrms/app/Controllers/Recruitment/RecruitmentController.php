<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
use App\Libraries\CompanyEmailService;
use App\Models\CompanyModel;
use App\Models\Recruitment\JobApplicationModel;
use App\Models\Recruitment\InterviewRoundEvaluationModel;
use App\Models\Recruitment\RequisitionModel;

class RecruitmentController extends BaseController
{
    protected $requisitionModel;
    protected $jobApplicationModel;
    protected $roundEvaluationModel;

    public function __construct()
    {
        $this->requisitionModel = new RequisitionModel();
        $this->jobApplicationModel = new JobApplicationModel();
        $this->roundEvaluationModel = new InterviewRoundEvaluationModel();
    }

    private function publishedJobsQuery(?string $channel = null): RequisitionModel
    {
        $query = (new RequisitionModel())
            ->where('status', 'Published')
            ->where('hod_status', 'Approved')
            ->where('hr_status', 'Approved');

        if ($channel === 'internal') {
            $query->where('publish_internal', 1);

            if ((int) session('company_id') > 0) {
                $query->where('company_id', (int) session('company_id'));
            }
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
        return view('Recruitment/jobs_grid', $this->getPublishedJobFilters('external'));
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

        return view('Recruitment/employee_jobs', [

            'jobs' => $jobs['jobs'],
            'roles' => $jobs['roles'],
            'statuses' => $jobs['statuses'],
            'filterRole' => $jobs['filterRole'],
            'filterStatus' => $jobs['filterStatus'],
            'filterSort' => $jobs['filterSort'],
            'searchQuery' => $jobs['searchQuery'],

            'appliedIds' => $appliedIds

        ]);
    }

    public function employeeJobsGrid()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        $jobs = $this->getPublishedJobFilters('internal');
        $jobs['appliedIds'] = $this->jobApplicationModel->getAppliedJobIds($userId);

        return view('Recruitment/employee_jobs_grid', $jobs);
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
        return view('Recruitment/candidates_grid', [
            'applications' => $this->getCandidateApplications(),
        ]);
    }

    public function candidatesKanban()
    {
        return view('Recruitment/candidates_kanban', [
            'applications' => $this->getCandidateApplications(),
        ]);
    }

    public function evaluation()
    {
        $applications = $this->getCandidateApplications();
        $roundScores = [];
        foreach ($applications as $application) {
            $applicationId = (int) ($application['application_id'] ?? 0);
            $roundScores[$applicationId] = $this->roundEvaluationModel->forApplication($applicationId);
        }

        return view('/Recruitment/evaluation', [
            'applications' => $applications,
            'stats' => $this->getEvaluationStats($applications),
            'roundScores' => $roundScores,
        ]);
    }

    public function candidateProfile($id)
    {
        if (!$this->canManageCandidates()) return $this->redirectCandidateAccessDenied();
        $application = $this->companyApplication((int) $id);

        if (!$application) {
            return redirect()->to('/Recruitment/evaluation')
                ->with('error', 'Candidate application not found.');
        }
        return view('/Recruitment/candidate_profile', [
            'application' => $application,
            'isAdmin' => $this->canManageCandidates(),
            'roundEvaluations' => $this->roundEvaluationModel->forApplication((int) $id),
        ]);
    }

    public function deleteCandidateApplication($id)
    {
        if (!in_array(session('role'), ['superadmin', 'admin'], true)) {
            return redirect()->to('/Recruitment/candidates')
                ->with('error', 'Only admins can delete candidate applications.');
        }

        $application = $this->companyApplication((int) $id);

        if (!$application) {
            return redirect()->to('/Recruitment/candidates')
                ->with('error', 'Candidate application not found.');
        }

        if (in_array($application['application_status'] ?? '', ['Selected', 'Documents Requested', 'Documents Submitted', 'Offer Sent', 'Offer Accepted', 'Offer Declined', 'Hired'], true)) {
            return redirect()->back()->with('error', 'Applications in selection or onboarding cannot be deleted.');
        }

        $this->jobApplicationModel->delete((int) $id);

        return redirect()->to('/Recruitment/candidates')
            ->with('success', 'Candidate application deleted successfully.');
    }

    public function shortlistCandidateApplication($id)
    {
        // Phase 3 begins when HR accepts the resume screening.
        if (!$this->canManageCandidates()) {
            return $this->redirectCandidateAccessDenied();
        }

        $application = $this->companyApplication((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }

        if (!in_array($application['status'] ?? '', ['Applied', 'Shortlisted'], true)) {
            return redirect()->back()
                ->with('error', 'Only newly applied candidates can be shortlisted.');
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

        $application = $this->companyApplication((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }

        if (in_array($application['application_status'] ?? '', ['Rejected', 'Selected', 'Documents Requested', 'Documents Submitted', 'Offer Sent', 'Offer Accepted', 'Offer Declined', 'Hired'], true)) {
            return redirect()->back()->with('error', 'This application is already in a terminal or onboarding state.');
        }

        $rejectionReason = trim((string) $this->request->getPost('rejection_reason'));
        $applicationDetails = $application;

        $updated = $this->jobApplicationModel->update((int) $id, [
            'status' => 'Rejected',
            'screening_decision' => 'Rejected',
            'evaluation_status' => 'Rejected',
            'rejection_reason' => $rejectionReason !== '' ? $rejectionReason : null,
            'evaluated_at' => date('Y-m-d H:i:s'),
            'decision_viewed_at' => null,
        ]);

        if (!$updated) {
            return redirect()->back()->with('error', 'The candidate could not be rejected. Please try again.');
        }

        $emailSent = $this->sendCandidateRejectionEmail($applicationDetails, $rejectionReason);

        if (!$emailSent) {
            return redirect()->back()
                ->with('error', 'Candidate rejected, but the email could not be delivered. Verify Settings > Company Email and send a test email.');
        }

        return redirect()->back()->with('success', 'Candidate rejected and the rejection email was sent.');
    }

    public function scheduleCandidateInterview($id)
    {
        // Keep interview scheduling on the application row for a simple audit trail.
        if (!$this->canManageCandidates()) {
            return $this->redirectCandidateAccessDenied();
        }

        $application = $this->companyApplication((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }
        if (in_array($application['application_status'] ?? '', ['Rejected', 'Selected', 'Documents Requested', 'Documents Submitted', 'Offer Sent', 'Offer Accepted', 'Offer Declined', 'Hired'], true)) {
            return redirect()->back()->with('error', 'This application is already in a terminal or onboarding state.');
        }

        if (!in_array($application['status'] ?? '', ['Shortlisted', 'Interview Scheduled'], true)) {
            return redirect()->back()
                ->with('error', 'Shortlist the candidate before scheduling an interview.');
        }

        $interviewDate = $this->request->getPost('interview_date');
        $interviewTimestamp = !empty($interviewDate) ? strtotime($interviewDate) : false;
        $formattedDate = $interviewTimestamp ? date('Y-m-d H:i:s', $interviewTimestamp) : null;

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
        // Scores are stored as 0-100 values and averaged for the final score.
        if (!$this->canManageCandidates()) {
            return $this->redirectCandidateAccessDenied();
        }

        $application = $this->companyApplication((int) $id);

        if (!$application) {
            return redirect()->back()->with('error', 'Candidate application not found.');
        }

        if (($application['status'] ?? '') !== 'Interview Scheduled') {
            return redirect()->back()
                ->with('error', 'Schedule an interview before saving the evaluation result.');
        }

        $technicalScore = $this->boundedScore($this->request->getPost('technical_score'));
        $communicationScore = $this->boundedScore($this->request->getPost('communication_score'));
        $cultureScore = $this->boundedScore($this->request->getPost('culture_score'));
        $totalScore = (int) round(($technicalScore + $communicationScore + $cultureScore) / 3);
        $requestedDecision = (string) $this->request->getPost('evaluation_status');
        $decision = in_array($requestedDecision, ['Advanced', 'Selected'], true) ? $requestedDecision : 'Rejected';
        $applicationStatus = $decision === 'Advanced' ? 'Shortlisted' : $decision;

        $wasRejected = ($application['status'] ?? '') === 'Rejected';
        $rejectionReason = $decision === 'Rejected'
            ? trim((string) $this->request->getPost('rejection_reason'))
            : '';
        $applicationDetails = $decision === 'Rejected' && !$wasRejected
            ? $application
            : [];

        $roundName = trim((string) ($application['interview_round'] ?? 'Round 1')) ?: 'Round 1';
        preg_match('/Round\s+(\d+)/i', $roundName, $roundMatch);
        $roundNumber = max(1, (int) ($roundMatch[1] ?? 1));
        $evaluatedAt = date('Y-m-d H:i:s');

        $db = db_connect();
        $db->transStart();
        $updated = $this->jobApplicationModel->update((int) $id, [
            'status' => $applicationStatus,
            'technical_score' => $technicalScore,
            'communication_score' => $communicationScore,
            'culture_score' => $cultureScore,
            'total_score' => $totalScore,
            'evaluation_status' => $decision,
            'interview_notes' => $this->request->getPost('interview_notes'),
            'rejection_reason' => $decision === 'Rejected' && $rejectionReason !== '' ? $rejectionReason : null,
            'evaluated_at' => $evaluatedAt,
            'decision_viewed_at' => null,
            'selected_at' => $decision === 'Selected' ? date('Y-m-d H:i:s') : null,
        ]);

        $existingRound = $this->roundEvaluationModel
            ->where('application_id', (int) $id)
            ->where('round_number', $roundNumber)
            ->first();
        $roundPayload = [
            'application_id' => (int) $id,
            'round_number' => $roundNumber,
            'round_name' => $roundName,
            'technical_score' => $technicalScore,
            'communication_score' => $communicationScore,
            'culture_score' => $cultureScore,
            'total_score' => $totalScore,
            'decision' => $decision,
            'notes' => $this->request->getPost('interview_notes'),
            'evaluated_by' => (int) session('user_id') ?: null,
            'evaluated_at' => $evaluatedAt,
        ];
        $existingRound
            ? $this->roundEvaluationModel->update((int) $existingRound['id'], $roundPayload)
            : $this->roundEvaluationModel->insert($roundPayload);
        $db->transComplete();

        if (!$updated || !$db->transStatus()) {
            return redirect()->back()->with('error', 'The candidate evaluation could not be saved. Please try again.');
        }

        if ($decision === 'Rejected' && !$wasRejected) {
            $emailSent = $this->sendCandidateRejectionEmail($applicationDetails, $rejectionReason);

            if (!$emailSent) {
                return redirect()->back()
                    ->with('error', 'Candidate evaluation saved as rejected, but the email could not be delivered. Verify Settings > Company Email.');
            }

            return redirect()->back()
                ->with('success', 'Candidate evaluation saved and the rejection email was sent.');
        }

        if ($decision === 'Selected') {
            $emailSent = $this->sendCandidateSelectionEmail($application);

            if (!$emailSent) {
                return redirect()->back()
                    ->with('error', 'Candidate selected and their in-app notification is ready, but the email could not be delivered. Verify Settings > Company Email.');
            }

            return redirect()->back()
                ->with('success', 'Candidate selected. An in-app notification and selection email were sent.');
        }

        if ($decision === 'Advanced') {
            return redirect()->back()->with('success', 'Round score saved. The candidate can now be scheduled for the next round.');
        }

        return redirect()->back()->with('success', 'Candidate evaluation saved successfully.');
    }

    public function viewApplicationDecision($id)
    {
        $application = $this->jobApplicationModel
            ->where('id', (int) $id)
            ->where('user_id', (int) session('user_id'))
            ->first();

        if (!$application || !in_array($application['status'] ?? '', ['Selected', 'Rejected'], true)) {
            return redirect()->to('/Recruitment/employee-jobs')
                ->with('error', 'Application decision notification not found.');
        }

        $this->jobApplicationModel->update((int) $id, ['decision_viewed_at' => date('Y-m-d H:i:s')]);

        if (($application['status'] ?? '') === 'Selected') {
            return redirect()->to('/Recruitment/offers/' . (int) $id)
                ->with('success', 'Congratulations! You have been selected for this position.');
        }

        return redirect()->to('/Recruitment/employee-jobs')
            ->with('info', 'Your application status has been updated.');
    }

    private function getCandidateApplications(): array
    {
        try {
            return $this->jobApplicationModel->getApplicationsWithDetails((int) session('company_id'));
        } catch (\Throwable $e) {
            log_message('error', 'Failed to load job applications: ' . $e->getMessage());
            return [];
        }
    }

    private function canManageCandidates(): bool
    {
        return in_array(session('role'), ['superadmin', 'admin', 'hr'], true);
    }

    private function redirectCandidateAccessDenied()
    {
        return redirect()->to('/Recruitment/candidates')
            ->with('error', 'Only admins and HR can manage candidate evaluations.');
    }

    private function boundedScore($score): int
    {
        return max(0, min(100, (int) $score));
    }

    private function sendCandidateRejectionEmail(array $application, string $rejectionReason = ''): bool
    {
        $recipientEmail = trim((string) ($application['candidate_email'] ?? $application['email'] ?? ''));

        if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL)) {
            log_message('warning', 'Rejection email skipped for application {id}: invalid candidate email address.', [
                'id' => $application['application_id'] ?? $application['id'] ?? 'unknown',
            ]);
            return false;
        }

        $companyId = (int) ($application['company_id'] ?? session('company_id'));
        $company = (new CompanyModel())->find($companyId);
        $companyName = trim((string) ($company['name'] ?? 'Recruitment Team'));
        $rejectorEmail = trim((string) session('email'));
        $rejectorName = trim((string) session('name')) ?: 'Recruitment Team';
        $rejectorRole = ucwords(str_replace('_', ' ', (string) session('role')));
        $candidateName = trim((string) ($application['candidate_name'] ?? $application['name'] ?? 'Candidate'));
        $jobTitle = trim((string) ($application['job_title'] ?? 'the position'));

        if ($companyId <= 0 || !$company) {
            log_message('error', 'Rejection email skipped: application is not linked to a valid company.');
            return false;
        }

        $emailService = new CompanyEmailService();
        $sent = $emailService->sendForCompany(
            $companyId,
            $recipientEmail,
            'Update on your application for ' . $jobTitle,
            view('emails/candidate_rejection', [
                'candidateName' => $candidateName !== '' ? $candidateName : 'Candidate',
                'jobTitle' => $jobTitle !== '' ? $jobTitle : 'the position',
                'rejectionReason' => $rejectionReason,
                'companyName' => $companyName,
                'senderName' => $rejectorName,
                'senderRole' => $rejectorRole !== '' ? $rejectorRole : 'Recruitment Team',
            ]),
            $rejectorEmail,
            $rejectorName
        );

        if (!$sent) {
            log_message('error', 'Rejection email failed for application {id}: {message}', [
                'id' => $application['application_id'] ?? $application['id'] ?? 'unknown',
                'message' => $emailService->getLastError(),
            ]);
        }

        return $sent;
    }

    private function sendCandidateSelectionEmail(array $application): bool
    {
        $recipientEmail = trim((string) ($application['candidate_email'] ?? $application['email'] ?? ''));
        $companyId = (int) ($application['company_id'] ?? session('company_id'));
        $company = (new CompanyModel())->find($companyId);

        if (!filter_var($recipientEmail, FILTER_VALIDATE_EMAIL) || $companyId <= 0 || !$company) {
            log_message('warning', 'Selection email skipped for application {id}: invalid recipient or company.', [
                'id' => $application['application_id'] ?? $application['id'] ?? 'unknown',
            ]);
            return false;
        }

        $candidateName = trim((string) ($application['candidate_name'] ?? $application['name'] ?? 'Candidate'));
        $jobTitle = trim((string) ($application['job_title'] ?? 'the position'));
        $senderName = trim((string) session('name')) ?: 'Recruitment Team';
        $senderEmail = trim((string) session('email'));
        $senderRole = ucwords(str_replace('_', ' ', (string) session('role')));
        $emailService = new CompanyEmailService();

        $sent = $emailService->sendForCompany(
            $companyId,
            $recipientEmail,
            'Congratulations - selected for ' . $jobTitle,
            view('emails/candidate_selection', [
                'candidateName' => $candidateName !== '' ? $candidateName : 'Candidate',
                'jobTitle' => $jobTitle !== '' ? $jobTitle : 'the position',
                'companyName' => trim((string) ($company['name'] ?? 'Recruitment Team')),
                'senderName' => $senderName,
                'senderRole' => $senderRole !== '' ? $senderRole : 'Recruitment Team',
                'applicationUrl' => base_url('Recruitment/applications/decision/' . (int) ($application['application_id'] ?? $application['id'] ?? 0)),
            ]),
            $senderEmail,
            $senderName
        );

        if (!$sent) {
            log_message('error', 'Selection email failed for application {id}: {message}', [
                'id' => $application['application_id'] ?? $application['id'] ?? 'unknown',
                'message' => $emailService->getLastError(),
            ]);
        }

        return $sent;
    }

    private function companyApplication(int $applicationId): ?array
    {
        return $this->jobApplicationModel->getApplicationWithDetails(
            $applicationId,
            (int) session('company_id')
        );
    }

    private function getEvaluationStats(array $applications): array
    {
        $stats = [
            'Applied' => 0,
            'Shortlisted' => 0,
            'Interview Scheduled' => 0,
            'Selected' => 0,
            'Rejected' => 0,
        ];

        foreach ($applications as $application) {
            $status = $application['application_status'] ?? 'Applied';
            if (isset($stats[$status])) {
                $stats[$status]++;
            }
        }

        return $stats;
    }

}
