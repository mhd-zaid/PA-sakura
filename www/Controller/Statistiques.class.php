<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Stats as statsModel;
use DateTime;

class Statistiques{

	public function index(): void
	{	
		$ipUser = $_SERVER['REMOTE_ADDR'];
		$stat = new statsModel();
		if(!$stat->existIp($ipUser)){
			print_r("l'ip n'existe pas ");
			$stat->setIp($ipUser);
			$objectDate = new DateTime();
			$objectDate = date_format($objectDate,"d M Y" );	
			$stat->setDate($objectDate);
			$stat->save();
		}
		else{
			print_r("l'ip existe deja \n");
			print_r($stat->findIdByIp($ipUser));
			$stat->setId($stat->findIdByIp($ipUser));
			$stat->setIp($ipUser);

			$objectDate = new DateTime();
			$objectDate = date_format($objectDate,"d M Y" );	
			$stat->setDate($objectDate);
			$stat->save();
		}
		$v = new View("Page/Statistiques", "Back");
	}
}