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
    // public function addPage()
    // {
    //     $v = new View("Page/EditPage", "Back");
    //     session_start();
    //     if (!isset($_SESSION['email'])) {
    //         header("Location: /se-connecter");
    //     } else {
    //         echo "Afficher Page";
    //     }
    // }

    public function savePage()
    {
        print_r('test savePAge');
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
                print_r($page);

                if (isset($_POST['editor']) && !empty($_POST['editor'])) {
                    print_r('EDITOR');
                    $page->setContent($_POST['editor']);
                    $page->setTitle($_POST['page-title']);
                    $page->setUserId($userData['Id']);
                    $page->setActive(0);
                    $page->setDescription($_POST['page-description']);
                    $today = date("Y-m-d");
                    $page->setDate($today);
                    $page->save();
                    print_r($page);
                    // header("Location: /tableau-de-bord");
                }
            }
            if (isset($_POST['delete'])) {
                $page->delete($_GET['id']);
                header("Location: /tableau-de-bord");
            }
        } else {
            echo 'pas droit';
        }
    }
}
