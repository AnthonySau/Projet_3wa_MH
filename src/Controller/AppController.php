<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;
use App\Model\Manager\ArticleManager;

/**
 * AppController
 * 
 * @param MonsterHunterBlog\Controller 
 */
class AppController extends Controller
{

    /**
     * home
     * 
     * Affiche la page Accueil et la liste des 3 derniers article
     *
     * @return void
     */
    public function home(): void
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->findLasts(3);
        $this->renderView('app/home.php', [
            'title' => 'Actus',
            'articles' => $articles
        ]);
    }

    /**
     * bestiary
     * 
     * Affiche la page Bestiaire
     *
     * @return void
     */
    public function bestiary(): void
    {
        $this->renderView('app/bestiary.php', [
            'title' => 'Bestiaire'
        ]);
    }

    /**
     * weapon
     *
     * Affiche la page des armes
     * 
     * @return void
     */
    public function weapon(): void
    {
        $this->renderView('app/weapon.php', [
            'title' => 'Arme'
        ]);
    }

    /**
     * armor
     * 
     * Affiche la page des armures
     *
     * @return void
     */
    public function armor(): void
    {
        $this->renderView('app/armor.php', [
            'title' => 'Armure'
        ]);
    }

    /**
     * map
     * 
     * Affiche la page des cartes
     *
     * @return void
     */
    public function map(): void
    {
        $this->renderView('app/map.php', [
            'title' => 'Carte'
        ]);
    }
}
