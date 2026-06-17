<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/caisse', 'CaisseController::index');
$routes->get('/achat', 'ProduitController::getAllProduits');

