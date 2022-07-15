<h1>Modifier le profil</h1>

<form action="" method="POST">

    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="" value="<?= $auth->getUser()->getPseudo(); ?>">

    <label for="firstname">Email</label>
    <input type="text" name="firstname" id="" value="<?= $auth->getUser()->getEmail(); ?>">

    <input type="submit" value="valider">

</form>