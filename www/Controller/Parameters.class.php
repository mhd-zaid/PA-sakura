<?php

namespace App\Controller;

use App\Core\View;

class Parameters{
    public function index(){
            $v = new View("Page/Parameters", "Back");
        
    }
    public function parametersSupport(){
            $v = new View("Page/ParametersSupport", "Back");
        
    }
}