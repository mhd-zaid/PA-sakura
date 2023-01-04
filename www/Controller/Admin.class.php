<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Stats as statsModel;
use DateTime;

class Admin
{

	public function dashboard(): void
	{
		$v = new View("Page/Home");
	}
}
