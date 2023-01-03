<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Page;
use App\Model\Article as ArticleModel;
use App\Model\Comment as CommentModel;
use App\Model\Stats as statsModel;
use App\Controller\Commentaire as CommentaireController;


class Site{

	public function getMainPage(): void
	{	
		$page = new Page();
        $page = $page->findPageById(1);
        $v = new View("Site/Main","Site");
        $v->assign("page",$page);
	}

	public function getPage(): void
	{	
		$page = new Page();
		if (isset($_GET['id'])) {
			$page = $page->findPageById(intval($_GET['id']));
		}elseif (isset($_GET['name'])) {
			echo "afficher page avec le nom";
		}

		if(empty($page)){
			echo "404 page introuvable";
		}
        $v = new View("Site/Main","Site");
        $v->assign("page",$page);
	}

	public function saveComment(): void
	{
		if (isset($_POST['add-comment'])) {
			$commentaire = new CommentaireController();
			if(!($commentaire->checkComment($_POST["content"]))){
				$comment = new CommentModel();
				$comment->setAuthor($_POST['author']);
				$comment->setContent($_POST['content']);
				$comment->setEmail($_POST['email']);
				$today = date("Y-m-d");
				$comment->setDateCreated($today);
				$comment->setCommentPostId($_GET['id']);
				$comment->setNbrSignalement(0);
				$comment->save();
				$_SESSION["flash-success"] = "Votre commentaire est en cours de traitement.";
				exit();
			}
			else{
				$_SESSION["flash-error"] = "Votre commentaire n'a pas pu être publié car il contient un mot banni";
				exit();
			}
		}


		if (isset($_POST['signaler-comment'])){
			$comment = new CommentModel();
			$commentData = $comment->findCommentById($_POST['signaler-id']);
            
            if(in_array($_POST['signaler-id'],$_SESSION["messages_reported"])){
              $_SESSION["flash-error"] = "Vous avez déjà signalé ce commentaire";
			  exit();
			}
			
			$comment->setNbrSignalement($commentData['Nombre_signalement'] + 1); 

			array_push($_SESSION["messages_reported"], $_POST['signaler-id']);
			
			if($comment->getNbrSignalement() === 5){
				$comment->setStatus("unapprove");
				exit();
			}
            $comment->setId($_POST['signaler-id']);
			$comment->setAuthor($commentData['Author']);
            $comment->setContent($commentData['Content']);
            $comment->setEmail($commentData['Email']);
			$comment->setStatus("approved");
			$today = date("Y-m-d");
			$comment->setDateCreated($today);
			$comment->setCommentPostId($_GET['id']);
			$comment->save();
			$_SESSION["flash-success"] = "Vous avez bien signalé ce commentaire";
			exit();
		}
	}
	public function showSinglePost(): void
    {	
		if(!isset($_SESSION["messages_reported"])){
			$_SESSION["messages_reported"] = [];
		}
        $post = new ArticleModel();
		$comment = new CommentModel();
        if (isset($_GET['id'])) {
			
            $postData = $post->selectSingleArticle($_GET['id']);
			$comments = $comment->selectpApprovedComments($_GET['id']);
            $v = new View("Site/SingleArticle", "Front2");
            $v->assign("post", $postData);
			$v->assign("comments", $comments);
			$this->saveComment();
        }
    }

	public function showSinglePage(): void
    {	
        $page = new Page();
		$pageData = null;
        if (isset($_GET['id'])) {
            $pageData = $page->find($_GET['id']);
        }
		if (isset($_GET['Slug'])) {
			$pageData = $page->find($_GET['Slug']);
		}

		$v = new View("Site/Page", "Front2");
        $v->assign("the_page", $pageData);
    }


    
}