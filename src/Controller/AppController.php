<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;

class AppController extends Controller
{

    public function home(): void
    {
        $this->renderView('app/home.php', [
            'title' => 'Accueil'
        ]);
    }

    public function bestiary(): void
    {
        $this->renderView('app/bestiary.php', [
            'title' => 'Bestiaire'
        ]);
    }
    public function weapon(): void
    {
        $this->renderView('app/weapon.php', [
            'title' => 'Arme'
        ]);
    }

    public function armor(): void
    {
        $this->renderView('app/armor.php', [
            'title' => 'Armure'
        ]);
    }

    public function map(): void
    {
        $this->renderView('app/map.php', [
            'title' => 'Carte'
        ]);
    }
}