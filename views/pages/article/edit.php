<section class="img-user">
    <div class="padding bgc-primary">
        <fieldset>
            <legend>Modifier l'article</legend>
            <form action="" method="POST">
                <input type="text" name="title" id="title" value="
                        <?= htmlspecialchars($data['article']->getTitle()) ?>">
                <textarea name="resume" id="resume" placeholder="Résumer...">
                        <?= htmlspecialchars($data['article']->getResume()) ?>
                </textarea>
                <textarea name="content" id="content" placeholder="Contenu...">
                        <?= htmlspecialchars($data['article']->getContent()) ?>
                </textarea>
                <button type="submit" value="Modifier"><span>Modifer</span></button>
            </form>
        </fieldset>
    </div>
</section>