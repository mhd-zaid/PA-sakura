<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Page as PageModel;
use App\Model\User;


class Page
{
    public function index()
    {
        $v = new View("Page/Page", "Back");
    }

    public function savePage()
    {
        $user = new User();
        $userData = $user->getUser(null, $_COOKIE['Email']);
        if ($userData['Role'] !== 3) {
            $page = new PageModel();

            //Cas d'un update car id est renseigné
            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $data = $page->findPageById($_GET['id']);
                if ($userData['Id'] === $data['User_Id'] || $userData['Role'] === 1) {
                    $page->setId($_GET["id"]);
                } else {
                    header("Location: /tableau-de-bord");
                }
            }
            $v = new View("Page/EditPage", "Back");
            $v->assign("data", $data ?? []);

            if (isset($_POST['submit'])) {
                if (isset($_POST['editor']) && !empty($_POST['editor'])) {
                    $page->setContent($_POST['editor']);
                    $page->setTitle($_POST['page-title']);
                    $page->setUserId($userData['Id']);
                    $page->setActive(0);
                    $page->setDescription($_POST['page-description']);
                    $today = date("Y-m-d");
                    $page->setDate($today);
                    $page->save();
                    header("Location: /page");
                }
            }
            if (isset($_POST['delete'])) {
                $page->delete($_GET['id']);
                header("Location: /page");
            }
        } else {
            echo 'pas droit';
        }
    }
    public function readPage(){
        $user = new User();
        $userData = $user->getUser(null,$_COOKIE['Email']);
        $page = new PageModel();
        $data = $page->findPageById($_GET['id']);

        if(isset($_POST['submit'])){
            header('Location: /page-add?id='.$data["Id"]);
        }  
        if(isset($_POST['publish'])){
            $page->setId($data['Id']);
            $page->setContent($data['Content']);
            $page->setTitle($data['Title']);
            $page->setUserId($userData['Id']);
            $page->setActive(1);
            $page->setDescription($data['Description']);
            $today = date("Y-m-d");
            $page->setDate($today);
            $page->save();
            header('Location: /page-read?id='.$data["Id"]);
        }  
        if(isset($_POST['unpublish'])){
            $page->setId($data['Id']);
            $page->setContent($data['Content']);
            $page->setTitle($data['Title']);
            $page->setUserId($userData['Id']);
            $page->setActive(0);
            $page->setDescription($data['Description']);
            $today = date("Y-m-d");
            $page->setDate($today);
            $page->save();
            header('Location: /page-read?id='.$data["Id"]);
        }  
        $v=new View("Page/ReadPage", "Back");
        $v->assign("data", $data??[]);
    }
}