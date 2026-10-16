<?php
// ── Auth ──────────────────────────────────────────────

return function(Router $router):void{
    $router->get('/',            'AuthController@loginView');
    $router->post('/login',      'AuthController@login');
    $router->get('/logout' , 'AuthController@logOut');
};