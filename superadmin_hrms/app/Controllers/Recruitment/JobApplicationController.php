<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
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

        $resume = $this->request->getFile('resume');
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

        if (!$resume->isValid()) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Please upload a valid resume.');
        }

        $newName = $resume->getRandomName();

        $resume->move(ROOTPATH . 'public/uploads/resumes', $newName);

        $this->jobApplicationModel->insert([
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
            'resume_file' => $newName,
            'resume_original_name' => $resume->getClientName(),
            'status' => 'Applied',
            'applied_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/Recruitment/employee-jobs')
            ->with('success', 'Application submitted successfully.');
    }
}
