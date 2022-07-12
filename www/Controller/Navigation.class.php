<?php

namespace App\Controller;

use App\Core\View;

class Navigation{
    public function index(){
        $v = new View("Page/Navigation", "Back");
    }
}