<section class="img-user">
    <div class="container">
        <div class="padding bgc-forms">
            <fieldset>
                <legend>Inscription</legend>
                <form action="" method="POST">
                    <?php include '_errors.php' ?>
                    <label for="email">Adresse email
                        <input type="email" id="email" name="email" required>
                    </label>
                    <label for="pseudo">Pseudo
                        <input type="pseudo" name="pseudo" id="pseudo" required>
                    </label>
                    <label for="password">Mot de passe
                        <input type="password" id="password" name="password" required>
                    </label>
                    <label for="confirm_password">Confirmer mot de passe
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </label>
                    <button type="submit"><span>S'inscrire</span></button>
                </form>
            </fieldset>
        </div>
    </div>
</section>