<section class="bgc-article list-article">
    <div class="list-article">
        <h4>Acutalité</h4>
        <?php if (isset($_SESSION['role']) && $_SESSION['role'] === false) { ?>
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
        <p>Seul un admin est libre de poster de nouveaux articles.</p>
    </div>
</section>