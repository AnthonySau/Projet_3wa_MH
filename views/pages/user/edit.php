<section class="img-user">
    <div class="container">
        <h2 class="title">Profil de <?= $auth->getUser()->getPseudo() ?></h2>
        <div class="padding bgc-forms">
            <div class="edit-user">
                <p>Pseudo : <?= $auth->getUser()->getPseudo(); ?></p>
                <p>Email : <?= $auth->getUser()->getEmail(); ?> </p>
                <p>Date de création du compte le : <?= $auth->getUser()->getCreatedAt()->format('d-m-Y'); ?> </p>
            </div>
            <fieldset>
                <legend>Modifier le profil</legend>
                <form action="" method="POST">
                    <?php include '_errors.php' ?>
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" id="pseudo" value="<?= $auth->getUser()->getPseudo(); ?>">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?= $auth->getUser()->getEmail(); ?>">

                    <button type="submit" value="valider"><span>Valider</span></button>
                </form>
            </fieldset>
        </div>
    </div>
</section>