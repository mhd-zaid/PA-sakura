<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Stats as statsModel;
use DateTime;

class Admin
{

	public function dashboard(): void
	{
		$idSession = session_id();
		$stat = new statsModel();
		if (!$stat->existSession($idSession)) {
			$stat->setSession($idSession);
			$objectDate = date_format(new DateTime(), "Y-m-d");
			$stat->setDate($objectDate);
			$stat->save();
		} else {
			$stat->setId($stat->findIdBySession($idSession));
			$stat->setSession($idSession);
			$objectDate = date_format(new DateTime(), "Y-m-d");
			$stat->setDate($objectDate);
			$stat->save();
		}
		$v = new View("Dashboard/Home");
	}
}
