<?php

return function (Router $router){
    $router->get('/store', 'StoreController@home');
    $router->get('/store/ingredients', 'StoreController@ingredients');
    $router->get('/store/issue', 'StoreController@issue');
    $router->get('/store/stock', 'StoreController@stock');
    $router->get('/store/inventory', 'StoreController@inventory');
    $router->get('/store/pr', 'StoreController@pr');
};

