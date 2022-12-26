<?php
namespace App\Controller;


use App\Core\View;
use App\Core\Verificator;
use App\Model\User as UserModel;

class Main{

	public function index(): void
	{
		if (!file_exists(__DIR__."/../config.php")) {
			header("Location: /installation");
		}else{
			$user = new UserModel();
			$contactForm = $user->contactForm();
			
			$v = new View("Front/Home", "Front");
			$v->assign("configForm", $contactForm);
			$v->assign("configFormErrors", $configFormErrors??[]);		

			if( !empty($_POST) )
			{
				$verificator = new Verificator($loginForm, $_POST);

				$configFormErrors = $verificator->getMsg();

				if(empty($configFormErrors)){
					$user->setFirstname($_POST['firstname']);
					$user->setLastname($_POST['lastname']);
					$user->setEmail($_POST['email']);
					$user->setPwd($_POST['pwd']);
					$user->setAddress($_POST['address']);
					$user->save();
				}
			}
		}
		
	}

	public function install(): void
	{	
		$installForm = [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Installer"
            ],
            "inputs"=> [
                "db_host"=>[
                            "type"=>"text",
                            "label"=>"Nom du serveur de la base de données",
                            "class"=>"ipt-form-entry",
                            "required"=>true,
                            "error"=>"Nom du serveur inccorect."
                            ],
                "db_user"=>[
                                "type"=>"text",
                                "label"=>"Utilisateur de la base de données",
                                "class"=>"ipt-form-entry",
                                "required"=>true,
                                "error"=>"Utilisateur inccorect."
                            ],
              
                "db_passwd"=>[
                                "type"=>"password",
                                "label"=>"Mot de passe de la base de données",
                                "class"=>"ipt-form-entry",
                                "required"=>true,
                                "error"=>"Mot de passse incorrect."
                            ],
                "db_name"=>[
                                "type"=>"text",
                                "label"=>"Nom de la base de données",
                                "class"=>"ipt-form-entry",
                                "class"=>"ipt-form-entry",
                                "required"=>true,
                                "error"=>""
                            ],
            ]
        ];
		$v = new View("Install/Installation", "Front");
		$v->assign("configForm", $installForm);
		$v->assign("configFormErrors", $configFormErrors??[]);

		if(!empty($_POST) )
		{
			$verificator = new Verificator($installForm, $_POST);

			$configFormErrors = $verificator->getMsg();
			try{
				new \PDO("mysql:host=".$_POST['db_host'].";dbname=".$_POST['db_name'].";port=3306" ,$_POST['db_user'] ,$_POST['db_passwd']);
				
			}catch(\Exception $e){
				$_SESSION["flash-error"] = "Impossible d'établir une connexion avec la base de données";
			}
			if(empty($configFormErrors)){
				$configData = file_get_contents(__DIR__."/../config-sample.php");
				$configData = str_replace(['db_host','db_name','db_user','db_passwd'],[$_POST['db_host'],$_POST['db_name'],$_POST['db_user'],$_POST['db_passwd']],$configData);
				\file_put_contents(__DIR__."/../config.php",$configData);
				include_once __DIR__."/../config.php";
				$pdo = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=3306" ,DB_USER ,DB_PASSWD);
				$sql = \file_get_contents(__DIR__."/../dump_with_data.sql");
				$queryPrepared = $pdo->prepare($sql);
				$queryPrepared->execute();
				header("Location: /s-inscrire");
			}
		}
	}
}