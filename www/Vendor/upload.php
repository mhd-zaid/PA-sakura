<?php

//upload.php

if(isset($_FILES['upload']['name']))
{
 $file = $_FILES['upload']['name'];
 $file_name = $_FILES['upload']['name'];
 $file_name_array = explode(".", $file_name);
 $extension = end($file_name_array);
 $new_image_name = rand() . '.' . $extension;
//  chmod('uploads', 0777);
 $allowed_extension = array("jpg", "JPG", "gif", "GIF", "png", "PNG", "jpeg", "JPEG");
 if(in_array($extension, $allowed_extension))
 {
//   move_uploaded_file($file, "/uploads/" . $new_image_name);
  $function_number = $_GET['CKEditorFuncNum'];
  $url = 'uploads/' . $file;
  $message = '';
  echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
 }
}

?>
