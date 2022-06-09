<h1>Inscription</h1>
<form action="" method="POST">
    <?php include '_errors.php' ?>
    <label for="email">Adresse email</label>
    <input type="email" id="email" name="email" required>
    <div class="grid">
        <label for="password">
            Mot de passe
            <input type="password" id="password" name="password" required>
        </label>
        <label for="confirm_password">
            Répétez votre mot de passe
            <input type="password" id="confirm_password" name="confirm_password" required>
        </label>
    </div>
    <button type="submit">S'inscrire</button>
</form>