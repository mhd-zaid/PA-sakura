<?php

namespace App\Controller;
use App\Core\View;

class Media{
    public function index(){
        $v = new View("Page/Media","Back");
    }
}