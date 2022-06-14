<header class="container">
    <div class="burger"></div>
    <nav class="menu">
        <ul>
            <li class="logo">
                <a href="index.php?page=home">
                    <img src="./public/images/LogoMh-removebg-preview.png"
                        alt="Logo Monster Hunter">
                    </img>
                </a>
            </li>
            <li><a class="hover" href="index.php?page=home">Accueil</a></li>
            <li><a class="hover" href="index.php?page=actuality">Actualité</a>
            <li><a class="univers hover" href="#">Univers</a>
                <ul class="displayNone bgc-menu">
                    <li><a class="hover" href="index.php?page=universe_bestiary">Bestiaire</a></li>
                    <hr>
                    <li><a class="hover" href="index.php?page=armory_armor">Armures</a>
                    </li>
                    <hr>
                    <li><a class="hover" href="index.php?page=armory_weapon">Armes</a>
                    </li>
                    <hr>
                    <li><a class="hover" href="index.php?page=map">Cartes</a></li>
                    <hr>
                </ul>
            </li>
            <?php if (!$auth->isAuthenticated()) { ?>
            <li><a class="hover" href="index.php?page=user_register">Inscription</a></li>
            <li><a class="hover" href="index.php?page=user_login">Connexion</a></li>
            <?php } else { ?>
            <li><a class="hover"
                    href="index.php?page=user_profile"><?= $auth->getUser()->getPseudo(); ?></a>
            </li>
            <li><a class="hover" href="index.php?page=user_logout">Déconnexion</a></li>
            <?php } ?>
        </ul>
    </nav>
</header>