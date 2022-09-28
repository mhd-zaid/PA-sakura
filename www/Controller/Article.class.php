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
        // session_start();
		// if(!isset($_SESSION['email'])){
		// 	header("Location: /se-connecter");
		// }else{
            $v=new View("Page/EditArticle", "Back");
        // }
        if(isset($_POST['submit']))
        {
            if(isset($_POST['editor']) && !is_null($_POST['editor'])){
                $article = new ArticleModel();
                $article->setContent($_POST['editor']);
                $article->save();
                print_r("c fait");
                print_r($_POST['editor']);
            }
        }else{
            echo 'no';
        }
    }
}