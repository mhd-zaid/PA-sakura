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
}