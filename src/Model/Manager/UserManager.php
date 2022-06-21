<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Entity\User;

class UserManager extends Manager
{
    // Fonction pour inserer un nouvel utilisateur
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

    // Fonction pour rechercher un utilisateur via son ID
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

    // Fonction pour vérifier si une adresse mail est déjâ utiliser
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

    // Fonction pour vérifier si un pseudo est déjâ utiliser
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
