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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
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

    
    $routes->get('/Admin/AllCategory', 'Admin\AdminCategoryController::index');
    $routes->match(['get', 'post'], '/Admin/CreateCategory', 'Admin\AdminCategoryController::create');
    $routes->match(['get', 'post'], '/Admin/UpdateCategory/(:num)', 'Admin\AdminCategoryController::update/$1');
    $routes->get('/Admin/DeleteCategory/(:num)', 'Admin\AdminCategoryController::delete/$1');
    
    $routes->match(['get', 'post'], '/Admin/CreateVideo', 'Admin\AdminVideoController::create');
    $routes->match(['get', 'post'], '/Admin/UpdateVideo/(:num)', 'Admin\AdminVideoController::update/$1');
    $routes->get('/Admin/DeleteVideo/(:num)', 'Admin\AdminVideoController::delete/$1');
    $routes->get('/Admin/AllModePaiement', 'Admin\AdminModePaiementController::index');
    $routes->match(['get', 'post'], '/Admin/CreateModePaiement', 'Admin\AdminModePaiementController::create');
    $routes->match(['get', 'post'], '/Admin/UpdateModePaiement/(:num)', 'Admin\AdminModePaiementController::update/$1');
    $routes->get('/Admin/DeleteModePaiement/(:num)', 'Admin\AdminModePaiementController::delete/$1');
    $routes->get('/Admin/AllCommande', 'Admin\AdminCommandeController::index');
    $routes->get('/Admin/DeleteCommande/(:num)', 'Admin\AdminCommandeController::delete/$1');
    $routes->get('/Admin/AllClient', 'Admin\AdminClientController::index');
    $routes->get('/Admin/DeleteClient/(:num)', 'Admin\AdminClientController::delete/$1');
    


$routes->get('/', 'Home::index');
$routes->match(['get', 'post'], '/Admin/login', 'Admin\SecurityController::login');
$routes->get('/Admin/AllVideo', 'Admin\AdminVideoController::index');

//make command of client
$routes->get('/AllVideo', 'VideoController::index');
$routes->get('/Add/(:num)', "CommandeController::addCommande/$1");
$routes->get('/commande', "CommandeController::commande");
$routes->post('/commande', "CommandeController::commande");
$routes->get('/Remove/(:num)', "CommandeController::removeCommande/$1");
$routes->get('/DeleteCommande/(:num)', "CommandeController::delete/$1");
$routes->get('/DeleteAllCommande',"CommandeController::deleteAll");
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
