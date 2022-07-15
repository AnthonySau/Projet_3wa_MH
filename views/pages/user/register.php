<div class="img-user">
    <section class="padding bgc-primary">
        <fieldset>
            <legend>Inscription</legend>
            <form action="" method="POST">
                <?php include '_errors.php' ?>
                <label for="email">Adresse email</label>
                <input type="email" id="email" name="email" required>
                <label for="pseudo">Pseudo</label>
                <input type="pseudo" name="pseudo" id="pseudo" required>
                <label for="password">Mot de passe
                    <input type="password" id="password" name="password" required>
                </label>
                <label for="confirm_password">Confirmer votre mot de passe
                    <input type="password" id="confirm_password" name="confirm_password" required>
                </label>
                <button type="submit"><span>S'inscrire</span></button>
            </form>
        </fieldset>
    </section>
</div>