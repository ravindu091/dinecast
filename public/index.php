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
$router->get('/ceo',         'CeoController@dashboard');

// store

$router->get('/store', 'StoreController@home');
$router->get('/store/ingredient', 'StoreController@ingredient');
$router->get('/store/issue', 'StoreController@issue');
$router->get('/store/stock', 'StoreController@stock');
$router->get('/store/inventory', 'StoreController@inventory');

//chef
$router->get('/chef' , 'ChefController@home');
$router->get('/chef/menus' , 'ChefController@menu');
$router->get('/chef/recipes' , 'ChefController@recipe');

// ── Dispatch ─────────────────────────────────────────
$router->dispatch();