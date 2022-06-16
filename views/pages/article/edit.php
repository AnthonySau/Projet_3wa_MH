<h1>Editer un article</h1>
<form action="" method="POST">
       <input type="text" name="title" id="title" value="
       <?= htmlspecialchars($data['article']->getTitle()) ?>">
       <textarea name="content" id="content">
       <?= htmlspecialchars($data['article']->getContent()) ?>
    </textarea>
       <input type="submit" value="Modifier">
</form>