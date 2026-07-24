<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', function () {
    return redirect()->to('/login');
});

$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::authenticate');

$routes->get('/register', 'Auth::register');
$routes->post('/register', 'Auth::saveUser');
$routes->get('/company/setup', 'CompanySetupController::index', ['filter' => 'auth']);
$routes->post('/company/setup', 'CompanySetupController::save', ['filter' => 'auth']);

$routes->get('/logout', 'Auth::logout');

// Public careers portal (no employee account required).
$routes->get('/careers', 'Recruitment\CareerPortalController::index');
$routes->get('/careers/jobs/(:num)', 'Recruitment\CareerPortalController::show/$1');
$routes->post('/careers/jobs/(:num)/apply', 'Recruitment\CareerPortalController::apply/$1');
$routes->get('/careers/application-received', 'Recruitment\CareerPortalController::success');
$routes->get('/offer-response/(:segment)', 'Recruitment\OfferController::publicOffer/$1');
$routes->post('/offer-response/(:segment)', 'Recruitment\OfferController::publicRespond/$1');



$routes->get('/dashboard', 'DashboardController::index', ['filter' => 'auth']);
$routes->post('/onboarding/complete', 'OnboardingController::complete', ['filter' => 'auth']);

$routes->get('/companies', 'DashboardController::companies');
$routes->get('/subscriptions', 'DashboardController::subscriptions');
$routes->get('/purchase_transaction', 'DashboardController::purchase_transaction');
$routes->get('/packages', 'DashboardController::packages');
$routes->get('/package-grid', 'PackageController::grid');
$routes->get('/support_ticket', 'DashboardController::support_ticket');

$routes->get('/Reports/expense_report', 'ReportController::expenseReport');
$routes->get('/Reports/invoice_report', 'ReportController::invoiceReport');
$routes->get('/Reports/user_report', 'ReportController::userReport');
$routes->get('/Reports/employee_report', 'ReportController::employeeReport');
$routes->get('/Reports/payslip_report', 'ReportController::payslipReport');
$routes->get('/Reports/attendance_report', 'ReportController::attendanceReport');
$routes->get('/Reports/leave_report', 'ReportController::leaveReport');
$routes->get('/Reports/daily_report', 'ReportController::dailyReport');

$routes->get('/invoice', 'DashboardController::invoice');
$routes->get('/invoice-details/(:any)', 'DashboardController::invoiceDetails/$1');
$routes->get('/invoice/add', 'DashboardController::addInvoice');

$routes->get('/chat', 'ChatController::index', ['filter' => 'auth']);
$routes->get('/chat/(:num)', 'ChatController::conversation/$1', ['filter' => 'auth']);
$routes->post('/chat/send', 'ChatController::send', ['filter' => 'auth']);
$routes->get('/chat/messages/(:num)', 'ChatController::messages/$1', ['filter' => 'auth']);

$routes->group('settings', ['filter' => 'auth'], function ($routes) {
    $routes->get('profile', 'Settings\ProfileController::index');
    $routes->post('profile/update', 'Settings\ProfileController::update');
    $routes->get('email', 'Settings\EmailSettingsController::index');
    $routes->post('email/save', 'Settings\EmailSettingsController::save');
    $routes->post('email/test', 'Settings\EmailSettingsController::test');
});

$routes->group('employee_attendance', ['filter' => 'auth'], function ($routes) {
    $routes->get('', 'Attendance\AttendanceController::index');
    $routes->post('punch', 'Attendance\AttendanceController::punch');
    $routes->post('break', 'Attendance\AttendanceController::toggleBreak');
    $routes->get('export', 'Attendance\AttendanceController::export');
});
$routes->get('/staff', 'Employee\EmployeeController::staff', ['filter' => 'auth']);
$routes->get('/staff/create', 'Employee\EmployeeController::createStaff', ['filter' => 'auth']);
$routes->post('/staff/store', 'Employee\EmployeeController::storeStaff', ['filter' => 'auth']);
$routes->get('/staff/edit/(:num)', 'Employee\EmployeeController::editStaff/$1', ['filter' => 'auth']);
$routes->post('/staff/update/(:num)', 'Employee\EmployeeController::updateStaff/$1', ['filter' => 'auth']);
$routes->post('/staff/credentials/save/(:num)', 'Employee\EmployeeController::saveLoginCredentials/$1', ['filter' => 'auth']);
$routes->post('/staff/credentials/delete/(:num)', 'Employee\EmployeeController::deleteLoginCredentials/$1', ['filter' => 'auth']);
$routes->get('/departments', 'DepartmentController::index', ['filter' => 'auth']);
$routes->post('/departments/store', 'DepartmentController::store', ['filter' => 'auth']);
$routes->post('/departments/toggle/(:num)', 'DepartmentController::toggle/$1', ['filter' => 'auth']);

$routes->get('/performance_review', 'PerformanceReviewController::performance_review', ['filter' => 'auth']);
$routes->post('performance_review/save', 'PerformanceReviewController::save', ['filter' => 'auth']);

