<?php
namespace App\Core\Notification;

use App\Core\Observer;
use App\Core\SendMail;
use App\Model\User;


//Observer
 class ModifyNotification implements Observer{
    public function alert(String $object, String $message){
        $admin = new User();
        $admin = $admin->getSuperAdmin()['Email'];
        new sendMail($admin, $object, $message, "Inscription réussite, confirmer votre email", "Une erreur s'est produite, merci de réesayer plus tard");
    }
 }