<div class="img-user">
    <section class="padding bgc-primary">
        <fieldset>
            <legend>Connexion</legend>
            <form action="" method="POST">
                <?php include '_errors.php' ?>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>
                <button type="submit"><span>Se connecter</span></button>
            </form>
        </fieldset>
    </section>
</div>