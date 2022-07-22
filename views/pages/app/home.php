<div class="parralax">
    <!-- Section Introduction-->
    <section>
        <div class="bgc-mirror">
            <h2>Bienvenue sur le blog Kokoto-MH</h2>
            <p> Site fan dédié au jeu Monster hunter.</p>
            <p>Découvre l'univers dans lequel tu évolueras, visite le Bestiaire, trouve ton arme favorite, l'armure qui te plaît et l'endroit où tu devras te battre.</p>
            <p>Consulte les articles récents et laisse un commentaire !</p>
        </div>
    </section>

    <!-- Section Actualité -->
    <section>
        <h3 class="title">Actualité</h3>
        <h1><?= $data['title'] ?></h1>
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
    </section>

    <!-- Section Univers -->
    <section>
        <h3 class="title">Univers Monster Hunter</h3>
        <div class="flex">
            <article>
                <main class="bg-bestiaire">
                    <a href="index.php?page=app_bestiary">
                        <h5>Bestiaire</h5>
                        <p>Regardes les monstres que tu devras affronter.</p>
                    </a>
                </main>
            </article>
            <article>
                <main class="bg-armor">
                    <a href="index.php?page=app_armor">
                        <h5>Armures</h5>
                        <p>Découvre les armures qui te protègerons.</p>
                    </a>
                </main>
            </article>
            <article>
                <main class="bg-weapon">
                    <a href="index.php?page=app_weapon">
                        <h5>Armes</h5>
                        <p>Découvre les armes avec lesquelles tu taperas.</p>
                    </a>
                </main>
            </article>
            <article>
                <main class="bg-map">
                    <a href="index.php?page=app_map">
                        <h5>Cartes</h5>
                        <p>Découvre où est-ce que tu combattras.</p>
                    </a>
                </main>
            </article>
        </div>
    </section>
</div>