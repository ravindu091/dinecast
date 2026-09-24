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
$router->get('/procurement', 'ProcurementController@dashboard');
$router->get('/ceo',         'CeoController@dashboard');
//kitchen
$router->get('/kitchen','KitchenController@home');
$router->get('/kitchen/events','KitchenController@events');
$router->post('/kitchen/events/create','KitchenController@createEvent');
$router->post('/kitchen/events/update/:id','KitchenController@updateEvent');
$router->post('/kitchen/events/delete/:id','KitchenController@deleteEvent');
$router->get('/kitchen/bookings','KitchenController@bookings');
$router->get('/kitchen/forecast','KitchenController@forecast');
$router->get('/kitchen/pr','KitchenController@pr');
$router->get('/kitchen/attendance','KitchenController@attendance');

// store

$router->get('/store', 'StoreController@home');
$router->get('/store/ingredient', 'StoreController@ingredient');
$router->get('/store/po', 'StoreController@po');
$router->get('/store/stock', 'StoreController@stock');
$router->get('/store/inventory', 'StoreController@inventory');

// ── Dispatch ─────────────────────────────────────────
$router->dispatch();