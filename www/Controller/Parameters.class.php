<?php

namespace App\Controller;

use App\Core\View;

class Parameters
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
        header("Location: /se-connecter");
        } else {
        $v = new View("Page/Parameters", "Back");
        }
    }

    public function AccountManagement()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
        header("Location: /se-connecter");
        } else {
        $v = new View("Page/AccountManagement", "Back");
        }
    }
    
    public function parametersSupport(){
            $v = new View("Page/ParametersSupport", "Back");
        
    }
}
