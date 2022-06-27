<section class="bgc-blue-article">
    <div class="list-article">
        <h4>Actualité</h4>
        <?php
        foreach ($data['articles'] as $article) { ?>
            <a href="index.php?page=show_article&idArticle=<?= $article->getId() ?>">
                <li>
                    <?= $article->getTitle() ?>
                </li>
            </a>
        <?php } ?>

        <button>
            <a href="index.php?page=add_article">Ajouter un article</a>
        </button>
    </div>
</section>