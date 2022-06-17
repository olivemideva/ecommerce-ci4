<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Landingpage');
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

$routes->get('/', 'Landingpage::index');
$routes->get('/', 'Home::index');
$routes->get('/homepage', 'Client::homepage');

//users CRUD
//$routes->get('');
$routes->get('Admin/fetch_user/(:num)','Admin::fetch_user/$1');
$routes->post('Admin/edit_user_validation/(:num)','Admin::edit_user_validation/$1');

//items CRUD
$routes->get('Admin/fetch_item/(:num)','Admin::fetch_item/$1');
$routes->post('Admin/edit_item_validation/(:num)','Admin::edit_item_validation/$1');

//API
// $routes->group('api', function(){

//     $routes->group('index', function ($routes){
    
//         $routes->get('index1', 'Index::index1');
//         $routes->get('index2', 'Index::index2');
//     });

// });

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
