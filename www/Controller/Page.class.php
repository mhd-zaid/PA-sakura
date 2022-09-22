<?php

namespace App\Controller;

class Page{
    public function index(){
        session_start();
		if(!isset($_SESSION['email'])){
			header("Location: /se-connecter");
		}else{
            echo "Afficher Page";
        }
    }
}