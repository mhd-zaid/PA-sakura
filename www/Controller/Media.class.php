<?php

namespace App\Controller;
use App\Core\View;

class Media{
    public function index(){
        echo "";
        if(!empty($_FILES)){
            $target_dir = __DIR__."/../uploads";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777);
            }
            $file = $_FILES['photo']['name'];
            $file_extension = strrchr($file,".");
            $extension_allow = array('.JPG','.jpg','.png','.PNG','.JPEG','.jpeg');
            if(in_array($file_extension,$extension_allow)){
                $temp_file = $_FILES['photo']['tmp_name'];  
                copy($temp_file, $target_dir."/".$file);
            }
        }else{
            print_r('pas envoyé');
        }
        $v = new View("Page/Media","Back");

    }
}