<header>
    <div class="burger"></div>
    <nav class="menu">
        <ul>
            <li><a href="index.php?page=home">Accueil</a></li>
            <li><a href="#">Actus</a>
            <li><a href="#">Univers</a>
                <ul>
                    <li><a href="#">Bestiaire</a></li>
                    <li><a href="#">Armure</a></li>
                    <li><a href="#">Arme</a></li>
                    <li><a href="#">Carte</a></li>
                </ul>
            </li>
            <?php if (!$auth->isAuthenticated()) { ?>
            <li><a href="index.php?page=user_register">Inscription</a></li>
            <li><a href="index.php?page=user_login">Connexion</a></li>
            <?php } else { ?>
            <li><a><?= $auth->getUser()->getPseudo(); ?></a></li>
            <li><a href="index.php?page=user_logout">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>








































<!-- <header class="container">
    <div class="burger"></div>
    <nav>
        <ul>
            <li><a href=" #">Accueil</a></li>
            <li><a href="#">Actus</a></li>
            <li><a href="#">Univers</a></li>
            <ul class="menu">
                <li><a href="#">Rubrique 2.1</a></li>
                <li><a href="#">Rubrique 2.2</a></li>
                <li><a href="#">Rubrique 2.3</a></li>
                <li><a href="#">Rubrique 2.4</a></li>
            </ul>
            <?php if (!$auth->isAuthenticated()) { ?>
            <li><a href="index.php?page=user_register">Inscription</a></li>
            <li><a href="index.php?page=user_login">Connexion</a></li>
            <?php } else { ?>
            <li><?= $auth->getUser()->getPseudo(); ?></li>
            <li><a href="index.php?page=user_logout">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header> -->