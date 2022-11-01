<?php

namespace App\Controller;
use App\Core\View;

class Media{
    public function index(){
        if(!empty($_FILES)){ //récupère le fichier
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
            }
        }
        $v = new View("Page/Media","Back");
        if(isset($_POST["delete"])){
            $target_dir = __DIR__."/../uploads/".$_POST["name-img"];
            unlink($target_dir);
        }

    }
}