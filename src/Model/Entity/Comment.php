<?php

namespace App\Model\Entity;

class Comment
{
    private int $id;
    private string $content;
    private \DateTime $createdAt;
    private \DateTime $updateAt;
    private User $user;
    private Article $article;

    public function __construct(?array $comment = [])
    {
        if (isset($comment['id']))
            $this->id = (int) $comment['id'];
        if (isset($comment['content']))
            $this->content = (string) $comment['content'];
        if (isset($comment['created_at']))
            $this->createdAt = new \DateTime($comment['created_at']);
        if (isset($comment['updated_at']))
            $this->updatedAt = new \DateTime($comment['updated_at']);
        if (isset($comment['user']))
            $this->user = $comment['user'];
        if (isset($comment['article']))
            $this->article = $comment['article'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getCreatedAt(): \Datetime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\Datetime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdateAt(): \Datetime
    {
        return $this->updateAt;
    }

    public function setUpdateAt(\Datetime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getArticle(): Article
    {
        return $this->article;
    }

    public function setArticle(Article $article): void
    {
        $this->article = $article;
    }
}
