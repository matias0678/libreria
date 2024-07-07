<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// app/Config/Routes.php
$routes->get('/', 'Crud::index');
$routes->get('/obtenerLibro/(:any)', 'Crud::obtenerLibro/$1' );
$routes->get('/eliminar/(:any)', 'Crud::eliminar/$1' );
$routes->post('/crear', 'Crud::crear');
$routes->post('/actualizar', 'Crud::actualizar');
$routes->get('/buscarPorNombre/(:any)', 'Crud::buscarPorNombre/$1');
$routes->get('/buscarPorAutor/(:any)', 'Crud::buscarPorAutor/$1');
$routes->get('/buscarPorCodigo/(:any)', 'Crud::buscarPorCodigo/$1');