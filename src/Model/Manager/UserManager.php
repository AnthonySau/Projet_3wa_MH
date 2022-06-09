<?php

namespace App\Model\Manager;

use MonsterHunterBlog\Manager;
use App\Model\Entity\User;

class UserManager extends Manager
{
    // Inserer un nouvel utilisateur.
    public function add(User $user): void
    {
        $sql = 'INSERT INTO users (email, password, created_at) VALUES (:email, :password, :created_at)';
        $query = $this->connection->prepare($sql);
        $query->execute([
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'created_at' => date_format(new \DateTime('NOW'), 'Y-m-d H:i:s')
        ]);
    }

    // Rechercher un utilisateur via son ID.
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

    // Vérification adresse mail déjâ utiliser.
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
}
