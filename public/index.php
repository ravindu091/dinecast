<?php

// Application base URL
define('BASE_URL', '/dinecast');
session_start();

// Load core framework
require_once '../app/Core/Router.php';
require_once '../app/Core/Controller.php';
require_once __DIR__ . '/../app/lib/utility.php';

$router = new Router(BASE_URL);

// ── Auth ──────────────────────────────────────────────
$router->get('/',            'AuthController@loginView');
$router->post('/login',      'AuthController@login');

// ── 6 Actor Dashboards ───────────────────────────────
$router->get('/admin',       'AdminController@dashboard');
$router->get('/kitchen',     'KitchenController@dashboard');
$router->get('/ceo',         'CeoController@dashboard');

// procurement
$router->get('/procurement',              'ProcurementController@home');
$router->get('/procurement/suppliers',    'ProcurementController@suppliers');
$router->get('/procurement/requisitions', 'ProcurementController@requisitions');
$router->get('/procurement/orders',       'ProcurementController@orders');

//procurement post request
$router->post('/supplier/create', 'ProcurementController@createSupplier');
$router->post('/supplier/edit',   'ProcurementController@editSupplier');
$router->post('/supplier/delete', 'ProcurementController@deleteSupplier');

// store

$router->get('/store', 'StoreController@home');
$router->get('/store/ingredients', 'StoreController@ingredients');
$router->get('/store/issue', 'StoreController@issue');
$router->get('/store/stock', 'StoreController@stock');
$router->get('/store/inventory', 'StoreController@inventory');

//store post request
$router->post('/ingredient/create','StoreController@createIngredient');
$router->post('/ingredient/edit','StoreController@editIngredient');
$router->post('/ingredient/delete','StoreController@deleteIngredient');

//chef
$router->get('/chef' , 'ChefController@home');
$router->get('/chef/menus' , 'ChefController@menus');
$router->get('/chef/recipes' , 'ChefController@recipes');

// ── Dispatch ─────────────────────────────────────────
$router->dispatch();