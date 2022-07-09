<?php
namespace App\Controller;

use App\Core\View;

class Main{

	public function index(): void
	{
		//imagine : cnx à la bdd pour récupérer le pseudo du user
		$pseudo = "jug";

		$v = new View("Page/Home", "back");
		$v->assign("pseudo",$pseudo);
		$v->assign("lastname","zek");
	}

	public function login(): void
	{
		echo "Afficher login";
	}
}