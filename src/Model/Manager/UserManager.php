<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Entity\User;

/**
 * UserManager
 */
class UserManager extends Manager
{

    /**
     * add
     * 
     * Fonction pour inserer un nouvel utilisateur en BDD
     *
     * @param  mixed $user
     * @return void
     */
    public function add(User $user): void
    {
        $sql = 'INSERT INTO users (email, password, pseudo, created_at) VALUES (:email, :password, :pseudo, :created_at)';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'email' => $user->getEmail(),
            'pseudo' => $user->getPseudo(),
            'password' => $user->getPassword(),
            'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
        ]);
    }

    /**
     * find
     * 
     * Fonction pour rechercher un utilisateur via son ID en BDD
     *
     * @param  mixed $id
     * @return User
     */
    public function find(int $id): ?User
    {
        $sql = 'SELECT * FROM users WHERE users.id = :id';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'id' => $id
        ]);
        $user = $query->fetch();
        if (!$user || empty($user)) {
            return null;
        }
        return new User($user);
    }

    /**
     * findByEmail
     * 
     * Fonction pour vérifier si une adresse mail est déjâ utiliser en BDD
     *
     * @param  mixed $email
     * @return User
     */
    public function findByEmail(string $email): ?User
    {
        $sql = 'SELECT * FROM users WHERE users.email = :email';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'email' => $email
        ]);
        $user = $query->fetch();
        if (!$user || empty($user)) {
            return null;
        }
        return new User($user);
    }

    /**
     * findByPseudo
     * 
     * Fonction pour vérifier si un pseudo est déjâ utiliser en BDD
     *
     * @param  mixed $pseudo
     * @return User
     */
    public function findByPseudo(string $pseudo): ?User
    {
        $sql = 'SELECT * FROM users WHERE users.pseudo = :pseudo';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'pseudo' => $pseudo
        ]);
        $user = $query->fetch();
        if (!$user || empty($user)) {
            return null;
        }
        return new User($user);
    }
}
