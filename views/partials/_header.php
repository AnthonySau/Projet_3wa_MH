<header class="container">
    <nav>
        <ul>
            <?php if (!$auth->isAuthenticated()) { ?>
            <li><a href="index.php?page=user_register">Inscription</a></li>
            <li><a href="index.php?page=user_login">Connexion</a></li>
            <?php } else { ?>
            <li><?= $auth->getUser()->getPseudo(); ?></li>
            <li><a href="index.php?page=user_logout">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>