<?php

namespace App\Controller;
use App\Core\View;

class Commentaire{
    public function index(){
        session_start();
		if(!isset($_SESSION['email'])){
			header("Location: /se-connecter");
		}else{
            $v = new View("Page/Commentaire","Back");
        }
    }
}