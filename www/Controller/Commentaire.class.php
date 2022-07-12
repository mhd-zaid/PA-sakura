<?php

namespace App\Controller;
use App\Core\View;

class Commentaire{
    public function index(){
        $v = new View("Page/Commentaire","Back");
    }
}