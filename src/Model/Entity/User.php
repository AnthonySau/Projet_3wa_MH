<?php

namespace App\Model\Entity;

/**
 * User
 */
class User
{

    private int $id;
    private string $pseudo;
    private string $email;
    private string $password;
    private ?bool $role = true;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    /**
     * __construct
     *
     * @param  mixed $user
     * @return void
     */
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
        if (isset($user['role']))
            $this->role = (bool) $user['role'];
        if (isset($user['created_at']))
            $this->createdAt = new \DateTime($user['created_at']);
        if (isset($user['updated_at']))
            $this->updatedAt = new \DateTime($user['updated_at']);
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
     * getPseudo
     *
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * setPseudo
     *
     * @param  mixed $pseudo
     * @return void
     */
    public function setPseudo(string $pseudo)
    {
        $this->pseudo = $pseudo;
    }

    /**
     * getEmail
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * setEmail
     *
     * @param  mixed $email
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * getPassword
     *
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * setPassword
     *
     * @param  mixed $password
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * getRole
     *
     * @return bool
     */
    public function getRole(): bool
    {
        return $this->role;
    }

    /**
     * setRole
     *
     * @param  mixed $role
     * @return void
     */
    public function setRole(bool $role): void
    {
        $this->role = $role;
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
}
