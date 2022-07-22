<section class="bgc-secondary-article list-article">
    <div class="list-article">
        <h4>Actus Monster Hunter</h4>
        <?php if ($auth->getUser()->getRole() === false) { ?>
            <button>
                <a href="index.php?page=add_article"><span class="iconify span-add-article" data-icon="carbon:add-filled"></span><span>Ajouter un article</span></a>
            </button>
        <?php } ?>
        <?php
        foreach ($data['articles'] as $article) { ?>
            <a href=" index.php?page=show_article&idArticle=<?= $article->getId() ?>">
                <li>
                    <p><?= $article->getTitle() ?></p>
                    <p><?= $article->getResume() ?></p>
                    <p>Publié le <?= $article->getCreatedAt()->format('d-m-Y') ?>
                </li>
            </a>
        <?php } ?>

    </div>
</section>