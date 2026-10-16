<?php


return function (Router $router):void{
    $router->get('/profile', 'ProfileController@profile');
    $router->post('/profile/upload','ProfileController@uploadProfilePicture');
    $router->post('/profile/edit','ProfileController@editProfile');
    $router->post('/profile/password', 'ProfileController@changePassword');

};