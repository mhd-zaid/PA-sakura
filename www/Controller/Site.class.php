<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Page;

class Site{

	public function getMainPage(): void
	{	
		$page = new Page();
        $page = $page->findPageById(1);
        $v = new View("Site/Main","Site");
        $v->assign("page",$page);
	}

	public function getPage(): void
	{	
		$page = new Page();
		if (isset($_GET['id'])) {
			$page = $page->findPageById(intval($_GET['id']));
		}elseif (isset($_GET['name'])) {
			echo "afficher page avec le nom";
		}

		if(empty($page)){
			echo "404 page introuvable";
		}
        $v = new View("Site/Main","Site");
        $v->assign("page",$page);
	}
}