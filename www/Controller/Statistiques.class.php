<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Stats as statsModel;
use DateTime;
session_start();
class Statistiques{

	public function index(): void
	{	
		$idSession = session_id();
		$stat = new statsModel();
		if(!$stat->existSession($idSession)){
			$stat->setSession($idSession);
			$objectDate = date_format(new DateTime(),"Y-m-d" );	
			$stat->setDate($objectDate);
			$stat->save();
		}
		else{
			$stat->setId($stat->findIdBySession($idSession));
			$stat->setSession($idSession);
			$objectDate = date_format(new DateTime(),"Y-m-d" );	
			$stat->setDate($objectDate);
			$stat->save();
		}
		$v = new View("Page/Statistiques", "Back");

	}

	public function stats(): void
	{
		$dates = ['today', 'yesterday', 'week', 'month', 'months', 'year'];
		$datesValues = [];
		if ($_GET['year'] === 'current') {
			foreach ($dates as $date) {
				$stat = new statsModel();
				array_push($datesValues,$stat->getDayStats($date));
			}
			echo json_encode($datesValues);
		}else{
			$dates = ['year', 'year-1', 'year-2', 'year-3'];
			$datesValues = [];
			foreach ($dates as $date) {
				$stat = new statsModel();
				array_push($datesValues,$stat->getDayStats($date));
			}
			echo json_encode($datesValues);
		}

	}
}