<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/cms', 'CMS::index');

$routes->post('/manage/save', 'DynamicController::save');
$routes->post('/manage/edit', 'DynamicController::edit');
$routes->get('/manage/add/(:any)', 'DynamicController::add/$1');
$routes->get('/manage/modify/(:any)/(:any)', 'DynamicController::modify/$1/$2');
$routes->get('/manage/delete/(:any)/(:any)', 'DynamicController::delete/$1/$2');
$routes->get('/manage/(:any)', 'DynamicController::index/$1');

// Dynamic API Calls 


$routes->get('/API/get/(:any)/(:any)', 'API::get/$1/$2');
$routes->post('/API/add/(:any)', 'API::add/$1');
$routes->put('/API/modify/(:any)/(:any)', 'API::modify/$1/$2');
$routes->delete('/API/delete/(:any)/(:any)', 'API::delete/$1/$2');
$routes->get('/API/(:any)', 'API::list/$1');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
