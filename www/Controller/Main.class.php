<?php
namespace App\Controller;


use App\Core\View;
use App\Model\User as UserModel;

class Main{

	public function index(): void
	{
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

	public function register(): void
	{
		// $user = new UserModel();
		// $registerForm = $user->registerForm();
		

		// if( !empty($_POST) )
		// {
		// 	$verificator = new Verificator($registerForm, $_POST);

		// 	$configFormErrors = $verificator->getMsg();

		// 	if(empty($configFormErrors)){
		// 		$user->setFirstname($_POST['firstname']);
		// 		$user->setLastname($_POST['lastname']);
		// 		$user->setEmail($_POST['email']);
		// 		$user->setPwd($_POST['pwd']);
		// 		$user->setAddress($_POST['address']);
		// 		$user->save();
		// 	}

		// }
		// $v = new View("Auth/Register", "Front");
		// $v->assign("configForm", $registerForm);
		// $v->assign("configFormErrors", $configFormErrors??[]);
	}

	public function admin(): void
	{
		$v = new View("Back/Home", "Back");
	}
}