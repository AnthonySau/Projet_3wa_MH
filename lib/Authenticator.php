<?php

namespace MonsterHunterBlog;

use App\Model\Manager\UserManager;
use App\Model\Entity\User;


// Variable de session qui atteste un état "connecté" à l'utilisateur.
// La Variable sera détruite à la déconnexion ou à la fermeture du navigateur.
class Authenticator
{

    // Démarre la session déclencher par le routeur à chaque route appelés.
    static public function startSession(): void {
        session_start();
    }

    // Récupère 'user_id' contenenant l'identifiant de l'utilisateur.
    static public function login(int $id): void {
        $_SESSION['user_id'] = $id;
    }

    // Retourne 'true' si l'utilisateur est connecté. Gère l'affichage de nos templates.
    public function isAuthenticated(): bool {
        return isset($_SESSION['user_id']) ? true : false;
    }

    // Retourne l'utilisateur connecté. Utile pour afficher des infos (email,etc)
    public function getUser(): User {
        $userManager = new UserManager();
        return $userManager->find($_SESSION['user_id']);
    }

    // Vide et détruit la variable de session.
    static public function logout(): void {
        $_SESSION['user_id'] = null;
        session_destroy();
    }

    // Redirige vers 'connexion' pour visionner le site. 
    static public function firewall(): void {
        if (!isset($_SESSION['user_id'])) {
            Router::redirectToRoute('user_login');
        }
    }
}