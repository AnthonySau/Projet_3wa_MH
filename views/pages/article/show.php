<section class="bgc-article">
    <div class="container">
        <article class="flex-article">
            <main class="bloc-article">
                <h2><?= htmlspecialchars($data['article']->getTitle()) ?></h2>
                <p><?= htmlspecialchars($data['article']->getContent()) ?></p>
                <p>Date de publication <?= htmlspecialchars($data['article']->getCreatedAt()->format('d-m-Y')) ?>

                    <?php if (
                        $auth->isAuthenticated() && $data['article']->getUser()->getId() ==
                        $auth->getUser()->getId()
                    ) { ?>
                        <button>
                            <a href="index.php?page=update_article&id=<?= htmlspecialchars($data['article']->getId()) ?>">
                                <span>Modifier</span>
                            </a>
                        </button>
                        <button>
                            <a href="index.php?page=delete_article&id=<?= htmlspecialchars($data['article']->getId()) ?>">
                                <span>Supprimer</span>
                            </a>
                        </button>
                    <?php } ?>
            </main>
        </article>

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
                <!-- Phrase pour les utilisateurs non-connectés -->
            <?php } else { ?> <span id="need-co">
                    <p>Vous devez vous <a href="index.php?page=user_login">connecter
                        </a> pour poster un commentaire.
                    </p>
                </span>
            <?php } ?>

            <!-- Liste des commentaires  -->
            <section class="show-comments">
                <?php if (isset($data['article'])) foreach ($data['article']->getComments() as $comment) { ?>
                    <main>
                        <p><?= $comment->getContent() ?></p>
                        <p>commenter par <?= $comment->getUser()->getPseudo() ?>
                            le <?= htmlspecialchars($comment->getCreatedAt()->format('d-m-Y à H:i:s')) ?></p>
                        <?php if ($auth->isAuthenticated() && $comment->getUser()->getId() == $auth->getUser()->getId()) { ?>
                            <span class="btnCommentModif"><a href="index.php?page=update_comment&idComment=<?= htmlspecialchars($comment->getId()) ?>" role="button">Modifier</a></span>

                            <span class="btnCommentSuppr"><a href="index.php?page=delete_comment&id=<?= htmlspecialchars($comment->getId()) ?>" class="secondary" role="button">Supprimer</a></span>
                        <?php } ?>
                    </main>
                <?php } ?>
            </section>
        </div>
    </div>
</section>