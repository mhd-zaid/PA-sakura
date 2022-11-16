<?php

namespace App\Controller;

use App\Core\View;

class Site{

	public function getMainPage(): void
	{	
		$v = new View("Site/Main","Site");
	}
}