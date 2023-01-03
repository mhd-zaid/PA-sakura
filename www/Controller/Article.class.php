<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Article as ArticleModel;
use App\Model\User;
use App\Core\Verificator;
use App\Core\Notification\ModifyNotification;
use App\Core\Notification\DeleteNotification;

class Article{
    public function index(){
        $v=new View("Page/Article", "Back");
    }

    public function saveArticle(){
        $user = new User();
        $userData = $user->getUser($_COOKIE['JWT']);
        $article = new ArticleModel();
        $form = $article->createArticleForm();

            //Cas d'un update car slug ou id renseigné
            if(isset($_GET['Slug']) && !empty($_GET['Slug']) || isset($_GET['id']) && !empty($_GET['id'])){  
                //récupère l'article courant
                $dataArticle = $article->find();
                $article->setUserId($dataArticle['User_Id']);
                $article->setActive($dataArticle["Active"]);
                //Vérification de sécurité
                if($userData['Id'] === $dataArticle['User_Id'] || $userData['Role'] === 1 || $userData['Role'] === 0){
                    $article->setId($dataArticle["Id"]);
                }else{
                    $_SESSION["flash-error"] = "Vous n'avez pas le droit de consulter cette ressource.";
                    http_response_code(401);
                    header("Location: /article");
                    exit();
                }
            }else{
                $article->setUserId($userData["Id"]);
                $article->setActive(0);
            }

            //Récupère le choix de réecriture d'URL
            $rewriteUrl = $article->findRewriteUrl();
            $rewriteUrl > 0 ? $choice = 1 : $choice = 2;

            if(!empty($_POST)){
            $data = [];
            isset($_POST['editor']) ? array_push($data, $_POST["editor"]) : '';
            isset($_POST['titre']) ? array_push($data, $_POST["titre"]) : '';
            isset($_POST['slug']) ? array_push($data, $_POST["slug"]) : '';
            isset($_POST['imageName']) ? array_push($data, $_POST["imageName"]) : '';
            isset($_POST['list']) ? array_push($data, $_POST["list"]) : '';
            isset($_POST['description']) ? array_push($data, $_POST["description"]) : '';
            isset($_POST['metadescription']) ? array_push($data, $_POST["metadescription"]) : '';
            $verificator = new Verificator($form, $data);
			$verificator->verificatorEditionArticle($form, $_POST);
			$configFormErrors = $verificator->getMsg();

            if(empty($configFormErrors)){

            $article->setContent($_POST['editor']);
            $article->setSlug($_POST['slug']);
            $article->setTitle($_POST['titre']);
            if(isset($_GET['Slug']) && !empty($_GET['Slug']) || isset($_GET['id']) && !empty($_GET['id'])){ 
                if(!empty($_POST['imageName'])) $article->setImageName($_POST['imageName']);
                else $article->setImageName($dataArticle['Image_Name']); 
            }else{
                $article->setImageName($_POST['imageName']);
            }
            $article->setCategories($_POST['list']);
            $article->setRewriteUrl($choice);
            $article->setDescription($_POST['metadescription']);

            if(isset($_POST['submit'])){
                $article->save();
                if (isset($_GET["id"]) || isset($_GET['Slug'])) $_SESSION["flash-success"] = "L'article a été modifié avec succés";
                else $_SESSION["flash-success"] = "L'article a été crée avec succés";
                header("Location: /article");
                exit();
            }   
            if(isset($_POST['deleteImage'])){
                $article->setImageName("");
                $article->save();
                $_SESSION["flash-success"] = "Image supprimer";
                $_GET['Slug'] ? header('Location: /article-add/'.$_GET['Slug']) : header('Location: /article-add/'.$_GET['id']);
                exit();
            } 

            if(isset($_POST['delete'])){
                $article->delete();
                $_SESSION["flash-success"] = "L'article a été supprimer avec succés";
                header("Location: /article");
                exit();
            } 
            if(isset($_POST['publish'])){
                if($userData['Role'] === 1 || $userData['Role'] === 0){
                $article->setActive(1);
                $article->save();
                $_SESSION["flash-success"] = "L'article a été publié avec succés";
                $_GET['Slug'] ? header('Location: /article-add/'.$_GET['Slug']) : header('Location: /article-add/'.$_GET['id']);
                exit();
                }else{
                    $_SESSION["flash-error"] = "Vous n'êtes pas autorisé à faire cela.";
                    header("Location: /tableau-de-bord");
                    exit();
                }
            }  
            if(isset($_POST['unpublish'])){
                if($userData['Role'] === 1 || $userData['Role'] === 0){
                $article->setActive(0);
                $article->save();
                $_SESSION["flash-success"] = "L'article a été retiré avec succés";
                $_GET['Slug'] ? header('Location: /article-add/'.$_GET['Slug']) : header('Location: /article-add/'.$_GET['id']);
                exit();
                }else{
                    $_SESSION["flash-error"] = "Vous n'êtes pas autorisé à faire cela.";
                    header("Location: /tableau-de-bord");
                    exit();
                }
            }  
        }
        } 

        $v=new View("Page/EditArticle", "Back");
        $v->assign("configForm", $form);
        $v->assign("configFormErrors", $configFormErrors??[]);
}
}