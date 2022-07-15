<!-- Formulaire pour modifier son commentaire -->
<section class="img-user">
    <div class="padding bgc-primary">
        <fieldset>
            <legend>Modifie ton commentaire</legend>
            <form action="" method="POST">
                <textarea name="content" id="content" placeholder="Votre commentaire...">
                        <?= htmlspecialchars($data['comment']->getContent()) ?>
                </textarea>
                <button type="submit" value="Modifier mon commentaire"><span>Valider</span></button>
            </form>
        </fieldset>
    </div>
</section>