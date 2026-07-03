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

$routes->get('/logout', 'Auth::logout');



$routes->get('/dashboard', 'DashboardController::index');

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

$routes->get('/chat', 'ChatController::index');
$routes->get('/chat/(:num)', 'ChatController::conversation/$1');

$routes->get('/employee_attendance', 'DashboardController::employee_attendance');

$routes->get('/performance_review', 'PerformanceReviewController::performance_review');
$routes->post('performance_review/save', 'PerformanceReviewController::save');

$routes->get('/Recruitment/jobs', 'Recruitment\RecruitmentController::jobs');
$routes->get('/Recruitment/jobs-grid', 'Recruitment\RecruitmentController::jobsGrid');
$routes->get('/Recruitment/candidates', 'Recruitment\RecruitmentController::candidates');
$routes->get('/Recruitment/candidates-grid', 'Recruitment\RecruitmentController::candidatesGrid');
$routes->get('/Recruitment/candidates-kanban', 'Recruitment\RecruitmentController::candidatesKanban');
$routes->get('/Recruitment/view-job-modal/(:num)', 'Recruitment\RecruitmentController::viewJobModal/$1');
$routes->get('/Recruitment/employee-jobs', 'Recruitment\EmployeeJobController::index', ['filter' => 'auth']);
$routes->post('/Recruitment/apply-job', 'RecruitmentController::applyJob', ['filter' => 'auth']);

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

    $routes->get(
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

    

});


