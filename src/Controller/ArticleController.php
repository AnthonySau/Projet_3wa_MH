<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;
use App\Model\Entity\Article;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;
use MonsterHunterBlog\Authenticator;

/**
 * ArticleController
 */
class ArticleController extends Controller
{
    /**
     * add
     * 
     * Fonction qui permet d'ajouter un article
     *
     * @return void
     */
    public function add(): void
    {
        Authenticator::firewall();
        $user = new Authenticator();
        if ($user->getUser()->getRole() === false) {
            if (isset($_POST) && !empty($_POST)) {
                $articleManager = new ArticleManager();
                $article = new Article($_POST);
                $user = new Authenticator();

                $article->setUser($user->getUser());

                $articleManager->add($article);
                $this->redirectToRoute('app_actuality');
            }
            $this->renderView('article/add.php', [
                'title' => 'Ajouter un article'
            ]);
        } else {
            $this->redirectToRoute('home');
        }
    }


    /**
     * list
     * 
     * Fonction qui permet de voir la liste des articles
     *
     * @return void
     */
    public function list(): void
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->findAll();
        $this->renderView('article/list.php', [
            'title' => 'Actualité',
            'articles' => $articles
        ]);
    }

    /**
     * lastList
     *
     *  Fonction qui permet de voir les 3 derniers article 
     * 
     * @return void
     */
    public function lastList(): void
    {
        $articleManager = new ArticleManager();
        $articles = $articleManager->findLasts(3);
        var_dump($articles);
        die;
        $this->renderView('app/home.php', [
            'title' => 'Bonjour',
            'articles' => $articles
        ]);
    }

    /**
     * show
     * 
     * Fonction qui permet d'afficher le contenu d'un article
     * Fonction qui permet d'enregistrer un nouveau commentaire
     *
     * @return void
     */
    public function show(): void
    {
        // Réception des données du commentaire
        if (isset($_GET['idArticle']) && is_numeric($_GET['idArticle'])) {

            if (isset($_POST['content']) && !empty($_POST)) {
                $commentManager = new CommentManager();
                $articleManager = new ArticleManager();

                // Je gère l'enregistrement d'un nouveau commentaire
                if (!isset($_GET['idComment'])) {
                    $comment = new Comment($_POST);
                    $user = new Authenticator();
                    $comment->setUser($user->getUser());
                    $article = $articleManager->find($_GET['idArticle']);

                    $comment->setArticle($article);
                    $commentManager->add($comment);
                }

                $this->redirectToRoute('show_article', ['idArticle' => $comment->getArticle()->getId()]);
            }
            $articleManager = new ArticleManager();
            $article = $articleManager->find($_GET['idArticle']);

            $this->renderView('article/show.php', [
                'title' => $article->getTitle(),
                'article' => $article,
            ]);
        } else {
            $this->redirectToRoute('home');
        }
    }

    /**
     * delete
     * 
     * Fonction qui permet de supprimer un article
     *
     * @return void
     */
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

    /**
     * update
     * 
     * Fonction qui permet de modifier un article
     *
     * @return void
     */
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
