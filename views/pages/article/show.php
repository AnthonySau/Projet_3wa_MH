<section class="bgc-secondary-article">
    <div class="show-article">
        <h6><?= htmlspecialchars($data['article']->getTitle()) ?></h6>
        <p><?= htmlspecialchars($data['article']->getContent()) ?></p>
        <p>Date de publication <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?>

            <?php if (
                $auth->isAuthenticated() && $data['article']->getUser()->getId() ==
                $auth->getUser()->getId()
            ) { ?>
                <a href="index.php?page=update_article&id=<?= htmlspecialchars($data['article']->getId()) ?>">Modifier
                </a>
                <a href="index.php?page=delete_article&id=<?= htmlspecialchars($data['article']->getId()) ?>">Supprimer
                </a>
            <?php } ?>
    </div>

    <div class="show-comment">
        <?php if (
            $auth->isAuthenticated()
        ) { ?>
            <!-- Formulaire pour poster son commentaire -->
            <fieldset>
                <legend>Poste ton commentaire</legend>
                <form action="" method="POST">
                    <textarea name="content" id="content" placeholder="Votre commentaire...">
                </textarea>
                    <button type=" submit" value="Poster mon commentaire"><span>Valider</span></button>
                </form>
            </fieldset>

        <?php } else { ?> <p>Vous devez vous <a href="index.php?page=user_login">connecter
                </a> pour poster un commentaire.</p>
        <?php } ?>

        <?php if (isset($data['article'])) foreach ($data['article']->getComments() as $comment) { ?>

            <p> <?= $comment->getContent() ?></p>
            <p>commenter par <?= $comment->getUser()->getPseudo() ?>
                le <?= htmlspecialchars($comment->getCreatedAt()->format('d m Y à H:i:s')) ?></p>

            <?php if ($auth->isAuthenticated() && $comment->getUser()->getId() == $auth->getUser()->getId()) { ?>

                <a href="index.php?page=update_comment&idComment=<?= htmlspecialchars($comment->getId()) ?>" role="button">Modifier</a>

                <a href="index.php?page=delete_comment&id=<?= htmlspecialchars($comment->getId()) ?>" class="secondary" role="button">Supprimer</a>
                <br>

            <?php } ?>
            <br>
        <?php } ?>


    </div>
</section>