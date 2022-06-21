<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Entity\Article;
use App\Model\Manager\UserManager;
use MonsterHunterBlog\Authenticator;

class ArticleManager extends Manager
{

    //Fonction qui recupère un article
    public function find(int $id): Article
    {
        $sql = 'SELECT * FROM articles WHERE articles.id = :id';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $article = $query->fetch();
        if (!$article || empty($article)) {
            return null;
        }

        $userManager = new UserManager();
        $article['user'] = $userManager->find($article['id_user']);

        return new Article($article);
    }

    // Fonction qui recupère tous les articles
    public function findAll(): ?array
    {
        $sql = 'SELECT * FROM articles';
        $query = $this->connection->query($sql);
        $articles = $query->fetchAll();
        if (!$articles || empty($articles)) {
            return null;
        }
        $articlesObjects = [];
        $userManager = new UserManager();
        foreach ($articles as $article) {
            $article['user'] = $userManager->find($article['id_user']);
            array_push($articlesObjects, new Article($article));
        }
        return $articlesObjects;
    }

    // Fonction qui recupère les derniers articles
    public function findLasts(int $nb): array
    {
        $sql = 'SELECT * FROM articles ORDER BY articles.created_at DESC LIMIT :limit';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'limit' => $nb
        ]);
        $articles = $query->fetchAll();
        if (!$articles || empty($articles)) {
            return null;
        }
        $articlesObjects = [];
        $userManager = new UserManager();
        foreach ($articles as $article) {
            $article['user'] = $userManager->find($article['id_user']);
            array_push($articlesObjects, new Article($article));
        }
        return $articlesObjects;
    }

    // Fonction pour ajouter un article
    public function add(Article $article): void
    {
        $sql = 'INSERT INTO articles (title, content, created_at, id_user) VALUES (:title, :content, :created_at, :id_user)';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
            'id_user' => $article->getUser()->getId()
        ]);
    }

    // Fonction pour mettre à jour un article
    public function edit(Article $article, int $id): void
    {
        $sql = "UPDATE articles SET title = :title, content = :content, updated_at = :updated_at WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute([
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
            'id' => $id
        ]);
    }

    // Fonction pour supprimer un article
    public function delete(int $id): void
    {
        $sql = "DELETE FROM articles WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }
}
