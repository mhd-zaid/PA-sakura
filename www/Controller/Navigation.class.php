<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Menu as MenuModel;

class Navigation{
    public function index(){
        $menu = new MenuModel();
        $data = $menu->getMenus();
        $v = new View("Page/Navigation", "Back");
        $v->assign("data", $data??[]);
    }
    public function saveMenu(){
        $menu = new MenuModel();
        if(isset($_GET["id"])) $data = $menu->findMenuById($_GET["id"]);
        if(isset($_POST["submit"])) print_r($_POST);

        if(isset($_POST["publish"]) && !empty($_POST["publish"])){
            if(isset($_GET['id']) && !empty($_GET['id'])){                
                $data = $menu->findMenuById($_GET['id']);
                $menu->setId($data["Id"]);
                $dataActive = $data["Active"];
            }
            isset($dataActive) ? "" : $dataActive=0;
            // print_r($_POST);
            $content=array_splice($_POST, 2, count($_POST)-3);
            // print_r($content);
            $content=implode(",",$content);
            $menu->setTitle($_POST['menu-title']);
            $menu->setContent($content);
            $menu->setActive($dataActive);
            $menu->save();
            header("Location: /navigation");
        } 
        if(isset($_POST["unpublish"])){
            $menu->deleteMenuById($_GET["id"]);
            header("Location: /navigation");
        } 

        $v = new View("Page/EditNavigationMenu", "Back");
        $v->assign("data", $data??[]);
    }
}