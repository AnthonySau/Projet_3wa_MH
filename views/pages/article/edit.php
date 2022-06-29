<h4>Editer un article</h4>
<form action="" method="POST">
    <input type="text" name="title" id="title" value="
       <?= htmlspecialchars($data['article']->getTitle()) ?>">
    <textarea name="resume" id="resume" placeholder="Résumer...">
        <?= htmlspecialchars($data['article']->getResume()) ?>
    </textarea>
    <textarea name="content" id="content" placeholder="Contenu...">
        <?= htmlspecialchars($data['article']->getContent()) ?>
    </textarea>
    <input type="submit" value="Modifier">
</form>