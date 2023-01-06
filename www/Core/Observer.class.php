<?php
namespace App\Core;

//Observer

 interface Observer{
    public function alert(string $mail, string $namePost);
 }