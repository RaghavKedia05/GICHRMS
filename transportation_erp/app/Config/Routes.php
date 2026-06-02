<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Auth::login');
$routes->post('/login', 'Auth::authenticate');

$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/transporters', 'Dashboard::transporters');
$routes->get('/drivers', 'Dashboard::drivers');
$routes->get('/vehicles', 'Dashboard::vehicles');