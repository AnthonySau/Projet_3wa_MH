<p>J'ai trouvé <?= $numberOfArticles ?> article(s) correspondant à votre recherche</p>

<?php

foreach ($articles as $article) { ?>
    <a href=" index.php?page=show_article&idArticle=<?= $article['id'] ?>">
        <li>
            <p><?= $article['title'] ?></p>
            <p><?= $article['resume'] ?></p>
            <p>Publié le <?= htmlspecialchars(date_format(date_create(($article['created_at'])), 'd/m/Y')) ?>
        </li>
    </a>
<?php } ?>