<h4> Article</h4>
<h6><?= htmlspecialchars($data['article']->getTitle()) ?></h6>
<p><?= htmlspecialchars($data['article']->getContent()) ?></p>
<p>Date de publication <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?>
    par <?= htmlspecialchars($data['article']->getUser()->getPseudo()) ?></p>

<?php if (
    $auth->isAuthenticated() && $data['article']->getUser()->getId() ==
    $auth->getUser()->getId()
) { ?>
    <a href="index.php?page=update_article&id=<?= htmlspecialchars($data['article']->getId()) ?>">Modifier
    </a>
    <a href="index.php?page=delete_article&id=<?= htmlspecialchars($data['article']->getId()) ?>">Supprimer
    </a>
<?php } ?>

<h4>Commentaires :</h4>

<form action="" method="POST">
    <textarea name="content" id="content" placeholder="Votre commentaire..."></textarea>
    <input type="submit" value="Poster mon commentaire">
</form>

<?php if (!isset($data['article'])) foreach ($data['article']->getComments() as $comment) { ?>

    <p> <?= htmlspecialchars($comments->getContent()) ?> </p>

    <?php if ($auth->isAuthenticated() && $comment->getUser()->getId() == $auth->getUser()->getId()) { ?>
        <a href="index.php?page=show_article&id=<?= htmlspecialchars($comment->getId()) ?>" role="button">Modifier</a>

        <a href="index.php?page=delete_comment&id=<?= htmlspecialchars($comment->getId()) ?>" class="secondary" role="button">Supprimer</a>
    <?php } ?>
<?php } ?>