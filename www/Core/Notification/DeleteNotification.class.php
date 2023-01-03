<?php
namespace App\Core\Notification;

use App\Core\Observer;

//Observer
 class DeleteNotification implements Observer{
    public function alert(){
        $_SESSION["flash-success"] = "L'article a été supprimer avec succés";
        header("Location: /article");
        exit();
    }
 }