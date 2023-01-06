<?php
namespace App\Core\Notification;

use App\Core\Observer;
use App\Core\SendMail;

//Observer
 class AddNotification implements Observer{
    public function alert(string $mail, string $namePost){ 
        new sendMail($mail, "Nouveau message dans $namePost", "Nouveau message dans le fil de discussion $namePost", "", "");
    }
 }