<?php

namespace App\Model\Entity;

class User
{

    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(?array $user = [])
    {
        if (isset($user['id']))
            $this->id = (int) $user['id'];
        if (isset($user['pseudo']))
            $this->pseudo = (string) $user['pseudo'];
        if (isset($user['email']))
            $this->email = (string) $user['email'];
        if (isset($user['password']))
            $this->password = (string) $user['password'];
        if (isset($user['created_at']))
            $this->createdAt = new \DateTime($user['created_at']);
        if (isset($user['updated_at']))
            $this->updatedAt = new \DateTime($user['updated_at']);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
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
}