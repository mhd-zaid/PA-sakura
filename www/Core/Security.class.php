<?php

namespace App\Core;
use App\Model\User;

class Security{

    public function getSecurity():void
	{
		$user = new User();
			if(!empty($_COOKIE['JWT']) && !empty($_COOKIE['Email'])){
				$checked = $user->checkToken($_COOKIE['JWT'],$_COOKIE['Email']);
				if(!$checked)
				{
					header("Location: /se-connecter");
				}
			}else{
				header("Location: /se-connecter");
			}
	}

	public function isAdmin():void
	{
			$user = new User();
			if(!empty($_COOKIE['JWT']) && !empty($_COOKIE['Email'])){
				$role = $user->getUser($_COOKIE['JWT']);
				if($role['Role'] !== 1)
				{
					header("Location: /tableau-de-bord");
				}
			}
	}
}

