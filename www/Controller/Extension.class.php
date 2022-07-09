<?php

namespace App\Controller;

use App\Core\View;

class Extension{
    public function index(){
        $v=new View("Page/Extension", "Back");
    }
}