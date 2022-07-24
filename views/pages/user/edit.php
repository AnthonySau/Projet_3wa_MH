<section class="img-user">
    <div class="padding bgc-forms">
        <h1>Profil de <?= $auth->getUser()->getPseudo() ?></h1>

        <p>Pseudo : <?= $auth->getUser()->getPseudo(); ?></p>
        <p>Email : <?= $auth->getUser()->getEmail(); ?> </p>

        <fieldset>
            <legend>Modifier le profil</legend>
            <form action="" method="POST">
                <label for="pseudo">Pseudo</label>
                <input type="text" name="pseudo" id="" value="<?= $auth->getUser()->getPseudo(); ?>">

                <label for="firstname">Email</label>
                <input type="text" name="firstname" id="" value="<?= $auth->getUser()->getEmail(); ?>">

                <button type="submit" value="valider"><span>Valider</span></button>
            </form>
        </fieldset>
    </div>
</section>