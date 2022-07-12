<?php
namespace App\Controller;

use App\Core\View;

class Main{

	public function index(): void
	{
		//imagine : cnx à la bdd pour récupérer le pseudo du user
		$pseudo = "Yves";

		$v = new View("Page/Home", "Back");
	}

	public function login(): void
	{
		echo "Afficher login";
	}
}