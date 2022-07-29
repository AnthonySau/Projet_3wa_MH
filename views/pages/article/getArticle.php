<?php

$dbConfig = require '../../../config/database.php';

// Récupérer ce que JS nous a envoyé
$content = file_get_contents("php://input");
$data = json_decode($content, true);

$search = "%" . $data['textToFind'] . "%"; //  %banane%

$bdd = new PDO(
        "mysql:host=" . $dbConfig['host'] . ";port=" . $dbConfig['port'] . ";dbname=" . $dbConfig['dbname'] . ";charset=utf8",
        $dbConfig['username'],
        $dbConfig['password']
); // Ma connexion à la BDD ( préférable dans une fonction )

$sth = $bdd->prepare('SELECT * FROM articles WHERE title LIKE :find OR resume LIKE :find OR created_at LIKE :find ORDER BY id DESC');
$sth->bindValue('find', $search, PDO::PARAM_STR); // On protège car le text à recherche vient de l'utilisateur.
$sth->execute();
$articles = $sth->fetchAll(PDO::FETCH_ASSOC);

$numberOfArticles = count($articles); // On en profite pour compter le nombre de résultats

// Inclure le template qui va générer la partie html qui doit afficher les articles
include 'article.php';

        // Notre fichier php retourne le résultat à notre fichier js.
        // Remontez à la ligne 210 du cours. Le fichier js exploite les données et affiche notre template dans la div
