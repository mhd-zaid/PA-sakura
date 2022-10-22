<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Article as ArticleModel;

class Article{
    public function index(){
        // session_start();
		// if(!isset($_SESSION['email'])){
		// 	header("Location: /se-connecter");
		// }else{
            $v=new View("Page/Article", "Back");
        // }
    }
    public function addArticle(){
            $v=new View("Page/EditArticle", "Back");
            $article = new ArticleModel();
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $data = $article->findArticleById($_GET['id']);
                $article->setId($_GET["id"]);
                $v->assign("data", $data??[]);
            }
        if(isset($_POST['submit']))
        {
            if(isset($_POST['editor']) && !empty($_POST['editor'])){
                $article->setContent($_POST['editor']);
                $article->setSlug($_POST['article-slug']);
                $article->save();
                header("Location: /home");
            }
        }
        if(isset($_POST['delete'])){
            $article->deleteArticleById($_GET['id']);
            header("Location: /home");
        }
    }
}