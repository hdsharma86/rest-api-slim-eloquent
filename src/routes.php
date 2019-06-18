<?php

use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
    $container = $app->getContainer();
    $app->get('/','\Src\Controllers\WelcomeController:index');
    $app->get('/users','\Src\Controllers\UserController:getUsers')->setName('users');
    $app->post('/users/create','\Src\Controllers\UserController:createUser');
};

