<?php

return [

    //Routes Statiques
    'app_home' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'home'
    ],
    'app_guide_tuto' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'guideTuto'
    ],
    'app_univers' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'univers'
    ],
    'app_bestiaire' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'bestiaire'
    ],
    'app_armurerie' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'armurerie'
    ],
    'app_weapons' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'weapon'
    ],
    'app_armor' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'armor'
    ],
    'app_carte' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'carte'
    ],

    //Routes Articles
    'article_list' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'list'
    ],
    'article_create' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'create'
    ],
    'article_show' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'show'
    ],
    'article_add' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'add'
    ],
    'article_edit' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'edit'
    ],
    'article_delete' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'delete'
    ],
    'article_update' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'update'
    ],

    //Routes Commentaires
    'comment_show' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'show'
    ],
    'comment_add' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'add'
    ],
    'comment_edit' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'edit'
    ],
    'comment_delete' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'delete'
    ],
];