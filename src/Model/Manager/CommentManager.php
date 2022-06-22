<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Manager\UserManager;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;
use App\Model\Entity\Article;
use MonsterHunterBlog\Authenticator;

class CommentManager extends Manager
{
    // Fonction pour ajouter un commentaire
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

    // Fonction pour recupérer un article avec ses commentaires
    public function findComments(int $idArticle): ?array
    {
        $sql = 'SELECT * FROM comments WHERE comments.id_article = :id_article';
        $query = $this->connection->prepare($sql);
        $query->bindValue(':id_article', $idArticle, \PDO::PARAM_INT);
        $query->execute();
        $comments = $query->fetchAll();
        if (!$comments || empty($comments)) {
            return null;
        }

        $commentObjects = [];
        $userManager = new UserManager();
        foreach ($comments as $comment) {
            $comment['user'] = $userManager->find($comment['id_user']);
            array_push($commentObjects, new Comment($comment));
        }
        return $commentObjects;
    }

    // Fonction pour trouver un commentaire
    public function find(int $id): ?Comment
    {
        $sql = 'SELECT * FROM comments WHERE comment.id = :id';
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


        return new Comment($comment);
    }

    // Fonction pour supprimer un commentaire
    public function delete(int $id): void
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
    }

    // Fonction pour modifier un commentaire
    public function edit(Comment $comment, int $id): void
    {
        $sql = "UPDATE comments SET text = :text WHERE id=:id";
        $query = $this->connection->prepare($sql);

        $query->execute([
            'content' => $comment->getContent(),
            'id' => $id
        ]);
    }
}
