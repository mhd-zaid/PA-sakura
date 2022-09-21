<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User as UserModel;
use App\Core\Verificator;
use App\Core\SendMail;
use App\Core\Jwt;


class User{

	public function login(): void
	{
		$user = new UserModel();
		$loginForm = $user->loginForm();

		if( !empty($_POST) )
		{
			$verificator = new Verificator($loginForm, $_POST);

			$configFormErrors = $verificator->getMsg();

			if(empty($configFormErrors)){
				$user->checkLogin($_POST['email'],$_POST['password']);
			}else{
				echo 'Email ou mot de passe incorrect';
			}

		}
		
		$v = new View("Auth/Login", "Front");
		$v->assign("configForm", $loginForm);
		$v->assign("configFormErrors", $configFormErrors??[]);
	}

	public function register(): void
	{
		$user = new UserModel();
		$registerForm = $user->registerForm();
		

		if( !empty($_POST) )
		{
			$verificator = new Verificator($registerForm, $_POST);

			$configFormErrors = $verificator->getMsg();

			if(empty($configFormErrors)){
				
				$emailExist = $user->checkEmailExist($_POST['email']);
				if($emailExist){
					$user->setFirstname($_POST['firstname']);
					$user->setLastname($_POST['lastname']);
					$user->setEmail($_POST['email']);
					$user->setPassword($_POST['password']);
					$token = new Jwt([$user->getFirstname(),$user->getLastname(),$user->getEmail()]);
					$user->setToken($token->getToken());
					$user->save();
					setcookie("JWT",$user->getToken(),time()+(60*5));
					$servername = $_SERVER['HTTP_HOST'];
					$token = $_COOKIE["JWT"];
					new sendMail($_POST['email'],"VERIFICATION EMAIL","<a href='http://$servername/confirmation-mail?verify_key=$token'>Verification email</a>","Inscription réussite, confirmer votre email","Une erreur s'est produite, merci de réesayer plus tard");
				}	
			}

		}
		$v = new View("Auth/Register", "Front");
		$v->assign("configForm", $registerForm);
		$v->assign("configFormErrors", $configFormErrors??[]);
	}

	public function logout(): void
	{
		session_start();
		session_destroy();
		header("Location: /");
		die();
	}

	public function forgotPasswd(): void
	{
		$user = new UserModel();
		$forgotPasswdForm = $user->forgotPasswdForm();
		if( !empty($_POST) )
		{
			$verificator = new Verificator($forgotPasswdForm, $_POST);

			$configFormErrors = $verificator->getMsg();

			if(empty($configFormErrors)){
				if($user->checkForgotPasswd($_POST['email'])){
					$servername = $_SERVER['HTTP_HOST'];
					new sendMail($_POST['email'],"CHANGEMENT DE MDP","<a href='http://$servername/reinitialisation-mot-de-passe'>Nouveau mot de passe</a>","Un email à été envoyer pour la réinitialisation du mot de passe","Une erreur s'est produite, merci de réesayer plus tard");
				}else{
					print_r("l'email n'existe pas");
				}
			}

		}
		$v = new View("Auth/ForgotPasswd", "Front");
		$v->assign("configForm", $forgotPasswdForm);
		$v->assign("configFormErrors", $configFormErrors??[]);
	}

	public function resetPasswd(){
		if(!empty($_COOKIE['JWT'])&& !empty($_COOKIE['Email'])){
			$user = new UserModel();
			$resetPasswdForm = $user->resetPasswdForm();

			if( !empty($_POST) )
			{
				$verificator = new Verificator($resetPasswdForm, $_POST);

				$configFormErrors = $verificator->getMsg();
				if(empty($configFormErrors)){
					if($user->checkTokenPasswd($_COOKIE['Email'],$_COOKIE['JWT'],$_POST['password'])){
						header("Location: /se-connecter");
						die();
					}else{
						header("Location: /mot-de-passe-oublie");
						die();
					}
				}
			}
				$v = new View("Auth/ResetPasswd", "Front");
				$v->assign("configForm", $resetPasswdForm);
				$v->assign("configFormErrors", $configFormErrors??[]);
		}else{
			header("Location: /mot-de-passe-oublie");
			die();
		}
		
	}

	public function confirmMail(){
		$user = new UserModel();
		$user->checkTokenEmail($_COOKIE['JWT']);
		echo 'Email vérifié';
	}


	public function edit(): void
	{
		session_start();
		if(!isset($_SESSION['email'])){
			header("Location: /se-connecter");
		}else{
			echo "Afficher edit user";
		}
	}




	public function list(): void
	{
		session_start();
		if(!isset($_SESSION['email'])){
			header("Location: /se-connecter");
		}else{
			$v = new View("User/List", "Back");
		}
	}

}




