<?php

return [

    //? Routes Application

    // Page Accueil
    'home' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'home'
    ],
    // Page Article
    'app_actuality' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'actuality'
    ],
    // Page Bestiaire
    'app_bestiary' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'bestiary'
    ],
    // Page Armes
    'app_weapon' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'weapon'
    ],
    // Page Armure
    'app_armor' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'armor'
    ],
    // Page Carte
    'app_map' => [
        'controller' => App\Controller\AppController::class,
        'method' => 'map'
    ],


    //? Route User

    // Inscription
    'user_register' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'register'
    ],
    // Modifie le profil
    'user_edit' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'edit'
    ],
    // Connexion
    'user_login' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'login'
    ],
    // Déconnexion
    'user_logout' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'logout'
    ],
    // Profil
    'user_profile' => [
        'controller' => App\Controller\UserController::class,
        'method' => 'profile'
    ],

    //? Routes Article (CRUD)

    // Ajouter un article
    'add_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'add'
    ],
    // Liste des articles
    'list_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'list'
    ],
    // Contenu d'un article
    'show_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'show'
    ],
    // Supprimer un article
    'delete_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'delete'
    ],
    // Modifier un article
    'update_article' => [
        'controller' => App\Controller\ArticleController::class,
        'method' => 'update'
    ],

    //? Routes Commentaire (CRUD)

    // Ajouter un commentaire
    'add_comment' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'add'
    ],
    // Modifier un commentaire
    'update_comment' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'update'
    ],
    // Supprimer un commentaire
    'delete_comment' => [
        'controller' => App\Controller\CommentController::class,
        'method' => 'delete'
    ],

];
