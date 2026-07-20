<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
use App\Libraries\RecruitmentResumeService;
use App\Models\Recruitment\JobApplicationModel;
use App\Models\Recruitment\RequisitionModel;

class JobApplicationController extends BaseController
{
    protected $jobApplicationModel;
    protected $requisitionModel;

    public function __construct()
    {
        $this->jobApplicationModel = new JobApplicationModel();
        $this->requisitionModel = new RequisitionModel();
    }

    public function applyForm($id)
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }
        if (session('role') !== 'employee') {
            return redirect()->back()->with('error', 'Only employee candidates can apply for jobs.');
        }

        $job = $this->requisitionModel
            ->where('id', $id)
            ->where('status', 'Published')
            ->where('hod_status', 'Approved')
            ->where('hr_status', 'Approved')
            ->first();

        if (!$job) {
            return redirect()->back()
                ->with('error', 'Job not found.');
        }

        if ($this->jobApplicationModel->hasApplied($id, $userId)) {
            return redirect()->to('/Recruitment/employee-jobs')
                ->with('error', 'You have already applied.');
        }

        return view('Recruitment/apply_job', [
            'job' => $job
        ]);
    }

    public function submitApplication()
    {
        $userId = session('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }
        if (session('role') !== 'employee') return redirect()->back()->with('error', 'Only employee candidates can apply for jobs.');

        $requisitionId = (int) $this->request->getPost('requisition_id');

        $job = $this->requisitionModel
            ->where('id', $requisitionId)
            ->where('status', 'Published')
            ->where('hod_status', 'Approved')
            ->where('hr_status', 'Approved')
            ->first();

        if (!$job) {
            return redirect()->to('/Recruitment/employee-jobs')
                ->with('error', 'Job not available for application.');
        }

        if ($this->jobApplicationModel->hasApplied($requisitionId, $userId)) {
            return redirect()->to('/Recruitment/employee-jobs')
                ->with('error', 'You have already applied for this job.');
        }

        $upload = (new RecruitmentResumeService())->store($this->request->getFile('resume'));
        if (isset($upload['error'])) {
            return redirect()->back()->withInput()->with('error', $upload['error']);
        }

        $applicationId = $this->jobApplicationModel->insert([
            'requisition_id' => $requisitionId,
            'user_id' => $userId,
            'candidate_name' => $this->request->getPost('candidate_name'),
            'candidate_email' => $this->request->getPost('candidate_email'),
            'phone' => $this->request->getPost('phone'),
            'current_company' => $this->request->getPost('current_company'),
            'experience_years' => $this->request->getPost('experience_years'),
            'current_location' => $this->request->getPost('current_location'),
            'linkedin_url' => $this->request->getPost('linkedin_url'),
            'portfolio_url' => $this->request->getPost('portfolio_url'),
            'cover_letter' => $this->request->getPost('cover_letter'),
            'resume_file' => $upload['stored_name'],
            'resume_original_name' => $upload['original_name'],
            'application_source' => $this->request->getPost('application_source') ?: 'Internal Career Portal',
            'status' => 'Applied',
            'applied_at' => date('Y-m-d H:i:s'),
        ], true);

        if (!$applicationId) {
            unlink($upload['path']);
            return redirect()->back()->withInput()->with('error', 'Your application could not be submitted. Please try again.');
        }

        return redirect()->to('/Recruitment/employee-jobs')
            ->with('success', 'Application submitted successfully.');
    }

    public function viewResume($applicationId)
    {
        return $this->serveResume((int) $applicationId, false);
    }

    public function downloadResume($applicationId)
    {
        return $this->serveResume((int) $applicationId, true);
    }

    private function serveResume(int $applicationId, bool $download)
    {
        $application = $this->jobApplicationModel->getApplicationWithDetails($applicationId);

        if (!$application || empty($application['resume_file'])) {
            return redirect()->back()->with('error', 'Resume not found.');
        }

        $isOwner = (int) ($application['user_id'] ?? 0) === (int) session('user_id');
        $isCompanyRecruiter = in_array(session('role'), ['superadmin', 'admin', 'hr'], true)
            && (int) ($application['company_id'] ?? 0) === (int) session('company_id');

        if (!$isOwner && !$isCompanyRecruiter) {
            return redirect()->back()->with('error', 'You do not have access to this resume.');
        }

        $fileName = basename($application['resume_file']);
        $path = ROOTPATH . 'public/uploads/resumes/' . $fileName;

        if (!is_file($path)) {
            return redirect()->back()->with('error', 'Resume file is missing.');
        }

        $originalName = $application['resume_original_name'] ?: $fileName;

        return $this->response->download($path, null)
            ->setFileName($originalName)
            ->setContentType(mime_content_type($path) ?: 'application/octet-stream')
            ->setHeader('Content-Disposition', ($download ? 'attachment' : 'inline') . '; filename="' . addslashes($originalName) . '"');
    }
}
