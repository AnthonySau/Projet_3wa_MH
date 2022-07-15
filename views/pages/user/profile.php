<h1>Profil de <?= $auth->getUser()->getPseudo() ?></h1>

<p>Pseudo : <?= $auth->getUser()->getPseudo(); ?></p>
<p>Email : <?= $auth->getUser()->getEmail(); ?> </p>

<a href="index.php?page=user_edit">Modifier le profil</a>