<?php


return function (Router $router):void{
    $router->post('/ingredient/create','IngredientController@createIngredient');
    $router->post('/ingredient/edit','IngredientController@editIngredient');
    $router->post('/ingredient/delete','IngredientController@deleteIngredient');
};