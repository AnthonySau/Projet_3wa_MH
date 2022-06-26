<?php

namespace App\Model\Entity;

/**
 * Comment
 */
class Comment
{
    private int $id;
    private string $content;
    private \DateTime $createdAt;
    private \DateTime $updateAt;
    private User $user;
    private Article $article;

    /**
     * __construct
     *
     * @param  mixed $comment
     * @return void
     */
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

    /**
     * getId
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * setId
     *
     * @param  mixed $id
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * getContent
     *
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * setContent
     *
     * @param  mixed $content
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    /**
     * getCreatedAt
     *
     * @return Datetime
     */
    public function getCreatedAt(): \Datetime
    {
        return $this->createdAt;
    }

    /**
     * setCreatedAt
     *
     * @param  mixed $createdAt
     * @return void
     */
    public function setCreatedAt(\Datetime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * getUpdateAt
     *
     * @return Datetime
     */
    public function getUpdateAt(): \Datetime
    {
        return $this->updateAt;
    }

    /**
     * setUpdateAt
     *
     * @param  mixed $updateAt
     * @return void
     */
    public function setUpdateAt(\Datetime $updateAt): void
    {
        $this->updateAt = $updateAt;
    }

    /**
     * getUser
     *
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * setUser
     *
     * @param  mixed $user
     * @return void
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * getArticle
     *
     * @return Article
     */
    public function getArticle(): Article
    {
        return $this->article;
    }

    /**
     * setArticle
     *
     * @param  mixed $article
     * @return void
     */
    public function setArticle(Article $article): void
    {
        $this->article = $article;
    }
}
