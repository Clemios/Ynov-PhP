<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
// $routes->get(from: '/', 'CVController::index');
$routes->get('/cv/login', 'CVController::login');
$routes->post('/cv/login', 'CVController::login');
$routes->get('/cv/logout', 'CVController::logout');
$routes->get('/cv/edit', 'CVController::editPersonalInfo');
$routes->post('/cv/edit', 'CVController::editPersonalInfo');
