<?php

namespace App\Controller;

use App\Core\View;

class Article{
    public function index(){
        $v=new View("Page/Article", "Back");
    }
    public function addArticle(){
        $v=new View("Page/EditArticle", "Back");
    }
}