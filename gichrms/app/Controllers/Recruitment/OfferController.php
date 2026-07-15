<?php

namespace App\Controllers\Recruitment;

use App\Controllers\BaseController;
use App\Libraries\CompanyEmailService;
use App\Models\CompanyModel;
use App\Models\DepartmentModel;
use App\Models\Recruitment\JobApplicationModel;
use App\Models\UserModel;

class OfferController extends BaseController
{
    private JobApplicationModel $applications;

    public function __construct()
    {
        $this->applications = new JobApplicationModel();
    }

    public function index()
    {
        $applications = $this->applications->getApplicationsWithDetails((int) session('company_id'));
        $applications = array_values(array_filter($applications, fn ($row) =>
            in_array($row['application_status'] ?? '', ['Selected', 'Documents Requested', 'Documents Submitted', 'Offer Sent', 'Offer Accepted', 'Offer Declined', 'Hired'], true)
        ));

        if (!$this->canManage()) {
            $applications = array_values(array_filter($applications, fn ($row) => (int) $row['user_id'] === (int) session('user_id')));
        }

        return view('Recruitment/offers', ['applications' => $applications, 'canManage' => $this->canManage()]);
    }

    public function show($id)
    {
        $application = $this->accessibleApplication((int) $id);
        if (!$application) {
            return redirect()->to('/Recruitment/offers')->with('error', 'Offer record not found.');
        }

        return view('Recruitment/offer_profile', ['application' => $application, 'canManage' => $this->canManage()]);
    }

    public function letter($id)
    {
        $application = $this->accessibleApplication((int) $id);
        if (!$application || !in_array($application['offer_status'] ?? '', ['Sent', 'Accepted', 'Hired'], true)) {
            return redirect()->back()->with('error', 'The offer letter has not been issued yet.');
        }
        $company = (new CompanyModel())->find((int) $application['company_id']);
        return view('Recruitment/offer_letter', ['application' => $application, 'companyName' => $company['name'] ?? 'Company']);
    }

    public function requestDocuments($id)
    {
        if (!$this->canManage()) return $this->denied();
        $application = $this->companyApplication((int) $id);
        if (!$application || ($application['application_status'] ?? '') !== 'Selected') {
            return redirect()->back()->with('error', 'Only selected candidates can enter onboarding.');
        }

        $salary = (float) $this->request->getPost('offered_salary');
        $joiningDate = (string) $this->request->getPost('proposed_joining_date');
        if ($salary <= 0 || !$joiningDate || strtotime($joiningDate) < strtotime(date('Y-m-d'))) {
            return redirect()->back()->with('error', 'Enter a valid salary and proposed joining date.');
        }

        $this->applications->update((int) $id, [
            'status' => 'Documents Requested', 'offered_salary' => $salary,
            'salary_notes' => $this->request->getPost('salary_notes'),
            'proposed_joining_date' => $this->request->getPost('proposed_joining_date'),
            'verification_status' => 'Pending Documents', 'documents_requested_at' => date('Y-m-d H:i:s'),
        ]);
        $emailed = $this->notifyCandidate($application, 'Documents requested for ' . $application['job_title'], 'Documents required', '<p>Your salary discussion is complete. Please upload your background-verification and experience documents through the candidate portal.</p>');
        return redirect()->back()->with('success', 'Salary package saved and documents requested.' . ($emailed ? ' The candidate was notified.' : ' The portal was updated, but email delivery was unavailable.'));
    }

