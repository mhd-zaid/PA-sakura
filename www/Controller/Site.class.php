<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Page;
use App\Model\Article as ArticleModel;
use App\Model\Comment as CommentModel;
use App\Model\Category as CategoryModel;
use App\Model\Stats ;
use App\Controller\Commentaire as CommentaireController;
use App\Core\Notification\ModifyNotification;
use App\Core\Notification\AddNotification;
use App\Core\Verificator;

class Site{

	
	public function index()
	{
		if (!file_exists(__DIR__ . "/../config.php")) {
			header("Location: /installation");
		} else {
			$idSession = session_id();
			$stat = new Stats();
			if (!$stat->existSession($idSession)) {
				$stat->setSession($idSession);
				$objectDate = date_format(new \DateTime(), "Y-m-d");
				$stat->setDate($objectDate);
				$stat->save();
			} else {
				$stat->setId($stat->findIdBySession($idSession));
				$stat->setSession($idSession);
				$objectDate = date_format(new \DateTime(), "Y-m-d");
				$stat->setDate($objectDate);
				$stat->save();
			}
			$page = new Page();
			$page = $page->getMainPage();
			
			$v = new View("Site/Home", "Front2");
			$v->assign("mainPage",$page);
		}
	}

	public function showPosts(): void
    {
        
        $post = new ArticleModel();
        $category = new CategoryModel();
		$allPosts = $post->selectAllActive();
        $allCategories = $category->select();
		if (!empty($_POST['category-filter'])) {
			$allPosts = $post->getPostFilter($_POST['category-filter']);
		}
		$article = new ArticleModel();
        $v = new View("Site/Post-list", "Front2");
        $v->assign("posts", $allPosts);
		$v->assign("article", $article);
		$v->assign("categories", $allCategories);
    }

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
			}
			else{
				$_SESSION["flash-error"] = "Votre commentaire n'a pas pu être publié car il contient un mot banni";
			}
		}
		if(isset($_POST['signaler-comment']))
		{
			$comment = new CommentModel();
			$commentData = $comment->findCommentbyId($_POST['signaler-id']);
			
			if(in_array($_POST['signaler-id'],$_SESSION["messages_reported"])){
				$_SESSION["flash-error"] = "Vous avez déjà signalé ce commentaire";
			}else{
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
			}
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
			$verificator->verificatorAddComment($formComment, $_POST);
			$configFormErrors = $verificator->getMsg();
			if(isset($_POST['signaler-comment']))
			{
				$this->saveComment();
			}
			if(isset($_POST['submit'])){
				if(empty($configFormErrors)){
					$this->saveComment();
				}
			}
		}
			$postData = $post->find();
			if(!$postData['Active']){
				require "View/Site/404.view.php";
				exit;
			}
			if(isset($_GET['id'])){
				$comments = $comment->selectApprovedComments($_GET['id']);
			}elseif(isset($_GET['Slug'])){
				$article = new ArticleModel();
				$article = $article->find();
				$comments = $comment->selectApprovedComments($article['Id']);
			}
		$v = new View("Site/SingleArticle", "Front2");
		$v->assign("post", $postData);
		$v->assign("comments", $comments);
		$v->assign("configForm", $formComment);
		if (isset($_POST['submit'])) {
			$v->assign("configFormErrors", $configFormErrors??[]);
		}
	}

	public function showSinglePage(): void
    {	
        $page = new Page();
		$pageData = null;
        $pageData = $page->find();
		if(!$pageData['Active']){
			require "View/Site/404.view.php";
			exit;
		}

		$v = new View("Site/Page", "Front2");
        $v->assign("the_page", $pageData);
    }


    
}