<?php

// Application base URL
define('BASE_URL', '/dinecast');

// Load core framework
require_once '../app/Core/Router.php';
require_once '../app/Core/Controller.php';
require_once __DIR__ . '/../app/lib/utility.php';

$router = new Router(BASE_URL);

// ── Auth ──────────────────────────────────────────────
$router->get('/',            'AuthController@login');
$router->post('/login',      'AuthController@login');

// ── 6 Actor Dashboards ───────────────────────────────
$router->get('/kitchen',     'KitchenController@dashboard');
$router->get('/procurement', 'ProcurementController@dashboard');
$router->get('/ceo',         'CeoController@dashboard');

// admin
$router->get('/admin', 'AdminController@home');
$router->get('/admin/users', 'AdminController@users');
$router->post('/admin/users/create', 'AdminController@createUser');
$router->post('/admin/users/update', 'AdminController@updateUser');
$router->post('/admin/users/delete', 'AdminController@deleteUser');
$router->get('/admin/params', 'AdminController@params');
$router->get('/admin/uom', 'AdminController@uom');
$router->get('/admin/holidays', 'AdminController@holidays');
$router->get('/admin/logs', 'AdminController@logs');

// store

$router->get('/store', 'StoreController@home');
$router->get('/store/ingredient', 'StoreController@ingredient');
$router->get('/store/issue', 'StoreController@issue');
$router->get('/store/stock', 'StoreController@stock');
$router->get('/store/inventory', 'StoreController@inventory');

//chef
$router->get('/chef' , 'ChefController@home');
$router->get('/chef/menus' , 'ChefController@menus');
$router->get('/chef/recipes' , 'ChefController@recipes');

// ── Dispatch ─────────────────────────────────────────
$router->dispatch();