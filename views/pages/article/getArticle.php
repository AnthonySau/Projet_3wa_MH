<?php

$dbConfig = require '../../../config/database.php';

// Récupérer ce que JS nous a envoyé
$content = file_get_contents("php://input");
$data = json_decode($content, true);

$search = "%" . $data['textToFind'] . "%";

$bdd = new PDO(
        "mysql:host=" . $dbConfig['host'] . ";port=" . $dbConfig['port'] . ";dbname=" . $dbConfig['dbname'] . ";charset=utf8",
        $dbConfig['username'],
        $dbConfig['password']
);

$sth = $bdd->prepare('SELECT * FROM articles WHERE title LIKE :find OR resume LIKE :find OR created_at LIKE :find ORDER BY id DESC');
$sth->bindValue('find', $search, PDO::PARAM_STR);
$sth->execute();
$articles = $sth->fetchAll(PDO::FETCH_ASSOC);

$numberOfArticles = count($articles);
include 'article.php';
