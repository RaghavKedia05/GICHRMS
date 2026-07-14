<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
use App\Models\Recruitment\JobApplicationModel;
use App\Models\Recruitment\RequisitionModel;

class CareerPortalController extends BaseController
{
    private JobApplicationModel $applications;

    public function __construct()
    {
        $this->applications = new JobApplicationModel();
    }

    public function index()
    {
        $search = trim((string) $this->request->getGet('search'));
        $department = trim((string) $this->request->getGet('department'));
        $location = trim((string) $this->request->getGet('location'));
        $type = trim((string) $this->request->getGet('type'));
        $query = $this->externalJobs()->select('job_requisitions.*, companies.name AS company_name');

        if ($search !== '') {
            $query->groupStart()->like('job_title', $search)->orLike('description', $search)->orLike('mandatory_skills', $search)->groupEnd();
        }
        if ($department !== '') $query->where('department', $department);
        if ($location !== '') $query->where('location', $location);
        if ($type !== '') $query->where('employment_type', $type);

        return view('careers/index', [
            'jobs' => $query->orderBy('published_at', 'DESC')->findAll(100),
            'departments' => $this->distinctValues('department'),
            'locations' => $this->distinctValues('location'),
            'types' => $this->distinctValues('employment_type'),
            'filters' => compact('search', 'department', 'location', 'type'),
        ]);
    }

    public function show($id)
    {
        $job = $this->findExternalJob((int) $id);
        if (!$job) return redirect()->to('/careers')->with('error', 'This job is no longer available.');
        return view('careers/show', ['job' => $job]);
    }

    public function apply($id)
    {
        $job = $this->findExternalJob((int) $id);
        if (!$job) return redirect()->to('/careers')->with('error', 'This job is no longer accepting applications.');

        $rules = [
            'candidate_name' => 'required|min_length[2]|max_length[120]',
            'candidate_email' => 'required|valid_email|max_length[150]',
            'phone' => 'required|min_length[7]|max_length[30]',
            'experience_years' => 'permit_empty|decimal|greater_than_equal_to[0]|less_than_equal_to[60]',
            'current_location' => 'required|max_length[120]',
            'linkedin_url' => 'permit_empty|valid_url_strict|max_length[255]',
            'portfolio_url' => 'permit_empty|valid_url_strict|max_length[255]',
            'cover_letter' => 'permit_empty|max_length[5000]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $email = strtolower(trim((string) $this->request->getPost('candidate_email')));
        if ($this->applications->hasExternalApplied((int) $id, $email)) {
            return redirect()->back()->withInput()->with('error', 'An application for this job has already been submitted with this email address.');
        }

        $resume = $this->request->getFile('resume');
        if (!$resume || !$resume->isValid() || $resume->getSizeByUnit('mb') > 5) {
            return redirect()->back()->withInput()->with('error', 'Please upload a valid resume no larger than 5 MB.');
        }

        $extension = strtolower((string) $resume->getClientExtension());
        $allowedMimes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/octet-stream'];
        if (!in_array($extension, ['pdf', 'doc', 'docx'], true) || !in_array($resume->getMimeType(), $allowedMimes, true)) {
            return redirect()->back()->withInput()->with('error', 'Resume must be a PDF, DOC, or DOCX file.');
        }

        $uploadPath = ROOTPATH . 'public/uploads/resumes';
        if (!is_dir($uploadPath) && !mkdir($uploadPath, 0775, true) && !is_dir($uploadPath)) {
            return redirect()->back()->withInput()->with('error', 'Resume storage is temporarily unavailable.');
        }

        $storedName = $resume->getRandomName();
        $resume->move($uploadPath, $storedName);
        $applicationId = $this->applications->insert([
            'requisition_id' => (int) $id,
            'user_id' => null,
            'candidate_name' => trim((string) $this->request->getPost('candidate_name')),
            'candidate_email' => $email,
            'phone' => trim((string) $this->request->getPost('phone')),
            'current_company' => trim((string) $this->request->getPost('current_company')) ?: null,
            'experience_years' => $this->request->getPost('experience_years') !== '' ? $this->request->getPost('experience_years') : null,
            'current_location' => trim((string) $this->request->getPost('current_location')),
            'linkedin_url' => trim((string) $this->request->getPost('linkedin_url')) ?: null,
            'portfolio_url' => trim((string) $this->request->getPost('portfolio_url')) ?: null,
            'cover_letter' => trim((string) $this->request->getPost('cover_letter')) ?: null,
            'resume_file' => $storedName,
            'resume_original_name' => basename($resume->getClientName()),
            'application_source' => 'External Careers Portal',
            'status' => 'Applied',
            'applied_at' => date('Y-m-d H:i:s'),
        ], true);

        if (!$applicationId) {
            @unlink($uploadPath . DIRECTORY_SEPARATOR . $storedName);
            return redirect()->back()->withInput()->with('error', 'Your application could not be submitted. Please try again.');
        }

        session()->setFlashdata('application_reference', 'GIC-' . str_pad((string) $applicationId, 6, '0', STR_PAD_LEFT));
        session()->setFlashdata('application_job', $job['job_title']);
        return redirect()->to('/careers/application-received');
    }

    public function success()
    {
        $reference = session()->getFlashdata('application_reference');
        if (!$reference) return redirect()->to('/careers');
        return view('careers/success', ['reference' => $reference, 'jobTitle' => session()->getFlashdata('application_job')]);
    }

    private function findExternalJob(int $id): ?array
    {
        return $this->externalJobs()->select('job_requisitions.*, companies.name AS company_name')->where('job_requisitions.id', $id)->first();
    }

    private function externalJobs(): RequisitionModel
    {
        return (new RequisitionModel())
            ->join('companies', 'companies.id = job_requisitions.company_id')
            ->where('job_requisitions.status', 'Published')
            ->where('job_requisitions.hod_status', 'Approved')
            ->where('job_requisitions.hr_status', 'Approved')
            ->where('job_requisitions.publish_external', 1)
            ->where('companies.is_active', 1);
    }

    private function distinctValues(string $column): array
    {
        return array_column($this->externalJobs()->select($column)->where($column . ' !=', '')->groupBy($column)->orderBy($column)->findAll(), $column);
    }
}
