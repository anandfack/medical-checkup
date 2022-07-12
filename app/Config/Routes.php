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
$routes->get('/', 'Pages::index');

// Admin

$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/index', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/indexlaborat', 'Admin::indexlaborat', ['filter' => 'role:admin']);
$routes->get('/admin/indexradiologi', 'Admin::indexradiologi', ['filter' => 'role:admin']);
$routes->get('/admin/indexmasterlab', 'Admin::indexmasterlab', ['filter' => 'role:admin']);
$routes->get('/admin/indexmasterrad', 'Admin::indexmasterrad', ['filter' => 'role:admin']);
$routes->get('/admin/indexpasien', 'Admin::indexpasien', ['filter' => 'role:admin']);
$routes->get('/admin/indexkesimpulan', 'Admin::indexkesimpulan', ['filter' => 'role:admin']);
$routes->get('/admin/indexperiksa', 'Admin::indexperiksa', ['filter' => 'role:admin']);
$routes->get('/admin/createlaborat', 'Admin::createlaborat', ['filter' => 'role:admin']);
$routes->get('/admin/createradiologi', 'Admin::createradiologi', ['filter' => 'role:admin']);
$routes->get('/admin/createmasterrad', 'Admin::createmasterrad', ['filter' => 'role:admin']);
$routes->get('/admin/createmasterlab', 'Admin::createmasterlab', ['filter' => 'role:admin']);
$routes->get('/admin/createpasien', 'Admin::createpasien', ['filter' => 'role:admin']);
$routes->get('/admin/createkesimpulan', 'Admin::createkesimpulan', ['filter' => 'role:admin']);
$routes->get('/admin/createperiksa', 'Admin::createperiksa', ['filter' => 'role:admin']);
$routes->get('/admin/savelaborat', 'Admin::savelaborat', ['filter' => 'role:admin']);
$routes->get('/admin/saveradiologi', 'Admin::saveradiologi', ['filter' => 'role:admin']);
$routes->get('/admin/savemasterrad', 'Admin::savemasterrad', ['filter' => 'role:admin']);
$routes->get('/admin/savemasterlab', 'Admin::savemasterlab', ['filter' => 'role:admin']);
$routes->get('/admin/savepasien', 'Admin::savepasien', ['filter' => 'role:admin']);
$routes->get('/admin/savekesimpulan', 'Admin::savekesimpulan', ['filter' => 'role:admin']);
$routes->get('/admin/saveperiksa', 'Admin::saveperiksa', ['filter' => 'role:admin']);
$routes->get('/admin/deletelaborat', 'Admin::deletelaborat', ['filter' => 'role:admin']);
$routes->get('/admin/deleteradiologi', 'Admin::deleteradiologi', ['filter' => 'role:admin']);
$routes->get('/admin/deletemasterrad', 'Admin::deletemasterrad', ['filter' => 'role:admin']);
$routes->get('/admin/deletemasterlab', 'Admin::deletemasterlab', ['filter' => 'role:admin']);
$routes->get('/admin/deletepasien', 'Admin::deletepasien', ['filter' => 'role:admin']);
$routes->get('/admin/deletekesimpulan', 'Admin::deletekesimpulan', ['filter' => 'role:admin']);
$routes->get('/admin/deleteperiksa', 'Admin::deleteperiksa', ['filter' => 'role:admin']);
$routes->get('/admin/editlaborat', 'Admin::editlaborat', ['filter' => 'role:admin']);
$routes->get('/admin/editradiologi', 'Admin::editradiologi', ['filter' => 'role:admin']);
$routes->get('/admin/editmasterrad', 'Admin::editmasterrad', ['filter' => 'role:admin']);
$routes->get('/admin/editmasterlab', 'Admin::editmasterlab', ['filter' => 'role:admin']);
$routes->get('/admin/editpasien', 'Admin::editpasien', ['filter' => 'role:admin']);
$routes->get('/admin/editkesimpulan', 'Admin::editkesimpulan', ['filter' => 'role:admin']);
$routes->get('/admin/editperiksa', 'Admin::editperiksa', ['filter' => 'role:admin']);
$routes->get('/admin/updatelaborat', 'Admin::updatelaborat', ['filter' => 'role:admin']);
$routes->get('/admin/updateradiologi', 'Admin::updateradiologi', ['filter' => 'role:admin']);
$routes->get('/admin/updatemasterrad', 'Admin::updatemasterrad', ['filter' => 'role:admin']);
$routes->get('/admin/updatemasterlab', 'Admin::updatemasterlab', ['filter' => 'role:admin']);
$routes->get('/admin/updatepasien', 'Admin::updatepasien', ['filter' => 'role:admin']);
$routes->get('/admin/updatekesimpulan', 'Admin::updatekesimpulan', ['filter' => 'role:admin']);
$routes->get('/admin/updateperiksa', 'Admin::updateperiksa', ['filter' => 'role:admin']);

// Laborat

