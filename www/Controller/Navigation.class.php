<?php

namespace App\Controller;

use App\Core\View;

class Navigation{
    public function index(){
        // session_start();
		// if(!isset($_SESSION['email'])){
		// 	header("Location: /se-connecter");
		// }else{
            $v = new View("Page/Navigation", "Back");
        // }
    }
    public function editMenu(){
            $v = new View("Page/NavigationMenu", "Back");
    }
}