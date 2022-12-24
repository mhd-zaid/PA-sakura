<?php

namespace App\Controller;

use App\Core\View;
use App\Core\Verificator;
use App\Model\Page as PageModel;
use App\Model\User;
use App\Model\Menu;


class Page
{
    public function index()
    {
        $v = new View("Page/Page", "Back");
    }

    public function savePage(){
        $user = new User();
        $userData = $user->getUser($_COOKIE['JWT']);
        if($userData['Role'] !== 3){
            $page = new PageModel();
            $form = $page->createPageForm();

            //Cas d'un update car slug ou id renseigné
            if(isset($_GET['Slug']) && !empty($_GET['Slug']) || isset($_GET['id']) && !empty($_GET['id'])){  
                //récupère page courant
                $data = $page->find();
                $page->setUserId($data['User_Id']);
                $page->setActive($data["Active"]);
                //Vérification de sécurité
                if($userData['Id'] === $data['User_Id'] || $userData['Role'] === 1){
                    $page->setId($data["Id"]);
                }else{
                    header("Location: /page");
                }
            }else{
                $page->setUserId($userData["Id"]);
                $page->setActive(0);
            }

            //Récupère le choix de réecriture d'URL
            $rewriteUrl = $page->findRewriteUrl();
            $rewriteUrl > 0 ? $choice = 1 : $choice = 2;

            if(!empty($_POST)){
                $data = [];
                isset($_POST['editor']) ? array_push($data, $_POST["editor"]) : '';
                isset($_POST['titre']) ? array_push($data, $_POST["titre"]) : '';
                isset($_POST['slug']) ? array_push($data, $_POST["slug"]) : '';
                isset($_POST['metadescription']) ? array_push($data, $_POST["metadescription"]) : '';
                $verificator = new Verificator($form, $data);
                $verificator->verificatorEditionPage($form, $_POST);
                $configFormErrors = $verificator->getMsg();

            if(empty($configFormErrors)){

                $page->setContent($_POST['editor']);
                $page->setSlug($_POST['slug']);
                $page->setTitle($_POST['titre']);
                $page->setRewriteUrl($choice);
                $page->setDescription($_POST['metadescription']);

            if(isset($_POST['checkbox'])){
                $page->setMain(1);
            }
            if(isset($_POST['submit'])){
                $page->save();
                header("Location: /page");
            }   
            if(isset($_POST['delete'])){
                
            $menu = new Menu();
            $data = $menu->select();
            $page = new PageModel();
            $dataPage = $page->find();
            $search = $dataPage['Title'];

            foreach($data as $id=>$key ){
                if(preg_match("@$search@",$key['Content'])){

                    $replace = str_replace($search,'',$key['Content']);
                    $array = explode(',',$replace);
                    $newArray = array_filter($array);

                    $menuUpdate = new Menu();
                    $menuUpdate->setId($key['Id']);
                    $menuUpdate->setTitle($key['Title']);
                    $menuUpdate->setMain($key['Main']);
                    $menuUpdate->setActive($key['Active']);
                    $menuUpdate->setContent(implode(',',$newArray));
                    $menuUpdate->save();
                }
            }
                $page->delete();
                header("Location: /page");
            } 
            if(isset($_POST['publish'])){
                if($userData['Role'] === 1){
                $page->setActive(1);
                $page->save();
                $_GET['Slug'] ? header('Location: /page-add/'.$_GET['Slug']) : header('Location: /page-add/'.$_GET['id']);
                }else{
                    header("Location: /tableau-de-bord");
                }
            }  
            if(isset($_POST['unpublish'])){
                if($userData['Role'] === 1){
                $page->setActive(0);
                $page->save();
                $_GET['Slug'] ? header('Location: /page-add/'.$_GET['Slug']) : header('Location: /page-add/'.$_GET['id']);
                }else{
                    header("Location: /tableau-de-bord");
                }
            }  
        }
        } 
    }
    $v=new View("Page/EditPage", "Back");
    $v->assign("configForm", $form);
    $v->assign("configFormErrors", $configFormErrors??[]);
}
}