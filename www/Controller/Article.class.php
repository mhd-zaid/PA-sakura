<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Article as ArticleModel;
use App\Model\User;

class Article{
    public function index(){
        $v=new View("Page/Article", "Back");
    }

    public function saveArticle(){
        $user = new User();
        $userData = $user->getUser(null,$_COOKIE['Email']);
        if($userData['Role'] !== 3){
            $article = new ArticleModel();
            //Cas d'un update car id est renseigné
            if(isset($_GET['id']) && !empty($_GET['id'])){                
                $data = $article->findArticleById($_GET['id']);
                if($userData['Id'] === $data['User_Id'] || $userData['Role'] === 1){
                    $article->setId($_GET["id"]);
                }else{
                    header("Location: /tableau-de-bord");
                }
            }
            $v=new View("Page/EditArticle", "Back");
            $v->assign("data", $data??[]);

            if(isset($_POST['submit'])){
                if(isset($_GET['id']) && !empty($_GET['id'])){                
                    $data = $article->findArticleById($_GET['id']);
                    $dataUserId = $data["User_Id"];
                }
                isset($dataUserId) ? "" : $dataUserId=$userData["Id"] ;
                if(isset($_POST['editor']) && !empty($_POST['editor'])){
                    $article->setContent($_POST['editor']);
                    $article->setSlug($_POST['article-slug']);
                    $article->setUserId($dataUserId);
                    $article->setImageName($_POST['imageName']);
                    $article->save();
                    header("Location: /article");
                 }
            }   

            if(isset($_POST['deleteImage'])){
                    $article->setContent($_POST['editor']);
                    $article->setSlug($_POST['article-slug']);
                    $article->setUserId($userData['Id']);
                    $article->setImageName("");
                    $article->save();
                    header("Location: /article");
            } 
            if(isset($_POST['delete'])){
                $article->deleteArticleById($_GET['id']);
                header("Location: /tableau-de-bord");
            }  
        }else{
            echo 'pas droit';
        }
    }
    
    public function readArticle(){
        $user = new User();
        $userData = $user->getUser(null,$_COOKIE['Email']);
        $article = new ArticleModel();
        $data = $article->findArticleById($_GET['id']);
        if(isset($_POST['submit'])){
            header('Location: /article-add?id='.$data["Id"]);
        }  
        if(isset($_POST['publish'])){
            $article->setId($data['Id']);
            $article->setContent($data['Content']);
            $article->setSlug($data['Slug']);
            $article->setUserId($data['User_Id']);
            $article->setImageName($data['Image_Name']);
            $article->setActive(1);
            $article->save();
            header('Location: /article-read?id='.$data["Id"]);
        }  
        if(isset($_POST['unpublish'])){
            $article->setId($data['Id']);
            $article->setContent($data['Content']);
            $article->setSlug($data['Slug']);
            $article->setUserId($data['User_Id']);
            $article->setImageName($data['Image_Name']);
            $article->setActive(0);
            $article->save();
            header('Location: /article-read?id='.$data["Id"]);
        }  
        $v=new View("Page/ReadArticle", "Back");
        $v->assign("data", $data??[]);
    }

}