$routes->get('/Recruitment/jobs', 'Recruitment\RecruitmentController::jobs', ['filter' => 'auth']);
$routes->get('/Recruitment/jobs-grid', 'Recruitment\RecruitmentController::jobsGrid', ['filter' => 'auth']);
$routes->get('/Recruitment/candidates', 'Recruitment\RecruitmentController::candidates', ['filter' => 'auth']);
$routes->get('/Recruitment/candidates-grid', 'Recruitment\RecruitmentController::candidatesGrid', ['filter' => 'auth']);
$routes->get('/Recruitment/candidates-kanban', 'Recruitment\RecruitmentController::candidatesKanban', ['filter' => 'auth']);
$routes->get('/Recruitment/evaluation', 'Recruitment\RecruitmentController::evaluation', ['filter' => 'auth']);
$routes->get('/Recruitment/view-job-modal/(:num)', 'Recruitment\RecruitmentController::viewJobModal/$1', ['filter' => 'auth']);
$routes->get('/Recruitment/employee-jobs', 'Recruitment\RecruitmentController::employeeJobs', ['filter' => 'auth']);
$routes->get('/Recruitment/employee-jobs-grid', 'Recruitment\RecruitmentController::employeeJobsGrid', ['filter' => 'auth']);

// =========================
// Recruitment - Requisitions
// =========================

$routes->group('Recruitment', ['filter' => 'auth'], function ($routes) {

    $routes->get('requisitions', 'Recruitment\RequisitionController::index');

    $routes->get('requisitions/create', 'Recruitment\RequisitionController::create');

    $routes->post('requisitions/save-draft', 'Recruitment\RequisitionController::saveDraft');
    $routes->post('requisitions/save', 'Recruitment\RequisitionController::save');

    $routes->post('requisitions/submit', 'Recruitment\RequisitionController::submit');

    $routes->get(
        'requisitions/get/(:num)',
        'Recruitment\RequisitionController::getRequisition/$1'
    );
    $routes->get('view-job/(:num)', 'Recruitment\RecruitmentController::viewJob/$1');
    $routes->get(
        'requisitions/edit/(:num)',
        'Recruitment\RequisitionController::edit/$1'
    );

    $routes->post(
        'requisitions/update/(:num)',
        'Recruitment\RequisitionController::update/$1'
    );

    $routes->post(
        'requisitions/delete/(:num)',
        'Recruitment\RequisitionController::delete/$1'
    );

    $routes->post(
        'requisitions/hod-approve/(:num)',
        'Recruitment\RequisitionController::hodApprove/$1'
    );

    $routes->post(
        'requisitions/hod-reject/(:num)',
        'Recruitment\RequisitionController::hodReject/$1'
    );

    $routes->post(
        'requisitions/hr-approve/(:num)',
        'Recruitment\RequisitionController::hrApprove/$1'
    );

    $routes->post(
        'requisitions/hr-reject/(:num)',
        'Recruitment\RequisitionController::hrReject/$1'
    );

   //Job Application
    $routes->get('apply-job/(:num)', 'Recruitment\JobApplicationController::applyForm/$1');
    $routes->post('submit-application', 'Recruitment\JobApplicationController::submitApplication');
    $routes->get('applications/resume/(:num)', 'Recruitment\JobApplicationController::viewResume/$1');
    $routes->get('applications/resume-download/(:num)', 'Recruitment\JobApplicationController::downloadResume/$1');
    $routes->get('applications/profile/(:num)', 'Recruitment\RecruitmentController::candidateProfile/$1');
    $routes->post('applications/shortlist/(:num)', 'Recruitment\RecruitmentController::shortlistCandidateApplication/$1');
    $routes->post('applications/reject/(:num)', 'Recruitment\RecruitmentController::rejectCandidateApplication/$1');
    $routes->post('applications/schedule/(:num)', 'Recruitment\RecruitmentController::scheduleCandidateInterview/$1');
    $routes->post('applications/evaluate/(:num)', 'Recruitment\RecruitmentController::evaluateCandidateApplication/$1');
    $routes->get('applications/decision/(:num)', 'Recruitment\RecruitmentController::viewApplicationDecision/$1');
    $routes->post('applications/delete/(:num)', 'Recruitment\RecruitmentController::deleteCandidateApplication/$1');
    $routes->get('offers', 'Recruitment\OfferController::index');
    $routes->get('offers/(:num)', 'Recruitment\OfferController::show/$1');
    $routes->get('offers/(:num)/letter', 'Recruitment\OfferController::letter/$1');
    $routes->post('offers/(:num)/request-documents', 'Recruitment\OfferController::requestDocuments/$1');
    $routes->post('offers/(:num)/upload-documents', 'Recruitment\OfferController::uploadDocuments/$1');
    $routes->get('offers/(:num)/document/(:segment)', 'Recruitment\OfferController::document/$1/$2');
    $routes->post('offers/(:num)/verify', 'Recruitment\OfferController::verify/$1');
    $routes->post('offers/(:num)/send', 'Recruitment\OfferController::sendOffer/$1');
    $routes->post('offers/(:num)/respond', 'Recruitment\OfferController::respond/$1');
    $routes->post('offers/(:num)/hire', 'Recruitment\OfferController::hire/$1');


});


