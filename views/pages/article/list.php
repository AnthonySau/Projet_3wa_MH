<h4>Actualité</h4>
<?php
foreach ($data['articles'] as $article) { ?>
    <a href="index.php?page=show_article&id=<?= $article->getId() ?>">
        <li>
            <?= $article->getTitle() ?>
        </li>
    </a>
<?php } ?>