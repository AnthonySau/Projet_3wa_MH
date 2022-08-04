<div class="parralax">
    <div class="container">
        <!-- Section Introduction-->
        <section>
            <div class="bgc-mirror">
                <h2>Bienvenue sur le blog Kokoto-MH</h2>
                <p> Site fan dédié au jeu Monster Hunter.</p>
                <p>Découvre l'univers dans lequel tu évolueras, visite le Bestiaire, trouve ton arme favorite, renseignes-toi sur les talents des armures ou même l'endroit où tu devras te battre.</p>
                <p>Consulte les articles récents et laisse un commentaire sur un article!</p>
            </div>
        </section>

        <!-- Section Actualité -->
        <section>
            <h2 class="title"><?= $data['title'] ?></h2>
            <?php
            foreach ($data['articles'] as $article) { ?>
                <article class="flex-article">
                    <main class="bloc-article">
                        <h3><?= $article->getTitle() ?></h3>
                        <p> <?= $article->getResume() ?></p>
                        <button>
                            <a href="index.php?page=show_article&idArticle=<?= $article->getId() ?>"><span>Consulter l'article</span>
                            </a>
                        </button>
                    </main>
                </article>
            <?php } ?>
        </section>

        <!-- Section Univers -->
        <section>
            <h2 class="title">Univers Monster Hunter</h2>
            <div class="flex-univers main-univers">
                <article>
                    <main class="bg-bestiaire">
                        <a href="index.php?page=app_bestiary">
                            <h3>Bestiaire</h3>
                            <p>Regardes les monstres que tu devras affronter.</p>
                        </a>
                    </main>
                </article>
                <article>
                    <main class="bg-armor">
                        <a href="index.php?page=app_armor">
                            <h3>Armures</h3>
                            <p>Découvre les armures qui te protègerons.</p>
                        </a>
                    </main>
                </article>
                <article>
                    <main class="bg-weapon">
                        <a href="index.php?page=app_weapon">
                            <h3>Armes</h3>
                            <p>Découvre les armes avec lesquelles tu taperas.</p>
                        </a>
                    </main>
                </article>
                <article>
                    <main class="bg-map">
                        <a href="index.php?page=app_map">
                            <h3>Cartes</h3>
                            <p>Découvre où est-ce que tu combattras.</p>
                        </a>
                    </main>
                </article>
            </div>
        </section>
    </div>
</div>