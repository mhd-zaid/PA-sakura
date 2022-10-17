<?php

namespace App\Controller;

class DataTable {
   
    public function index(){
        $class = "App\Model\\".ucfirst($_GET['table']);
        $object = new $class();
        print_r($object->serverProcessing($class));
    }
    
}