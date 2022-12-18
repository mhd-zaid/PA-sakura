<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Article as ArticleModel;
use App\Model\User;
use App\Core\Verificator;

class Article{
    public function index(){
        $v=new View("Page/Article", "Back");
    }

    public function saveArticle(){
        $user = new User();
        $userData = $user->getUser($_COOKIE['JWT']);
        if($userData['Role'] !== 3){
            $article = new ArticleModel();
            $form = $article->createArticleForm();

            //Cas d'un update car slug ou id renseigné
            if(isset($_GET['Slug']) && !empty($_GET['Slug']) || isset($_GET['id']) && !empty($_GET['id'])){  
                //récupère l'article courant
                $data = $article->findArticle();
                $article->setUserId($data['User_Id']);
                $article->setActive($data["Active"]);
                //Vérification de sécurité
                if($userData['Id'] === $data['User_Id'] || $userData['Role'] === 1){
                    $article->setId($data["Id"]);
                }else{
                    header("Location: /article");
                }
            }else{
                $article->setUserId($userData["Id"]);
                $article->setActive(0);
            }

            //Récupère le choix de réecriture d'URL
            $rewriteUrl = $article->findArticleRewriteUrl();
            $rewriteUrl > 0 ? $choice = 1 : $choice = 2;

            if(!empty($_POST)){
            $verificator = new Verificator($form, $_POST);
			$verificator->verificatorEditionArticle($form, $_POST);
			$configFormErrors = $verificator->getMsg();

            if(empty($configFormErrors)){

            $article->setContent($_POST['editor']);
            $article->setSlug($_POST['slug']);
            $article->setTitle($_POST['titre']);
            $article->setImageName($_POST['imageName']);
            $article->setCategories($_POST['list']);
            $article->setRewriteUrl($choice);

            if(isset($_POST['submit'])){
                $article->save();
                header("Location: /article");
            }   
            if(isset($_POST['deleteImage'])){
                $article->setImageName("");
                $article->save();
                $_GET['Slug'] ? header('Location: /article-add/'.$_GET['Slug']) : header('Location: /article-add/'.$_GET['id']);
            } 
            if(isset($_POST['delete'])){
                $article->deleteArticle();
                header("Location: /article");
            } 
            if(isset($_POST['publish'])){
                $article->setActive(1);
                $article->save();
                $_GET['Slug'] ? header('Location: /article-add/'.$_GET['Slug']) : header('Location: /article-add/'.$_GET['id']);
            }  
            if(isset($_POST['unpublish'])){
                $article->setActive(0);
                $article->save();
                $_GET['Slug'] ? header('Location: /article-add/'.$_GET['Slug']) : header('Location: /article-add/'.$_GET['id']);
            }  
        }
        } 
    }

        $v=new View("Page/EditArticle", "Back");
        $v->assign("configForm", $form);
        $v->assign("configFormErrors", $configFormErrors??[]);
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