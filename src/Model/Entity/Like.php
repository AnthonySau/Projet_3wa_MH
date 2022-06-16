<?php

namespace App\Model\Entity;

class Like
{
    private User $user;
    private Article $article;

    public function __construct(?array $like = [])
    {
        if (isset($like['user']))
            $this->user = (int) $like['id'];
        if (isset($like['id_article']))
            $this->article = (int) $like['article'];
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getArticleId(): Article
    {
        return $this->article;
    }
}