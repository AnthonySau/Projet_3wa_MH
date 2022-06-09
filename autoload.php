<?php

const ALIASES = [
    'MonsterHunterBlog' => 'lib',
    'App' => 'src'
];

// Appelle un script dès qu'une classe vas être utiliser.
spl_autoload_register(function (string $class): void {
    $namespaceParts = explode('\\', $class); // ["MonsterHunterBlog", "Router"]

    // Si le namespace de la classe qu'on charge commence par "MonsterHunterBlog" ou "App", on le renomme respectivement par son alias.
    if (in_array($namespaceParts[0], array_keys(ALIASES))) {
        $namespaceParts[0] = ALIASES[$namespaceParts[0]];
    } else {
        throw new Exception('Namespace Invalide "' . $namespaceParts[0] . '". Nom invalide le namespace doit commencer par "MonsterHunterBlog" or "App"');
    }

    //On reforme notre tableau sur le caractère "\", suivi de .php
    $filepath = implode(DIRECTORY_SEPARATOR, $namespaceParts) . '.php';

    //Si mon fichier n'existe pas, je retourne une erreur.
    if (!$filepath) {
        throw new Exception('Impossible de trouver le fichier "' . $filepath . " pour la classe PHP " . $class . " . ");
    }
    require $filepath;
});