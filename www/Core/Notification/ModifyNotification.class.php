<?php
namespace App\Core\Notification;

use App\Core\Observer;

//Observer
 class ModifyNotification implements Observer{
    public function alert(){
        if (isset($_GET["id"]) || isset($_GET['Slug'])) $_SESSION["flash-success"] = "L'article a été modifié avec succés";
        else $_SESSION["flash-success"] = "L'article a été crée avec succés";
        header("Location: /article");
        exit();
    }
 }