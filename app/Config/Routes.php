<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::authenticate');
$routes->get('/logout', 'AuthController::logout');

$routes->group('', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/caisse', 'CaisseController::index');
    $routes->post('/achat/form', 'AchatController::form');
    $routes->post('/achat/cloturer', 'AchatController::cloturerAchat');
});
