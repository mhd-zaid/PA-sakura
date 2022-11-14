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
			$stat->setIp($ipUser);
			$objectDate = date_format(new DateTime(),"Y-m-d" );	
			$stat->setDate($objectDate);
			$stat->save();
		}
		else{
			$stat->setId($stat->findIdByIp($ipUser));
			$stat->setIp($ipUser);
			$objectDate = date_format(new DateTime(),"Y-m-d" );	
			$stat->setDate($objectDate);
			$stat->save();
		}
		$v = new View("Page/Statistiques", "Back");

	}

	public function stats(): void
	{
		$date = $_GET["date"];
		$stat = new statsModel();
		echo $stat->getDayStats($date);
		
	}
}