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
            //Cas d'un update car slug est renseigné
            if(isset($_GET['Slug']) && !empty($_GET['Slug']) || isset($_GET['id']) && !empty($_GET['id'])){                
                !empty($_GET['Slug']) ? $data = $article->findArticleBySlug($_GET['Slug']) : $data = $article->findArticleById($_GET['id']);
                if($userData['Id'] === $data['User_Id'] || $userData['Role'] === 1){
                    $article->setId($data["Id"]);
                }else{
                    header("Location: /tableau-de-bord");
                }
            }
            $v=new View("Page/EditArticle", "Back");
            $v->assign("data", $data??[]);

            $rewriteUrl = $article->findArticleRewriteUrl();
            $rewriteUrl > 0 ? $choice = 1 : $choice = 2;
            if(isset($_POST['submit'])){
                if(isset($_GET['Slug']) && !empty($_GET['Slug']) || isset($_GET['id']) && !empty($_GET['id'])){                
                    !empty($_GET['Slug']) ? $data = $article->findArticleBySlug($_GET['Slug']) : $data = $article->findArticleById($_GET['id']);
                    $dataUserId = $data["User_Id"];
                    $dataActive = $data["Active"];
                }
                isset($dataUserId) ? "" : $dataUserId=$userData["Id"] ;
                isset($dataActive) ? "" : $dataActive=0 ;
                if(isset($_POST['editor']) && !empty($_POST['editor']) && !is_numeric($_POST['article-slug'])){
                    $article->setContent($_POST['editor']);
                    $article->setSlug($_POST['article-slug']);
                    $article->setUserId($dataUserId);
                    $article->setImageName($_POST['imageName']);
                    $article->setActive($dataActive);
                    $article->setTitle($_POST['article-slug']);
                    $article->setRewriteUrl($choice);
                    $article->save();
                    header("Location: /article");
                 }
            }   

            if(isset($_POST['deleteImage'])){
                if(isset($_GET['Slug']) && !empty($_GET['Slug']) || isset($_GET['id']) && !empty($_GET['id'])){                
                    !empty($_GET['Slug']) ? $data = $article->findArticleBySlug($_GET['Slug']) : $data = $article->findArticleById($_GET['id']);
                    $dataUserId = $data["User_Id"];
                    $dataActive = $data["Active"];
                }
                isset($dataUserId) ? "" : $dataUserId=$userData["Id"] ;
                isset($dataActive) ? "" : $dataActive=0 ;
                $article->setContent($_POST['editor']);
                $article->setSlug($_POST['article-slug']);
                $article->setUserId($userData['Id']);
                $article->setImageName("");
                $article->setActive($dataActive);
                $article->setTitle($_POST['article-slug']);
                $article->setRewriteUrl($data['Rewrite_Url']);
                $article->save();
                header("Location: /article");
            } 
            if(isset($_POST['delete'])){
                !empty($_GET['Slug']) ? $article->deleteArticleBySlug($_GET['Slug']) : $article->deleteArticleById($_GET['id']);
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
        
        !empty($_GET['Slug']) ? $data = $article->findArticleBySlug($_GET['Slug']) : $data = $article->findArticleById($_GET['id']);
        if(isset($_POST['submit'])){
            $_GET['Slug'] ? header('Location: /article-add/'.$data["Slug"]) : header('Location: /article-add/'.$data["Id"]);
        }  
        if(isset($_POST['publish'])){
            $article->setId($data['Id']);
            $article->setContent($data['Content']);
            $article->setSlug($data['Slug']);
            $article->setUserId($data['User_Id']);
            $article->setImageName($data['Image_Name']);
            $article->setActive(1);
            $article->setTitle($data['Slug']);
            $article->setRewriteUrl($data['Rewrite_Url']);
            $article->save();
            $_GET['Slug'] ? header('Location: /article-read/'.$_GET['Slug']) : header('Location: /article-read/'.$_GET['id']);
        }  
        if(isset($_POST['unpublish'])){
            $article->setId($data['Id']);
            $article->setContent($data['Content']);
            $article->setSlug($data['Slug']);
            $article->setUserId($data['User_Id']);
            $article->setImageName($data['Image_Name']);
            $article->setActive(0);
            $article->setTitle($data['Slug']);
            $article->setRewriteUrl($data['Rewrite_Url']);
            $article->save();
            $_GET['Slug'] ? header('Location: /article-read/'.$_GET['Slug']) : header('Location: /article-read/'.$_GET['id']);
        }  
        $v=new View("Page/ReadArticle", "Back");
        $v->assign("data", $data??[]);
    }

    public function manageArticle(){
        $article = new ArticleModel();
        $value = $article->findArticleRewriteUrl();
        if(isset($_POST['save'])){
            $article->updateRewriteUrl($_POST['choice']);
            header('Location: /parametres-article ');
        }
        $v = new View("Page/ParametresManageArticle", "Back");
        $v->assign("configForm", $value);
        $v->assign("configFormErrors", $configFormErrors??[]);
    }

}