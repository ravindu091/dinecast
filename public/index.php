<?php

// Application base URL
define('BASE_URL', '/dinecast');

// Load core framework
require_once '../app/Core/Router.php';
require_once '../app/Core/Controller.php';

$router = new Router(BASE_URL);

// ── Auth ──────────────────────────────────────────────
$router->get('/',            'AuthController@login');
$router->post('/login',      'AuthController@login');

// ── 6 Actor Dashboards ───────────────────────────────
$router->get('/admin',       'AdminController@dashboard');
$router->get('/chef',        'ChefController@dashboard');
$router->get('/kitchen',     'KitchenController@dashboard');
$router->get('/store',       'StoreController@dashboard');
$router->get('/procurement', 'ProcurementController@dashboard');
$router->get('/ceo',         'CeoController@dashboard');

// ── Dispatch ─────────────────────────────────────────
$router->dispatch();