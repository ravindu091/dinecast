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
$router->get('/logout' , 'AuthController@logOut');

// ── 6 Actor Dashboards ───────────────────────────────

// procurement
$router->get('/procurement',              'ProcurementController@home');
$router->get('/procurement/suppliers',    'ProcurementController@suppliers');
$router->get('/procurement/requisitions', 'ProcurementController@requisitions');
$router->get('/procurement/orders',       'ProcurementController@orders');

//procurement post request
$router->post('/supplier/create', 'ProcurementController@createSupplier');
$router->post('/supplier/edit',   'ProcurementController@editSupplier');
$router->post('/supplier/delete', 'ProcurementController@deleteSupplier');

// ceo
$router->get('/ceo',              'CeoController@home');
$router->get('/ceo/events',       'CeoController@events');
$router->get('/ceo/procurement',  'CeoController@procurement');
$router->get('/ceo/inventory',    'CeoController@inventory');
$router->get('/ceo/approvals',    'CeoController@approvals');
$router->get('/ceo/users',        'CeoController@users');
$router->get('/ceo/reports',      'CeoController@reports');

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
$router->get('/store/ingredients', 'StoreController@ingredients');
$router->get('/store/issue', 'StoreController@issue');
$router->get('/store/stock', 'StoreController@stock');
$router->get('/store/inventory', 'StoreController@inventory');

//store post request
$router->post('/ingredient/create','StoreController@createIngredient');
$router->post('/ingredient/edit','StoreController@editIngredient');
$router->post('/ingredient/delete','StoreController@deleteIngredient');
// ── Chef ──────────────────────────────────────────────
$router->get('/chef', 'ChefController@home');
$router->get('/chef/menus', 'ChefController@menus');
$router->get('/chef/recipes', 'ChefController@recipes');
$router->post('/chef/recipes/create', 'ChefController@createRecipe');
$router->post('/chef/recipes/update/:id', 'ChefController@updateRecipe');
$router->post('/chef/recipes/delete/:id', 'ChefController@deleteRecipe');

//profile
$router->get('/profile', 'ProfileController@profile');
$router->post('/profile/upload','ProfileController@uploadProfilePicture');
$router->post('/profile/edit','ProfileController@editProfile');
$router->post('/profile/password', 'ProfileController@changePassword');
// ── Dispatch ─────────────────────────────────────────
$router->dispatch();