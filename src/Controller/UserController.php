<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;

class UserController extends Controller
{

    public function register(): void
    {
        $errors = [];
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['confirm_password'])) {
                $errors[] = "Tous les champs doivent être saisis.";
            } else {
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Format de l'adresse email non valide.";
                }
                $emailLength = strlen($_POST['email']);
                if ($emailLength < 5 || $emailLength > 100) {
                    $errors[] = "L'adresse email doit comporter entre 5 et 100 caractères.";
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
                if ($alreadyExists) {
                    $errors[] = "Cette adresse email existe déjà.";
                } else {
                    $user = new User();
                    $user->setEmail($_POST['email']);
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

    public function login(): void
    {
        $errors = [];
        if (!empty($_POST)) {
            if (empty($_POST['email']) || empty($_POST['password'])) {
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
                $this->redirectToRoute('user_home');
            }
        }
        $this->renderView('user/login.php', [
            'title' => 'Connexion',
            'errors' => $errors
        ]);
    }

    public function logout(): void
    {
        Authenticator::logout();
        $this->redirectToRoute('user_login');
    }
}