<?php

namespace App\Controller;

use App\Core\View;
use App\Core\SiteMap as SiteMapCore;
use App\Model\Page;
use App\Model\Article;

class SiteMap
{
    public function index(){
        $article = new Article();
        $page = new Page();
        $article = $article->getAllPostActive();
        $page = $page->getAllPostActive();
        $result = array_merge($page, $article);
        $appSiteMapService = new SiteMapCore();
        $siteMapResult = $appSiteMapService->generateSiteMap($result);
        header("Location: /sitemap.xml");
    }
}
