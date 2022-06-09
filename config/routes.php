<?php

return [

    //Routes Statiques (Nav/Home)
    'home' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'home'
    ],
    'guide_tuto' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'guideTuto'
    ],
    'universe_bestiary' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'bestiary'
    ],
    'armory_weapon' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'weapon'
    ],
    'armory_armor' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'armor'
    ],
    'map' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'map'
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
    'article_update' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'update'
    ],
    'comment_delete' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'delete'
    ],
];