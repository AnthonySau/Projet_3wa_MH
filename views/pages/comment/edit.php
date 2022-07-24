<!-- Formulaire pour modifier son commentaire -->
<section class="img-user">
    <div class="padding bgc-forms">
        <fieldset>
            <legend>Modifie ton commentaire</legend>
            <form action="" method="POST">
                <textarea name="content" id="content" cols="50" rows="5" placeholder="Votre commentaire..."><?= htmlspecialchars($data['comment']->getContent()) ?>
                </textarea>
                <button type="submit" value="Modifier mon commentaire">
                    <span>Valider</span>
                </button>
            </form>
        </fieldset>
    </div>
</section>