    public function uploadDocuments($id)
    {
        $application = $this->ownedApplication((int) $id);
        if (!$application || !in_array($application['application_status'] ?? '', ['Documents Requested', 'Documents Submitted'], true)) {
            return redirect()->back()->with('error', 'Documents cannot be uploaded at this stage.');
        }

        $payload = [];
        $movedPaths = [];
        foreach (['bgv' => 'bgv_document', 'experience' => 'experience_document'] as $input => $field) {
            $file = $this->request->getFile($input);
            if ($file && $file->isValid() && !$file->hasMoved()) {
                $extension = strtolower((string) $file->getClientExtension());
                $allowedMimes = ['application/pdf', 'image/jpeg', 'image/png'];
                if (!in_array($extension, ['pdf', 'jpg', 'jpeg', 'png'], true) || !in_array($file->getMimeType(), $allowedMimes, true) || $file->getSizeByUnit('mb') > 5) {
                    $this->removeFiles($movedPaths);
                    return redirect()->back()->with('error', 'Each document must be PDF/JPG/PNG and no larger than 5 MB.');
                }
                $name = $file->getRandomName();
                $path = WRITEPATH . 'uploads/onboarding';
                if (!is_dir($path)) mkdir($path, 0775, true);
                $file->move($path, $name);
                $movedPaths[] = $path . DIRECTORY_SEPARATOR . $name;
                $payload[$field] = $name;
                $payload[$field . '_name'] = $file->getClientName();
            }
        }

        $hasBgv = !empty($payload['bgv_document']) || !empty($application['bgv_document']);
        $hasExperience = !empty($payload['experience_document']) || !empty($application['experience_document']);
        if (!$hasBgv || !$hasExperience) {
            $this->removeFiles($movedPaths);
            return redirect()->back()->with('error', 'Both BGV and experience documents are required.');
        }
        $payload += ['status' => 'Documents Submitted', 'verification_status' => 'Pending Verification', 'documents_uploaded_at' => date('Y-m-d H:i:s')];
        $this->applications->update((int) $id, $payload);
        foreach (['bgv_document', 'experience_document'] as $field) {
            if (!empty($payload[$field]) && !empty($application[$field]) && $payload[$field] !== $application[$field]) {
                $this->removeFiles([WRITEPATH . 'uploads/onboarding/' . basename($application[$field])]);
            }
        }
        return redirect()->back()->with('success', 'Documents submitted for verification.');
    }

    public function document($id, $type)
    {
        $application = $this->accessibleApplication((int) $id);
        $field = $type === 'bgv' ? 'bgv_document' : ($type === 'experience' ? 'experience_document' : null);
        if (!$application || !$field || empty($application[$field])) return redirect()->back()->with('error', 'Document not found.');
        $path = WRITEPATH . 'uploads/onboarding/' . basename($application[$field]);
        if (!is_file($path)) return redirect()->back()->with('error', 'Document file is missing.');
        return $this->response->download($path, null)->setFileName($application[$field . '_name'] ?: basename($path));
    }

    public function verify($id)
    {
        if (!$this->canManage()) return $this->denied();
        $application = $this->companyApplication((int) $id);
        if (!$application || ($application['application_status'] ?? '') !== 'Documents Submitted' || empty($application['bgv_document']) || empty($application['experience_document'])) return redirect()->back()->with('error', 'Both submitted documents are required first.');
        $decision = $this->request->getPost('verification_status') === 'Verified' ? 'Verified' : 'Failed';
        $this->applications->update((int) $id, [
            'verification_status' => $decision, 'verification_notes' => $this->request->getPost('verification_notes'),
            'verified_by' => session('user_id'), 'verified_at' => date('Y-m-d H:i:s'),
            'status' => $decision === 'Verified' ? 'Documents Submitted' : 'Offer Declined',
            'offer_status' => $decision === 'Verified' ? null : 'Cancelled',
        ]);
        return redirect()->back()->with('success', $decision === 'Verified' ? 'Documents verified successfully.' : 'Verification failed and the offer was cancelled.');
    }

    public function sendOffer($id)
    {
        if (!$this->canManage()) return $this->denied();
        $application = $this->companyApplication((int) $id);
        if (!$application || ($application['verification_status'] ?? '') !== 'Verified' || ($application['application_status'] ?? '') !== 'Documents Submitted' || !empty($application['offer_status'])) return redirect()->back()->with('error', 'A verified, unsent offer is required before issuing the letter.');
        $this->applications->update((int) $id, ['status' => 'Offer Sent', 'offer_status' => 'Sent', 'offer_sent_at' => date('Y-m-d H:i:s')]);
        $emailed = $this->notifyCandidate($application, 'Employment offer for ' . $application['job_title'], 'Your offer letter is ready', '<p>We are pleased to offer you the position of <strong>' . esc($application['job_title']) . '</strong>. Review the offer letter and provide your digitally signed response in the candidate portal.</p>');
        return redirect()->back()->with('success', 'Offer letter issued to the candidate portal.' . ($emailed ? ' The candidate was notified.' : ' Email delivery was unavailable.'));
    }

