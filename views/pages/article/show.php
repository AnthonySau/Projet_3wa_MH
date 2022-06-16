<h1>Editer l'article</h1>
<h2><?= htmlspecialchars($data['article']->getTitle()) ?></h2>
<p> <?= htmlspecialchars($data['article']->getContent()) ?></p>
Publié le <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?>
</p>
<a href="index.php?page=update_article&id=<?= htmlspecialchars($data['article']->getId())   ?>">Modifier</a>
<a href="index.php?page=delete_article&id=<?= htmlspecialchars($data['article']->getId())   ?>">Supprimer</a>