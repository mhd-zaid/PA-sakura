<?php

namespace App\Controller;

class DataTable {
   
    public function index(){
        $class = "App\Model\\".ucfirst($_GET['table']);
        $object = new $class();
        $object->serverProcessing($class);
    }
    
}