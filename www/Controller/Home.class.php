<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Article as ArticleModel;
use App\Model\Category as CategoryModel;


class Home {
    public function showPosts(): void
    {
        $post = new ArticleModel();
        $category = new CategoryModel();
        $allPosts = $post->selectAllLimit();
        $allCategories = $category->selectAllLimit();
        $v = new View("Site/Home", "Front2");
        $v->assign("posts", $allPosts);
        $v->assign("categories", $allCategories);
    }


}