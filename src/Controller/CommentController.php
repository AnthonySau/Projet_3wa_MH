<?php

namespace App\Controller;

use MonsterHunterBlog\Controller;
use App\Model\Entity\Comment;
use App\Model\Manager\ArticleManager;
use App\Model\Manager\CommentManager;
use App\Model\Entity\Article;
use MonsterHunterBlog\Authenticator;

class CommentController extends Controller
{
    public function add(): void
    {
        if (isset($_POST) && !empty($_POST)) {

            $commentManager = new CommentManager();
            $comment = new Comment($_POST);
            $user = new Authenticator();

            $articleManager = new ArticleManager();
            $article = $articleManager->find($_GET['id']);

            $comment->setArticle($article);
            $comment->setUser($user->getUser());
            $commentManager->add($comment);

            $this->redirectToRoute('show_article');
        }
        $this->renderView('article/show.php', [
            'title' => 'Ajouter commentaire'
        ]);
    }

    public function update(): void
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager();
            $comment = $commentManager->find($_GET['id']);
            if (
                isset($_POST['content'])
                && !empty($_POST['content'])
            ) {
                $commentManager->edit(new Comment($_POST), $_GET['id']);
                $this->redirectToRoute('show_article', ['id' => $comment->getArticle()->getId()]);
            }
            $this->renderView('article/show.php', [
                'title' => 'modifier un commentaire',
                'comment' => $comment
            ]);
        }
    }

    public function delete(): void
    {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $commentManager = new CommentManager();
            $comment = $commentManager->find($_GET['id']);
            $commentManager->delete($_GET['id']);
            $this->redirectToRoute('show_article', ['id' => $comment->getArticle()->getId()]);
        } else {
            $this->redirectToRoute('home');
        }
    }
}
