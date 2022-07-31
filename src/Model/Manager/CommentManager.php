<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Manager\UserManager;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;

/**
 * CommentManager
 */
class CommentManager extends Manager
{
    /**
     * add
     * 
     * Fonction pour ajouter un commentaire en BDD
     *
     * @param  mixed $comment
     * @return void
     */
    public function add(Comment $comment): void
    {
        $sql = 'INSERT INTO comments (content, created_at, id_user, id_article) VALUES (:content, :created_at, :id_user, :id_article)';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'content' => $comment->getContent(),
            'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s'),
            'id_user' => $comment->getUser()->getId(),
            'id_article' => $comment->getArticle()->getId()
        ]);
    }

    /**
     * findComments
     * 
     * Fonction pour recupérer les commentaires liés a son article en BDD
     *
     * @param  mixed $idArticle
     * @return array
     */
    public function findComments(int $idArticle): array
    {
        $sql = 'SELECT * FROM comments WHERE comments.id_article = :id_article';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id_article', $idArticle, \PDO::PARAM_INT);
        $query->execute();
        $comments = $query->fetchAll();
        if (!$comments || empty($comments)) {
            return [];
        }

        $commentObjects = [];
        $userManager = new UserManager();
        foreach ($comments as $comment) {
            $comment['user'] = $userManager->find($comment['id_user']);
            array_push($commentObjects, new Comment($comment));
        }
        return $commentObjects;
    }

    /**
     * find
     * 
     * Fonction pour trouver un commentaire en BDD
     *
     * @param  mixed $id
     * @return Comment
     */
    public function find(int $id): ?Comment
    {
        $sql = 'SELECT * FROM comments WHERE comments.id = :id';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $comment = $query->fetch();
        if (!$comment || empty($comment)) {
            return null;
        }

        $articleManager = new ArticleManager();
        $comment['article'] = $articleManager->find($comment['id_article']);
        /* */

        return new Comment($comment);
    }

    /**
     * delete
     * 
     * Fonction pour supprimer un commentaire en BDD
     *
     * @param  mixed $id
     * @return void
     */
    public function delete(int $id): void
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }

    /**
     * edit
     * 
     * Fonction pour modifier un commentaire 
     *
     * @param  mixed $comment
     * @param  mixed $id
     * @return void
     */
    public function edit(Comment $comment, int $id): void
    {
        $sql = "UPDATE comments SET content = :content WHERE id=:id";
        $query = $this->connection->prepare($sql);

        $query->execute([
            'content' => $comment->getContent(),
            'id' => $id
        ]);
    }
}
