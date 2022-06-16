<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;
use App\Model\Entity\Article;
use App\Model\Entity\User;
use MonsterHunterBlog\Authenticator;
use App\Model\Manager\ArticleManager;

class ArticleController extends Controller
{
    public function add(): void
    {
        if (isset($_POST) && !empty($_POST)) {
            $articleManager = new ArticleManager();
            $article = new Article($_POST);
            $User = new Authenticator();

            $article->setUser($User->getUser());

            $articleManager->add($article);
            $this->redirectToRoute('app_actuality');
        }
        $this->renderView('article/add.php', [
            'title' => 'Ajouter un article'
        ]);
    }
    public function list(): void
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAll();
        $this->renderView('article/list.php', [
            'title' => 'Actualité',
            'articles' => $articles
        ]);
    }

    public function show(): void
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $articleManager = new ArticleManager();
            $article = $articleManager->find($_GET['id']);
            $this->renderView('article/show.php', [
                'title' => $article->getTitle(),
                'article' => $article
            ]);
        } else {
            $this->redirectToRoute('home');
        }
    }

    public function delete(): void
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $articleManager = new ArticleManager();
            $articleManager->delete($_GET['id']);
            $this->redirectToRoute('list_article');
        } else {
            $this->redirectToRoute('show_article', ['id' => $_GET['id']]);
        }
    }

    public function update(): void
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $articleManager = new ArticleManager();
            $article = $articleManager->find($_GET['id']);
            if (
                isset($_POST['title'], $_POST['content'])
                && !empty($_POST['title'])
                && !empty($_POST['content'])
            ) {
                $articleManager->edit(new Article($_POST), $_GET['id']);
                $this->redirectToRoute('show_article', ['id' => $_GET['id']]);
            }
            $this->renderView('article/edit.php', [
                'title' => $article->getTitle() . ' (éditer)',
                'article' => $article
            ]);
        } else {
            $this->redirectToRoute('show_article', ['id' => $_GET['id']]);
        }
    }
}