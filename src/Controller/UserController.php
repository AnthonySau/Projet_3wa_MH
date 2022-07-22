<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;
use MonsterHunterBlog\Authenticator;
use App\Model\Manager\UserManager;
use App\Model\Entity\User;


/**
 * UserController
 */
class UserController extends Controller
{

    /**
     * register
     * 
     * Fonction qui permet d'enregistrer un nouvel utilisateur
     *
     * @return void
     */
    public function register(): void
    {
        $errors = [];
        if (!empty($_POST)) {
            if (
                empty($_POST['email']) ||
                empty($_POST['pseudo']) ||
                empty($_POST['password']) ||
                empty($_POST['confirm_password'])
            ) {
                $errors[] = "Tous les champs doivent être saisis.";
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Format de l'adresse email non valide.";
                }
                $emailLength = strlen($_POST['email']);
                if ($emailLength < 5 || $emailLength > 100) {
                    $errors[] = "L'adresse email doit comporter entre 5 et 100 caractères.";
                }
                $pseudoLength = strlen($_POST['pseudo']);
                if ($pseudoLength < 5 || $pseudoLength > 16) {
                    $errors[] = "Le pseudo doit comporter entre 5 et 16 caractères.";
                }
                if (strlen($_POST['password']) < 8) {
                    $errors[] = "Le mot de passe doit comporter au moins 8 caractères.";
                }
                if ($_POST['password'] !== $_POST['confirm_password']) {
                    $errors[] = "Les mots de passe saisis ne correspondent pas.";
                }
            }
            if (empty($errors)) {
                $manager = new UserManager();
                $alreadyExists = $manager->findByEmail($_POST['email']);
                $alreadyExistsPseudo = $manager->findByPseudo($_POST['pseudo']);
                if ($alreadyExists) {
                    $errors[] = "Cette adresse email existe déjà.";
                }
                if ($alreadyExistsPseudo) {
                    $errors[] = "Ce pseudo existe déjâ.";
                } else {
                    $user = new User();
                    $user->setEmail($_POST['email']);
                    $user->setPseudo($_POST['pseudo']);
                    $passwordHash = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    $user->setPassword($passwordHash);
                    $manager->add($user);
                    $this->redirectToRoute('user_login');
                }
            }
        }
        $this->renderView('user/register.php', [
            'title' => 'Inscription',
            'errors' => $errors
        ]);
    }

    /**
     * login
     * 
     * Fonction qui permet à l'utilisateur de se connecter
     *
     * @return void
     */
    public function login(): void
    {
        $errors = [];
        if (!empty($_POST)) {
            if (
                empty($_POST['email']) ||
                empty($_POST['password'])
            ) {
                $errors[] = "Tous les champs doivent être saisis.";
            } else {
                $manager = new UserManager();
                $user = $manager->findByEmail($_POST['email']);
                if (!$user) {
                    $errors[] = "Aucun compte n'est associé à cette adresse email.";
                } elseif (!password_verify($_POST['password'], $user->getPassword())) {
                    $errors[] = "Mauvais mot de passe.";
                }
            }
            if (empty($errors)) {
                Authenticator::login($user->getId());
                Authenticator::role($user->getRole());
                $this->redirectToRoute('user_home');
            }
        }
        $this->renderView('user/login.php', [
            'errors' => $errors
        ]);
    }

    /**
     * logout
     * 
     * Fonction qui permet à l'utilisateur de se déconnecter
     *
     * @return void
     */
    public function logout(): void
    {
        Authenticator::logout();
        $this->redirectToRoute('login');
    }

    public function profile(): void
    {
        $this->renderView('user/profile.php');
    }

    /**
     * edit
     *
     * Fonction pour éditer le profil
     * 
     * @return void
     */
    public function edit(): void
    {
        Authenticator::firewall();
        if (
            isset($_POST['pseudo'], $_POST['email'])
            && !empty($_POST['pseudo'])
            && !empty($_POST['email'])
        ) {
            $userManager = new UserManager();
            $user = new User([
                'pseudo' => $_POST['pseudo'],
                'email' => $_POST['email'],
                'id' => $_SESSION['user_id']
            ]);
            $userManager->edit($user);
            $this->redirectToRoute('user_edit');
        }

        $this->renderView('user/edit.php', [
            'title' => 'Modifier le profil',
        ]);
    }
}
