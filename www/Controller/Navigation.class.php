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
        $pages = $menu->getExistingPages();
        $remove = ["menu-title", "default_menu", "slt-del-page", "publish"];
        $content = array_diff_key($_POST, array_flip($remove));
        
        if(isset($_GET["id"])) $data = $menu->findMenuById($_GET["id"]); 
        
        if(isset($_POST["publish"]) && !empty($_POST["publish"]) && !empty($content)){
            if(isset($_GET['id']) && !empty($_GET['id'])){                
                $data = $menu->findMenuById($_GET['id']);
                
                $menu->setId($data["Id"]);
                $dataActive = $data["Active"];
                $dataMain = $data["Main"];
            }
            isset($dataActive) ? "" : $dataActive=0;
            isset($dataMain) ? "" : $dataMain=0;
            $content=implode(",",$content);
            $menu->setTitle($_POST['menu-title']);
            $menu->setContent($content);
            $menu->setActive($dataActive);
            $menu->setMain($dataMain);
            $menu->save();
            if(isset($_POST["default_menu"]) && isset($_GET["id"])) $menu->updateMain($_GET["id"]);
            else if(isset($_POST["default_menu"])) $menu->updateMain();
            header("Location: /navigation");
        } 
        if(isset($_POST["unpublish"])){
            $menu->deleteMenuById($_GET["id"]);
            header("Location: /navigation");
        } 

        $v = new View("Page/EditNavigationMenu", "Back");
        $v->assign("data", $data??[]);
        $v->assign("existingPages", $pages??[]);
    }
}