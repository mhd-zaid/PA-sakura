<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Page;
use App\Model\Article as ArticleModel;
use App\Model\Comment as CommentModel;


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
			$comment = new CommentModel();
			$comment->setAuthor($_POST['author']);
            $comment->setContent($_POST['content']);
            $comment->setEmail($_POST['email']);
			$today = date("Y-m-d");
			$comment->setDateCreated($today);
			$comment->setCommentPostId($_GET['id']);
			$comment->save();
			header("Location: /site");
		}
	}

	public function showSinglePost(): void
    {	
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