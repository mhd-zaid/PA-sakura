<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Page;
use App\Model\Article as ArticleModel;
use App\Model\Comment as CommentModel;
use App\Model\Stats as statsModel;
use App\Controller\Commentaire as CommentaireController;
use App\Core\Notification\ModifyNotification;
use App\Core\Notification\DeleteNotification;
use App\Core\Notification\AddNotification;
use App\Core\SendMail;
use App\Core\Verificator;

class Site{

	public function saveComment(): void
	{
		if (isset($_POST['submit'])) {
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
				$add = new AddNotification();
				$comment->subscribeToNotification($add);
                $comment->update();
				$_SESSION["flash-success"] = "Votre commentaire est en cours de traitement.";
				header('Location: /site');
				exit();
			}
			else{
				$_SESSION["flash-error"] = "Votre commentaire n'a pas pu être publié car il contient un mot banni";
				header('Location: /site');
				exit();
			}
		}


		if (isset($_POST['signaler-comment'])){
			$comment = new CommentModel();
			$commentData = $comment->find($_POST['signaler-id']);
            
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
			$signaler = new ModifyNotification();
			$comment->subscribeToNotification($signaler);
			$comment->update($_POST['signaler-id']);
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

		$formComment = $comment->formCommentaire();

		if(!empty($_POST)){
		$data = [];
		isset($_POST['author']) ? array_push($data, $_POST["author"]) : '';
		isset($_POST['content']) ? array_push($data, $_POST["content"]) : '';
		isset($_POST['email']) ? array_push($data, $_POST["email"]) : '';
		$verificator = new Verificator($formComment, $data);
		$configFormErrors = $verificator->getMsg();
		if(empty($configFormErrors)){
			if(isset($_POST['submit'])){
				$this->saveComment();
			}
		}
	}
        if (isset($_GET['id'])) {
            $postData = $post->selectSingleArticle($_GET['id']);
			$comments = $comment->selectApprovedComments($_GET['id']);
            $v = new View("Site/SingleArticle", "Front2");
            $v->assign("post", $postData);
			$v->assign("comments", $comments);
			$this->saveComment();
        }
	$v = new View("Site/SingleArticle", "Front2");
	$v->assign("post", $postData);
	$v->assign("comments", $comments);
	$v->assign("configForm", $formComment);
	$v->assign("configFormErrors", $configFormErrors??[]);
}

	public function showSinglePage(): void
    {	
        $page = new Page();
		$pageData = null;
        $pageData = $page->find();

		$v = new View("Site/Page", "Front2");
        $v->assign("the_page", $pageData);
    }


    
}