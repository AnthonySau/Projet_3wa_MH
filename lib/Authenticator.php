<?php

namespace MonsterHunterBlog;

use App\Model\Manager\UserManager;
use App\Model\Entity\User;




/**
 * Authenticator
 * 
 * @package MonsterHunterBlog
 * 
 * Variable de session qui atteste un état "connecté" à l'utilisateur.
 * La Variable sera détruite à la déconnexion ou à la fermeture du navigateur.
 */
class Authenticator
{
    /**
     * startSession
     * 
     * Démarre la session déclencher par le routeur à chaque route appelés.    
     * 
     * @return void
     */
    static public function startSession(): void
    {
        session_start();
    }

    /**
     * login
     * 
     * Récupère 'user_id' contenenant l'identifiant de l'utilisateur.    
     * 
     * @param  mixed $id
     * @return void
     */
    static public function login(int $id): void
    {
        $_SESSION['user_id'] = $id;
    }

    /**
     * isAuthenticated
     *
     * Retourne 'true' si l'utilisateur est connecté. Gère l'affichage de nos templates.
     *
     * @return bool
     */
    public function isAuthenticated(): bool
    {
        return isset($_SESSION['user_id']) ? true : false;
    }


    /**
     * getUser
     * 
     * Retourne l'utilisateur connecté. Utile pour afficher des infos (email, profil, ...) 
     * 
     * @return User
     */
    public function getUser(): User
    {
        $userManager = new UserManager();
        return $userManager->find($_SESSION['user_id']);
    }

    /**
     * logout
     * 
     * Vide et détruit la variable de session.  
     *
     * @return void
     */
    static public function logout(): void
    {
        $_SESSION['user_id'] = null;
        session_destroy();
    }

    /**
     * firewall
     * 
     * Redirige vers 'home'.
     *
     * @return void
     */
    static public function firewall(): void
    {
        if (!isset($_SESSION['user_id'])) {
            Router::redirectToRoute('home');
        }
    }
}
