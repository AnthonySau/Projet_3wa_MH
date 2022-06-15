<?php

return [

    // Routes Application (statique)

    'home' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'home'
    ],
    'app_actuality' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'actuality'
    ],
    'app_bestiary' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'bestiary'
    ],
    'app_weapon' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'weapon'
    ],
    'app_armor' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'armor'
    ],
    'app_map' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'map'
    ],


    // Route User (Gestion authentification)

    'user_register' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'register'
    ],
    'user_login' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'login'
    ],
    'user_logout' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'logout'
    ],
    'user_profile' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'profile'
    ],

    // Routes Article (CRUD)

    // Routes Commentaire (CRUD)
];