<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;
use App\Model\Entity\Article;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;
use MonsterHunterBlog\Authenticator;

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
        // Réception des données du commentaire
        // var_dump($_POST);
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {

            if (isset($_POST['content']) && !empty($_POST)) {
                $commentManager = new CommentManager();
                $articleManager = new ArticleManager();
                $comment = new Comment($_POST);
                $user = new Authenticator();

                $comment->setUser($user->getUser());
                $article = $articleManager->find($_GET['id']);
                $comment->setArticle($article);

                $commentManager->add($comment);
                $this->redirectToRoute('show_article', ['id' => $comment->getArticle()->getId()]);
            }
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
