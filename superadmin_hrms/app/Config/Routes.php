<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Auth::login');
$routes->post('/login', 'Auth::authenticate');

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

$routes->get('/Recruitment/jobs', 'RecruitmentController::jobs');
$routes->get('/Recruitment/jobs-grid', 'RecruitmentController::jobsGrid');
$routes->get('/Recruitment/candidates', 'RecruitmentController::candidates');
$routes->get('/Recruitment/candidates-grid', 'RecruitmentController::candidatesGrid');
$routes->get('/Recruitment/candidates-kanban', 'RecruitmentController::candidatesKanban');