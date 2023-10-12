<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Lending');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// $routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Lending::index');
//management puskesmas
$routes->get('/puskesmas', 'ListPuskesmas::index',[
    'filter'=>'permission:menu-list-puskesmas,
                tambah-account,
                edit-account'
]);
$routes->post('/puskesmas/dropdownPuskesmas', 'ListPuskesmas::dropdownPuskesmas',[
    'filter'=>'permission:menu-list-puskesmas,
    tambah-account,
    edit-account']);
$routes->post('/puskesmas', 'ListPuskesmas::saveUser',[
    'filter'=>'permission:menu-list-puskesmas,
    tambah-account']);
$routes->post('/puskesmas/editUser/(:any)', 'ListPuskesmas::editUser/$1',[
        'filter'=>'permission:menu-list-puskesmas,
        edit-account']);
$routes->post('/puskesmas/deleteUser/(:num)', 'ListPuskesmas::deleteUser/$1',[
            'filter'=>'permission:menu-list-puskesmas,
            hapus-account']);
$routes->post('/puskesmas/resetUser/(:num)', 'ListPuskesmas::resetUser/$1',[
                'filter'=>'permission:menu-list-puskesmas,
                hapus-account']);
$routes->get('/puskesmas/editModal', 'ListPuskesmas::editModal',[
                    'filter'=>'permission:menu-list-puskesmas,
                    edit-account']);
$routes->post('/puskesmas/deleteModal', 'ListPuskesmas::deleteModal',[
                        'filter'=>'permission:menu-list-puskesmas,
                        hapus-account']);
$routes->post('/puskesmas/resetModal', 'ListPuskesmas::resetModal',[
    'filter'=>'permission:menu-list-puskesmas,hapus-account']);
//profile setting
$routes->get('/profile', 'Profile::index',[
        'filter'=>'permission:menu-edit-profile'
]);
$routes->get('/profile/editModal', 'Profile::editModal',[
    'filter'=>'permission:menu-edit-profile']);
$routes->post('/profile/dropdownPuskesmas', 'Profile::dropdownPuskesmas',[
        'filter'=>'permission:menu-edit-profile']);
$routes->post('/profile/editFotoProfil/(:any)', 'Profile::editFotoProfil/$1',[
    'filter'=>'permission:menu-edit-profile']);
$routes->post('/profile/editUser/(:any)', 'Profile::editUser/$1',[
    'filter'=>'permission:menu-edit-profile']);
$routes->post('/profile/editPassword/(:any)', 'Profile::editPassword/$1',[
        'filter'=>'permission:menu-edit-profile,edit-password']);
//Management Data Lending
$routes->post('/lending/dataaktual', 'Lending::saveData',[
    'filter'=>'permission:menu-input-aktual,
    tambah-account']);
$routes->post('/lending/dataaktualkabupaten', 'Lending::saveDataKabupaten',[
        'filter'=>'permission:menu-input-aktual']);
$routes->post('/lending/dataaktualpuskesmas', 'Lending::saveDataPuskesmas',[
    'filter'=>'permission:menu-input-aktual']);
$routes->get('/lending/dataaktual', 'Lending::Data_aktual');
$routes->POST('/lending/mingguaktual', 'Lending::minggu_aktual');
$routes->post('/lending/dropdowntahun', 'Lending::dropdownTahun');
//prediksi
$routes->post('/lending/prediksi', 'Lending::Prediksi',[
    'filter'=>'permission:menu-input-aktual']);

// list data aktual 
$routes->get('/dataaktual', 'ListDataAktual::index',[
    'filter'=>'permission:menu-list-puskesmas,
                tambah-account,
                edit-account'
]);
$routes->post('/dataaktual/listdata', 'ListDataAktual::listdata',[
    'filter'=>'permission:menu-list-puskesmas,
    tambah-account,
    edit-account'
]);
$routes->post('/dataaktual/deleteModal', 'ListDataAktual::deleteModal',[
    'filter'=>'permission:menu-list-puskesmas,
    tambah-account,
    edit-account']);
$routes->post('/dataaktual/deleteData/(:num)', 'ListDataAktual::deleteData/$1',[
    'filter'=>'permission:menu-list-puskesmas,
    tambah-account,
    edit-account']);
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}