$routes->get('/laborat', 'Laborat::index', ['filter' => 'role:laborat']);
$routes->get('/laborat/index', 'Laborat::index', ['filter' => 'role:laborat']);
$routes->get('/laborat/indexlaborat', 'Laborat::indexlaborat', ['filter' => 'role:laborat']);
$routes->get('/laborat/indexmasterlab', 'Laborat::indexmasterlab', ['filter' => 'role:laborat']);
$routes->get('/laborat/createlaborat', 'Laborat::createlaborat', ['filter' => 'role:laborat']);
$routes->get('/laborat/createmasterlab', 'Laborat::createmasterlab', ['filter' => 'role:laborat']);
$routes->get('/laborat/savelaborat', 'Laborat::savelaborat', ['filter' => 'role:laborat']);
$routes->get('/laborat/savemasterlab', 'Laborat::savemasterlab', ['filter' => 'role:laborat']);
$routes->get('/laborat/deletelaborat', 'Laborat::deletelaborat', ['filter' => 'role:laborat']);
$routes->get('/laborat/deletemasterlab', 'Laborat::deletemasterlab', ['filter' => 'role:laborat']);
$routes->get('/laborat/editlaborat', 'Laborat::editlaborat', ['filter' => 'role:laborat']);
$routes->get('/laborat/editmasterlab', 'Laborat::editmasterlab', ['filter' => 'role:laborat']);
$routes->get('/laborat/updatelaborat', 'Laborat::updatelaborat', ['filter' => 'role:laborat']);
$routes->get('/laborat/updatemasterlab', 'Laborat::updatemasterlab', ['filter' => 'role:laborat']);

// Radiologi

$routes->get('/radiologi', 'Radiologi::index', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/index', 'Radiologi::index', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/indexradiologi', 'Radiologi::indexradiologi', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/indexmasterrad', 'Radiologi::indexmasterrad', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/createradiologi', 'Radiologi::createradiologi', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/createmasterrad', 'Radiologi::createmasterrad', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/saveradiologi', 'Radiologi::saveradiologi', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/savemasterrad', 'Radiologi::savemasterrad', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/deleteradiologi', 'Radiologi::deleteradiologi', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/deletemasterrad', 'Radiologi::deletemasterrad', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/editradiologi', 'Radiologi::editradiologi', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/editmasterrad', 'Radiologi::editmasterrad', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/updateradiologi', 'Radiologi::updateradiologi', ['filter' => 'role:radiologi']);
$routes->get('/radiologi/updatemasterrad', 'Radiologi::updatemasterrad', ['filter' => 'role:radiologi']);


// Dokter

$routes->get('/pasien', 'Pasien::index', ['filter' => 'role:dokter']);
$routes->get('/pasien/index', 'Pasien::index', ['filter' => 'role:dokter']);
// $routes->get('/pasien/indexpasien', 'Pasien::indexpasien', ['filter' => 'role:dokter']);
$routes->get('/pasien/indexperiksa', 'Pasien::indexperiksa', ['filter' => 'role:dokter']);
$routes->get('/pasien/indexkesimpulan', 'Pasien::indexkesimpulan', ['filter' => 'role:dokter']);
// $routes->get('/pasien/createpasien', 'Pasien::createpasien', ['filter' => 'role:dokter']);
$routes->get('/pasien/createperiksa', 'Pasien::createperiksa', ['filter' => 'role:dokter']);
$routes->get('/pasien/createkesimpulan', 'Pasien::createkesimpulan', ['filter' => 'role:dokter']);
// $routes->get('/pasien/savepasien', 'Pasien::savepasien', ['filter' => 'role:dokter']);
$routes->get('/pasien/saveperiksa', 'Pasien::saveperiksa', ['filter' => 'role:dokter']);
$routes->get('/pasien/savekesimpulan', 'Pasien::savekesimpulan', ['filter' => 'role:dokter']);
// $routes->get('/pasien/editpasien', 'Pasien::editpasien', ['filter' => 'role:dokter']);
$routes->get('/pasien/editperiksa', 'Pasien::editperiksa', ['filter' => 'role:dokter']);
$routes->get('/pasien/editkesimpulan', 'Pasien::editkesimpulan', ['filter' => 'role:dokter']);
// $routes->get('/pasien/deletepasien', 'Pasien::deletepasien', ['filter' => 'role:dokter']);
$routes->get('/pasien/deleteperiksa', 'Pasien::deleteperiksa', ['filter' => 'role:dokter']);
$routes->get('/pasien/deletekesimpulan', 'Pasien::deletekesimpulan', ['filter' => 'role:dokter']);
// $routes->get('/pasien/updatepasien', 'Pasien::updatepasien', ['filter' => 'role:dokter']);
$routes->get('/pasien/updateperiksa', 'Pasien::updateperiksa', ['filter' => 'role:dokter']);
$routes->get('/pasien/updatekesimpulan', 'Pasien::updatekesimpulan', ['filter' => 'role:dokter']);
$routes->get('/pasien/detailperiksa', 'Pasien::detailperiksa', ['filter' => 'role:dokter']);
$routes->get('/pasien/detailkesimpulan', 'Pasien::detailkesimpulan', ['filter' => 'role:dokter']);



// $routes->delete('/pasien/(:num)', 'pasien::delete/$1');

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
