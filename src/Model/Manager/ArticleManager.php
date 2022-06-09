<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Entity\Article;

class ArticleManager extends Manager
{

    public function find(int $id): Article
    {
        $sql = 'SELECT * FROM articles WHERE articles.id = :id';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $article = $query->fetch();
        return new Article($article);
    }

    public function findAll(): array
    {
        $sql = 'SELECT * FROM articles';
        $query = $this->connection->query($sql);
        $articles = $query->fetchAll();
        $articlesObjects = [];
        foreach ($articles as $article) {
            array_push($articlesObjects, new Article($article));
        }
        return $articlesObjects;
    }

    public function findLasts(int $nb): array
    {
        $sql = 'SELECT * FROM articles ORDER BY articles.created_at DESC LIMIT :limit';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'limit' => $nb
        ]);
        $articles = $query->fetchAll();
        $articlesObjects = [];
        foreach ($articles as $article) {
            array_push($articlesObjects, new Article($article));
        }
        return $articlesObjects;
    }

    public function add(Article $article): void
    {
        $sql = 'INSERT INTO articles (title, resume, content, created_at) VALUES (:title, :resume, :content, :created_at)';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
        ]);
    }

    public function edit(Article $article, int $id): void
    {
        $sql = "UPDATE articles SET title = :title, resume = :resume, content = :content, updated_at = :updated_at WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute([
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'updated_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
            'id' => $id
        ]);
    }

    public function delete(int $id): void
    {
        $sql = "DELETE FROM articles WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }
}