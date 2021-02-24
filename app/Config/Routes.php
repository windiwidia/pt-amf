<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/pages/(:any)', 'Home::detail/$1');
$routes->get('/auth/login', 'Auth::index');
// $routes->get('/auth/admin', 'Admin::index');
// $routes->get('/', 'Home::home');
// $routes->get('/', '_sendEmail::save');
// ada user akses projects/ (apapun) dengan user menuliskan apapun kecuali / , 
// maka ambil apapun itu lalu diarahkan ke cntroller projects methodnya 
// detail dengan mengirimkan segment ke $1
$routes->get('/projects/create', 'Projects::create');
$routes->get('/projects/edit/(:segment)', 'Projects::edit/$1');
$routes->delete('/projects/(:num)', 'Projects::delete/$1');
$routes->get('/projects/(:any)', 'Projects::detail/$1');

$routes->get('/client/create', 'Client::create');
$routes->get('/client/edit/(:segment)', 'Client::edit/$1');
$routes->delete('/client/(:num)', 'Client::delete/$1');
// $routes->get('/client/(:any)', 'Client::detail/$1');

$routes->get('/admin/edit/(:segment)', 'Admin::edit/$1');
$routes->get('/admin/myprofile/(:any)', 'Admin::myprofile/$1');

$routes->get('/carouselhome/create', 'Carouselhome::create');
$routes->get('/carouselhome/edit/(:segment)', 'Carouselhome::edit/$1');
$routes->delete('/carouselhome/(:num)', 'Carouselhome::delete/$1');
$routes->get('/carouselhome/(:any)', 'Carouselhome::detail/$1');

// $routes->get('/admin/changePass', 'Projects::changePass');


// $routes->get('/admin/(:any)', 'Admin::index/$1');


// $routes->get('/coba', 'Coba::about');


// jika ingin menjalankan sesuatu yang tidak menggunakan controller dan method maka menggunakan closures.
// $routes->get('/coba', function () {
// 	echo 'Hello World';
// });

// untuk menangani jika user ingin mengakses controller dan method
// $routes->get('/coba/index', 'Coba::index');
// $routes->get('/coba/about', 'Coba::about');

// // jika user ingin langsung mengakses tanpa mengetikkan controller dan method dan dengan diikuti dengan apapun yang user ingin ketikkan
// // (:any) adalah apapun yang user ketikkan akan ditangkap semua segmen di urlnya, $1 adlh untuk mengambil nilai dari placeholder yang pertama kali muncul
// // (:any) apapun, (:num) angka, (:segment) kecuali slash, (:alpha) alfabet, (:alphanum) angka dan huruf
// $routes->get('/coba/(:any)/(:num)', 'Coba::about/$1/$2');

// $routes->get('/users', 'Admin\Users::index');


/**
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
