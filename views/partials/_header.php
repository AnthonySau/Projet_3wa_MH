<header>
	<h1>
		<a href="index.php?page=home">Kokoto-MH</a>
	</h1>

	<button class="toggle-btn">
		<div class="line"></div>
		<div class="line"></div>
		<div class="line"></div>
	</button>

	<nav class="navigation menu back">
		<ul>
			<li class="link"><a href="index.php?page=home">Accueil</a></li>
			<li class="link"><a href="index.php?page=list_article">Actualité</a>
			</li>
			<li class="link univers"><a class="icone-univers" href="#">Univers</a>
				<ul id="menu-toggle" class="displayNone bgc-menu">
					<li> <a class="hover" href="index.php?page=app_bestiary">Bestiaire</a>
					</li>

					<li><a class="hover" href="index.php?page=app_armor">Armures</a>
					</li>

					<li><a class="hover" href="index.php?page=app_weapon">Armes</a>
					</li>

					<li><a class="hover" href="index.php?page=app_map">Cartes</a>
					</li>

				</ul>
			</li>

			<?php if (!$auth->isAuthenticated()) { ?>
				<li>
					<a class="hover" href="index.php?page=user_register">Inscription</a>
				</li>
				<li>
					<a class="hover" href="index.php?page=user_login">Connexion</a>
				</li>
			<?php } else { ?>
				<li>
					<a class="hover" href="index.php?page=user_edit">
						<?= $auth->getUser()->getPseudo(); ?>
					</a>
				</li>
				<li>
					<a class="hover" href="index.php?page=user_logout">Déconnexion</a>
				</li>
			<?php } ?>

		</ul>
	</nav>
</header>