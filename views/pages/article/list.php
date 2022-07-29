<section class="bgc-article list-article">
    <div class="container">
        <h2 class="title">Acutalité</h2>
        <div class="second_container">
            <input type="text" id="search">

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === false) { ?>
                <button>
                    <a href="index.php?page=add_article"><span class="iconify span-add-article" data-icon="carbon:add-filled"></span><span>Ajouter un article</span></a>
                </button>
            <?php } ?>
            <div id="target" class="list-article">
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
                <p>Seul un Admin est libre de rajouter des articles.</p>
            </div>
        </div>
    </div>
</section>