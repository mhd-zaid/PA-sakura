<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Menu as MenuModel;
use App\Core\Verificator;

class Navigation
{
    public function index()
    {
        $menu = new MenuModel();
        $data = $menu->select();
        $v = new View("Page/Navigation", "Back");
        $v->assign("data", $data ?? []);
    }
    public function saveMenu()
    {
        $menu = new MenuModel();
        $form = $menu->createNavigationForm();
        $pages = $menu->getExistingPages();
        $remove = ["titre", "default_menu", "slt-del-page", "publish"];
        $content = array_diff_key($_POST, array_flip($remove));

        if(!empty($_POST)){
        $data = [];
        isset($_POST['titre']) ? array_push($data, $_POST['titre']) : '';
        $verificator = new Verificator($form, $data);
        $verificator->verificatorEditionNavigation($form, $_POST);
        $configFormErrors = $verificator->getMsg();

        if(empty($configFormErrors)){

        if (isset($_GET["id"])) $data = $menu->find();

        if (isset($_POST["publish"]) && !empty($_POST["publish"]) && !empty($content)) {

            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $data = $menu->find();

                $menu->setId($data["Id"]);
                $dataMain = $data["Main"];
            }
            isset($dataMain) ? "" : $dataMain = 0;
            $content = implode(",", $content);
            $menu->setTitle($_POST['titre']);
            $menu->setContent($content);
            $menu->setMain($dataMain);
            $menu->save();
            if (isset($_POST["default_menu"]) && isset($_GET["id"])) $menu->updateMain($_GET["id"]);
            else if (isset($_POST["default_menu"])) $menu->updateMain();
            if (isset($_GET["id"])) $_SESSION["flash-success"] = "Le menu a été modifié avec succés";
            else $_SESSION["flash-success"] = "Le menu a été créer avec succés";
            header("Location: /navigation");
            exit();
        }
        if (isset($_POST["unpublish"])) {
            $menuDel = $menu->find();
            if ($menuDel["Main"] == 0) {
                $menu->delete();
                $_SESSION["flash-success"] = "Le menu a été supprimé avec succés";
                header("Location: /navigation");
                exit();
            } else {
                $_SESSION["flash-error"] = "Veuillez définir un autre menu par défault avant de supprimer celui ci.";
            }
        }
    }
    }

        $v = new View("Page/EditNavigationMenu", "Back");
        $v->assign("data", $data ?? []);
        $v->assign("configForm", $form);
        $v->assign("configFormErrors", $configFormErrors??[]);
        
    }
}
