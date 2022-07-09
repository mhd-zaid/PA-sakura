<?php

namespace App\Controller;
use App\Core\View;


class Article{
    public function index(){
      $v = new View("Page/Article", "back");
    }

    public function add(){
      $v = new View("Page/EditArticle", "back");
    }
}