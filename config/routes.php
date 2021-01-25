<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HomeAction::class)->setName('home');
    $app->post('/user', \App\Action\UserCreateAction::class);
    $app->get('/users', \App\Action\UserReadAction::class)->setName('users-get');
    $app->delete('/users/{id}', \App\Action\UserDeleteAction::class)->setName('users-delete');
    $app->patch('/user/{id}', \App\Action\UserUpdateAction::class)->setName('users-update');



};
