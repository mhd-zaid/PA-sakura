<?php

namespace App\Controller;
use App\Core\View;

class Media{
    public function index(){
        $configFormErrors = [];

        if(isset($_POST["submit"])){

        if(empty($_FILES['photo']['name'])){ //récupère le fichier
            $configFormErrors[] = "Veuillez séléctionner une image pour toute action.";
        }
        if(empty($configFormErrors)){
            $target_dir = __DIR__."/../uploads"; //défini le path de notre dossier upload
            if (!is_dir($target_dir)) { //si upload n'existe pas
                mkdir($target_dir, 0777);
            }
            $file = $_FILES['photo']['name'];//récupère le nom du fichier
            $file_extension = strrchr($file,".");//récupère l'extension
            $extension_allow = array('.JPG','.jpg','.png','.PNG','.JPEG','.jpeg');//extension prise en charge
            if(in_array($file_extension,$extension_allow)){//si extension est prise en charge
                $temp_file = $_FILES['photo']['tmp_name'];  
                copy($temp_file, $target_dir."/".$file); //copie l'image dans upload
            }else{
                $configFormErrors[] = "Les extensions autorisés sont : .jpg, .png, .jpeg";
            }
            if(empty($configFormErrors)){
                $_SESSION["flash-success"] = "Image ajouté.";
                header('Location: /media');
                exit();
            }
        }
    }
        

        if(isset($_POST["delete"])){
            if(empty($_POST["name-img"])){
                $configFormErrors[] = "Veuillez choisir une image à supprimer";
            }
            if(empty($configFormErrors)){
                $target_dir = __DIR__."/../uploads/".$_POST["name-img"];
                if(file_exists($target_dir)){
                    unlink($target_dir);
                }else{
                    $configFormErrors[] = "Ce fichier n'existe pas.";
            }
            if(empty($configFormErrors)){
            $_SESSION["flash-success"] = "Image supprimer";
            header('Location: /media');
            exit();
            }
            }
        }
        $v = new View("Page/Media","Back");
        $v->assign("configFormErrors", $configFormErrors??[]);

    }
}