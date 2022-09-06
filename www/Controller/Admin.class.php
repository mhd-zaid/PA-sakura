<?php

namespace App\Controller;

use App\Core\View;

class Admin{

	public function dashboard(): void
	{
		session_start();
		if(!isset($_SESSION['email'])){
			header("Location: /se-connecter");
		}else{
			print_r($_SESSION);
			$v = new View("Dashboard/Home");
		}
	}
}