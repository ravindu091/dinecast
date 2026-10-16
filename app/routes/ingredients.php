<?php


return function (Router $router):void{
    $router->post('/ingredient/create','StoreController@createIngredient');
    $router->post('/ingredient/edit','StoreController@editIngredient');
    $router->post('/ingredient/delete','StoreController@deleteIngredient');
};