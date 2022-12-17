<?php

//upload.php

  if(!empty($_FILES)){ //récupère le fichier
    $target_dir = __DIR__."/../uploads"; //défini le path de notre dossier upload
    if (!is_dir($target_dir)) { //si upload n'existe pas
        mkdir($target_dir, 0777);
    }
    $file = $_FILES['upload']['name'];//récupère le nom du fichier
    $file_extension = strrchr($file,".");//récupère l'extension
    $extension_allow = array('.JPG','.jpg','.png','.PNG','.JPEG','.jpeg');//extension prise en charge
    if(in_array($file_extension,$extension_allow)){//si extension est prise en charge
        $temp_file = $_FILES['upload']['tmp_name'];  
        print_r($temp_file);
        copy($temp_file, $target_dir."/".$file); //copie l'image dans upload
    }
    $function_number = $_GET['CKEditorFuncNum'];
    $url = '/uploads/' . $file;
    $message = '';
    echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
}else{
    print_r('pas envoyé');
}
