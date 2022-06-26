<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Entity\Article;
use App\Model\Manager\UserManager;
use MonsterHunterBlog\Authenticator;

/**
 * ArticleManager
 */
class ArticleManager extends Manager
{
    /**
     * find
     * 
     * Fonction qui recupère un article en BDD
     *
     * @param  mixed $id
     * @return Article
     */
    public function find(int $id): ?Article
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
        $commentManager = new CommentManager();

        $article['user'] = $userManager->find($article['id_user']);
        $article['comments'] = $commentManager->findComments($id);
        return new Article($article);
    }

    /**
     * findAll
     * 
     * Fonction qui recupère tous les articles en BDD
     *
     * @return array
     */
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

    /**
     * findLasts
     *
     * Fonction qui recupère les derniers articles en BDD
     * 
     * @param  mixed $nb
     * @return array
     */
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

    /**
     * add
     *
     * Fonction pour ajouter un article en BDD
     * 
     * @param  mixed $article
     * @return void
     */
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

    /**
     * edit
     * 
     * Fonction pour mettre à jour un article en BDD
     *
     * @param  mixed $article
     * @param  mixed $id
     * @return void
     */
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

    /**
     * delete
     * 
     * Fonction pour supprimer un article en BDD
     *
     * @param  mixed $id
     * @return void
     */
    public function delete(int $id): void
    {
        $sql = "DELETE FROM articles WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }
}
