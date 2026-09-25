<?php

// Application base URL
define('BASE_URL', '/dinecast');

// Load core framework
require_once '../app/Core/Router.php';
require_once '../app/Core/Controller.php';
require_once __DIR__ . '/../app/lib/utility.php';

$router = new Router(BASE_URL);

// ── Auth ──────────────────────────────────────────────
$router->get('/',     'AuthController@login');
$router->post('/login', 'AuthController@login');


// ── Actor Dashboards ─────────────────────────────────

// Admin
$router->get('/admin', 'AdminController@dashboard');

// Procurement Manager
$router->get('/procurement', 'ProcurementController@dashboard');

// CEO
$router->get('/ceo', 'CeoController@dashboard');


// ── Kitchen Manager ──────────────────────────────────
$router->get('/kitchen', 'KitchenController@home');

$router->get('/kitchen/events', 'KitchenController@events');
$router->post('/kitchen/events/create', 'KitchenController@createEvent');
$router->post('/kitchen/events/update/:id', 'KitchenController@updateEvent');
$router->post('/kitchen/events/delete/:id', 'KitchenController@deleteEvent');

$router->get('/kitchen/bookings', 'KitchenController@bookings');
$router->get('/kitchen/forecast', 'KitchenController@forecast');
$router->get('/kitchen/pr', 'KitchenController@pr');
$router->get('/kitchen/attendance', 'KitchenController@attendance');


// ── Store Manager ────────────────────────────────────
$router->get('/store', 'StoreController@home');

$router->get('/store/ingredient', 'StoreController@ingredient');
$router->get('/store/issue', 'StoreController@issue');
$router->get('/store/stock', 'StoreController@stock');
$router->get('/store/inventory', 'StoreController@inventory');


// ── Chef ──────────────────────────────────────────────
$router->get('/chef', 'ChefController@home');
$router->get('/chef/menus', 'ChefController@menus');
$router->get('/chef/recipes', 'ChefController@recipes');


// ── Dispatch ─────────────────────────────────────────
$router->dispatch();