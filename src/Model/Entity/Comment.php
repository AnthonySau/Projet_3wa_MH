<?php

namespace App\Model\Entity;

class Comment
{
    private int $id;
    private string $content;
    private \DateTime $createdAt;
    private \DateTime $updateAt;

    public function __construct(?array $comment = [])
    {
        if (isset($comment['id']))
            $this->id = (int) $comment['id'];
        if (isset($comment['content']))
            $this->text = (string) $comment['content'];
        if (isset($comment['created_at']))
            $this->createdAt = new \DateTime($comment['created_at']);
        if (isset($comment['updated_at']))
            $this->updatedAt = new \DateTime($comment['updated_at']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getText(): string
    {
        return $this->content;
    }

    public function setText(string $content): void
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
}