<?php

namespace App\Controller;
use App\Core\View;

class Media{
    public function index(){
        $v = new View("Page/Media","Back");
        session_start();
		if(!isset($_SESSION['email'])){
			header("Location: /se-connecter");
		}else{
            echo "Afficher media";
        }
    }
}