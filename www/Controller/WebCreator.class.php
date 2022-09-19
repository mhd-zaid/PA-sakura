<?php

namespace App\Controller;

use App\Core\View;

class WebCreator{
    public function grid(){
        $v=new View("Back/Grid", "Back");
    }
    public function components(){
        $v=new View("Back/Components", "Back");
    }
}