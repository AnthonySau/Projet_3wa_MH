<?php

namespace App\Model\Entity;

/**
 * Article
 */
class Article
{

    private int $id;
    private string $title;
    private string $resume;
    private string $content;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;
    private User $user;
    private array $comments;

    /**
     * __construct
     *
     * @param  mixed $article
     * @return void
     */
    public function __construct(?array $article = [])
    {
        if (isset($article['id']))
            $this->id = (int) $article['id'];
        if (isset($article['title']))
            $this->title = (string) $article['title'];
        if (isset($article['resume']))
            $this->resume = (string) $article['resume'];
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
     * getTitle
     *
     * @return string
     */
    public function getTitle(): string
    {
        return htmlspecialchars($this->title);
    }

    /**
     * setTitle
     *
     * @param  mixed $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * getResume
     *
     * @return string
     */
    public function getResume(): string
    {
        return htmlspecialchars($this->resume);
    }

    /**
     * setResume
     *
     * @param  mixed $resume
     * @return void
     */
    public function setResume(string $resume): void
    {
        $this->title = $resume;
    }

    /**
     * getContent
     *
     * @return string
     */
    public function getContent(): string
    {
        return htmlspecialchars($this->content);
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
     * getUpdatedAt
     *
     * @return Datetime
     */
    public function getUpdatedAt(): \Datetime
    {
        return $this->updatedAt;
    }

    /**
     * setUpdatedAt
     *
     * @param  mixed $updatedAt
     * @return void
     */
    public function setUpdatedAt(\Datetime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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
     * getComments
     *
     * @return array
     */
    public function getComments(): array
    {
        return $this->comments;
    }

    /**
     * setComments
     *
     * @param  mixed $comments
     * @return void
     */
    public function setComments(array $comments): void
    {
        $this->comments = $comments;
    }
}
