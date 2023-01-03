<?php
namespace App\Core;

//Observer

 interface Observer{
    public function alert(string $object, string $message);
 }