<?php

namespace App\Controller;

use App\Core\View;

class Page{
    public function index(){
        $v=new View("Page/Page", "Back");
    }
    public function addPage(){
        $v=new View("Page/EditPage", "Back");
    }
}