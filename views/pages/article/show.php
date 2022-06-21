<h4>Editer l'article</h4>
<h2><?= htmlspecialchars($data['article']->getTitle()) ?></h2>
<p> <?= htmlspecialchars($data['article']->getContent()) ?></p>
<p>Date de publication <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?>
    par <?= htmlspecialchars($data['article']->getUser()->getPseudo()) ?></p>

<?php if ($auth->isAuthenticated() && $data['article']->getUser()->getId() == $auth->getUser()->getId()) { ?>
    <a href="index.php?page=update_article&id=<?= htmlspecialchars($data['article']->getId())   ?>">Modifier</a>
    <a href="index.php?page=delete_article&id=<?= htmlspecialchars($data['article']->getId())   ?>">Supprimer</a>
<?php } ?>