<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->post('auth/jwt', '\App\Controllers\Auth\LoginController::jwtLogin');


$routes->resource('api/V1/cars', ['filter' => 'check_api_key']);

service('auth')->routes($routes);