    public function respond($id)
    {
        $application = $this->ownedApplication((int) $id);
        if (!$application || ($application['offer_status'] ?? '') !== 'Sent') return redirect()->back()->with('error', 'This offer is not awaiting a response.');
        $accept = $this->request->getPost('decision') === 'accept';
        $signature = trim((string) $this->request->getPost('signature_name'));
        $declineReason = trim((string) $this->request->getPost('offer_decline_reason'));
        if ($accept && ($signature === '' || !$this->request->getPost('consent'))) return redirect()->back()->with('error', 'Type your legal name and confirm the electronic-signature consent.');
        if (!$accept && $declineReason === '') return redirect()->back()->with('error', 'Please provide a reason for declining the offer.');
        $this->applications->update((int) $id, [
            'status' => $accept ? 'Offer Accepted' : 'Offer Declined', 'offer_status' => $accept ? 'Accepted' : 'Declined',
            'offer_responded_at' => date('Y-m-d H:i:s'), 'signature_name' => $accept ? $signature : null,
            'signature_ip' => $accept ? $this->request->getIPAddress() : null,
            'offer_decline_reason' => $accept ? null : $declineReason,
        ]);
        return redirect()->back()->with('success', $accept ? 'Offer accepted and digitally signed.' : 'Offer declined.');
    }

    public function hire($id)
    {
        if (!$this->canManage()) return $this->denied();
        $application = $this->companyApplication((int) $id);
        if (!$application || ($application['offer_status'] ?? '') !== 'Accepted') return redirect()->back()->with('error', 'The candidate must accept the offer before hiring.');
        $db = db_connect();
        $db->transStart();
        $department = (new DepartmentModel())->where('department_name', $application['department'])->first();
        (new UserModel())->update((int) $application['user_id'], [
            'company_id' => (int) session('company_id'), 'name' => $application['candidate_name'] ?: $application['name'],
            'email' => $application['candidate_email'] ?: $application['email'], 'phone' => $application['phone'],
            'role' => 'employee', 'position' => $application['job_title'], 'employment_type' => $application['employment_type'],
            'date_of_joining' => $application['proposed_joining_date'], 'department_id' => $department['id'] ?? null, 'is_active' => 1,
        ]);
        $this->applications->update((int) $id, [
            'status' => 'Hired', 'offer_status' => 'Hired', 'hired_at' => date('Y-m-d H:i:s'),
            'employee_profile_id' => $application['user_id'], 'onboarding_status' => 'Pre-Onboarding',
            'onboarding_notes' => $this->request->getPost('onboarding_notes'),
        ]);
        $db->transComplete();
        if (!$db->transStatus()) return redirect()->back()->with('error', 'Employee conversion failed; no partial changes were saved.');
        $emailed = $this->notifyCandidate($application, 'Welcome to the team', 'Your pre-onboarding has started', '<p>Your offer acceptance is complete and your employee profile is active. Your proposed joining date is <strong>' . esc(date('d F Y', strtotime($application['proposed_joining_date']))) . '</strong>.</p>');
        return redirect()->back()->with('success', 'Candidate hired, converted to an employee profile, and moved to pre-onboarding.' . ($emailed ? ' A welcome email was sent.' : ' Email delivery was unavailable.'));
    }

    private function canManage(): bool { return in_array(session('role'), ['admin', 'hr'], true); }
    private function companyApplication(int $id): ?array { return $this->applications->getApplicationWithDetails($id, (int) session('company_id')); }
    private function ownedApplication(int $id): ?array { $a = $this->companyApplication($id); return $a && (int) $a['user_id'] === (int) session('user_id') ? $a : null; }
    private function accessibleApplication(int $id): ?array { return $this->canManage() ? $this->companyApplication($id) : $this->ownedApplication($id); }
    private function denied() { return redirect()->to('/Recruitment/offers')->with('error', 'Only HR and admins can manage offers.'); }

    private function removeFiles(array $paths): void
    {
        foreach ($paths as $path) if (is_file($path)) unlink($path);
    }

    private function notifyCandidate(array $application, string $subject, string $heading, string $message): bool
    {
        $email = trim((string) ($application['candidate_email'] ?: $application['email']));
        $company = (new CompanyModel())->find((int) $application['company_id']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) || !$company) return false;
        return (new CompanyEmailService())->sendForCompany(
            (int) $application['company_id'], $email, $subject,
            view('emails/recruitment_update', [
                'heading' => $heading, 'candidateName' => $application['candidate_name'] ?: $application['name'],
                'message' => $message, 'portalUrl' => base_url('Recruitment/offers/' . $application['application_id']),
                'companyName' => $company['name'],
            ]),
            session('email'), session('name')
        );
    }
}
