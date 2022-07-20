<section class="bgc-secondary-article list-article">
    <div class="list-article">
        <h4>Actus Monster Hunter</h4>
        <?php
        foreach ($data['articles'] as $article) { ?>
            <a href="index.php?page=show_article&idArticle=<?= $article->getId() ?>">
                <li>
                    <p><?= $article->getTitle() ?></p>
                    <p> <?= $article->getResume() ?></p>
                    <p>Publié le <?= $article->getCreatedAt()->format('d-m-Y') ?>
                </li>
            </a>
        <?php } ?>

        <button>
            <a href="index.php?page=add_article">Ajouter un article</a>
        </button>
    </div>
</section>