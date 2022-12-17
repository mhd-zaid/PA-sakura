<?php

namespace App;
use App\Vendor\PHPMailer\PHPMailer;

spl_autoload_register(function ( $class ){

	$filename = str_replace("App\\", "", $class);
	$filename = str_replace("\\", "/", $filename);
	$filename =  $filename.".class.php";

	if(file_exists($filename)){
		include $filename;
	}



});

$request = $_SERVER['REQUEST_URI'];
$requestExploded = explode("/", $request);
$uriExploded =(count($requestExploded)-1);
if($uriExploded == 2){
	$split = preg_split("@(\/[0-9]+)|(/$requestExploded[$uriExploded])|(\?)$@", $request);
}else{
	$split = preg_split("@(\/[0-9]+)|(\?)@", $request);
}
session_start();
$uri = strtolower($split[0]);
$routing = new Core\Routing();
$routing->setAction($uri);
$routing->run();





