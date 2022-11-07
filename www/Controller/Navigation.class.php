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
        $data = $menu->findMenuById($_GET["id"]);
        $v = new View("Page/NavigationMenu", "Back");
        $v->assign("data", $data??[]);
    }
}