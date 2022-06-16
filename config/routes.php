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

    'add_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'add'
    ],
    'list_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'list'
    ],
    'show_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'show'
    ],
    'delete_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'delete'
    ],
    'update_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'update'
    ],

    // Routes Commentaire (CRUD)

    // 'add_comment' => [
    //     'controller' => App\Controller\CommentController::class,
    //     'method' => 'add'
    // ],
    // 'show_comment' => [
    //     'controller' => App\Controller\CommentController::class,
    //     'method' => 'show'
    // ],
    // 'list_comment' => [
    //     'controller' => App\Controller\CommentController::class,
    //     'method' => 'list'
    // ],
    // 'delete_comment' => [
    //     'controller' => App\Controller\CommentController::class,
    //     'method' => 'delete'
    // ],
    // 'update_comment' => [
    //     'controller' => App\Controller\CommentController::class,
    //     'method' => 'update'
    // ],
];