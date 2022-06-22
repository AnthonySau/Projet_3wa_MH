<?php

namespace App\Model\Entity;

class Article
{

    private int $id;
    private string $title;
    private string $content;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;
    private User $user;
    private array $comments;

    public function __construct(?array $article = [])
    {
        if (isset($article['id']))
            $this->id = (int) $article['id'];
        if (isset($article['title']))
            $this->title = (string) $article['title'];
        if (isset($article['content']))
            $this->content = (string) $article['content'];
        if (isset($article['created_at']))
            $this->createdAt = new \DateTime($article['created_at']);
        if (isset($article['updated_at']))
            $this->updatedAt = new \DateTime($article['updated_at']);
        if (isset($article['comments']))
            $this->comments = $article['comments'];
        if (isset($article['user']))
            $this->user = $article['user'];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
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

    public function getUpdatedAt(): \Datetime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\Datetime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    public function getComments(): array
    {
        return $this->comments;
    }

    public function setComments(array $comments): void
    {
        $this->comments = $comments;
    }
}
