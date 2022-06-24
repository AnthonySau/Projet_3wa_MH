<!-- Formulaire pour modifier son commentaire -->
<form action="" method="POST">
    <textarea name="content" id="content" placeholder="Votre commentaire...">
    <?= htmlspecialchars($data['comment']->getContent()) ?>
    </textarea>
    <input type="submit" value="Modifier mon commentaire">
</form>