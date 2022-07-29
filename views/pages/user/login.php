<section class="img-user">
    <div class="container">
        <div class="padding-img bgc-forms">
            <fieldset>
                <legend>Connexion</legend>
                <form action="" method="POST">
                    <?php include '_errors.php' ?>
                    <label for="email">Email
                        <input type="email" name="email" id="email" required>
                    </label>
                    <label for="password">Mot de passe
                        <input type="password" name="password" id="password" required>
                    </label>
                    <button type="submit"><span>Se connecter</span></button>
                </form>
            </fieldset>
        </div>
    </div>
</section>