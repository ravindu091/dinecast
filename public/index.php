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
$router->get('/admin',       'AdminController@dashboard');
$router->get('/kitchen',     'KitchenController@dashboard');
$router->get('/procurement', 'ProcurementController@dashboard');
// ceo
$router->get('/ceo',              'CeoController@home');
$router->get('/ceo/events',       'CeoController@events');
$router->get('/ceo/procurement',  'CeoController@procurement');
$router->get('/ceo/inventory',    'CeoController@inventory');
$router->get('/ceo/approvals',    'CeoController@approvals');
$router->get('/ceo/users',        'CeoController@users');
$router->get('/ceo/reports',      'CeoController@reports');

// store

$router->get('/store', 'StoreController@home');
$router->get('/store/ingredient', 'StoreController@ingredient');
$router->get('/store/issue', 'StoreController@issue');
$router->get('/store/stock', 'StoreController@stock');
$router->get('/store/inventory', 'StoreController@inventory');

//store post request
$router->post('/store/ingredient/create','StoreController@createIngredient');

//chef
$router->get('/chef' , 'ChefController@home');
$router->get('/chef/menus' , 'ChefController@menus');
$router->get('/chef/recipes' , 'ChefController@recipes');

// ── Dispatch ─────────────────────────────────────────
$router->dispatch();