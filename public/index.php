<?php

$baseUrl = '/dinecast';

require_once '../app/Core/Router.php';
require_once '../app/Core/Controller.php';

$router = new Router($baseUrl);

//Home router
$router->get('/', "HomeController@view");




$router->dispatch();