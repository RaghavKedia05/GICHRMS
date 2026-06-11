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