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
			$verificator->verificatorConnexion($loginForm, $_POST);
			$configFormErrors = $verificator->getMsg();
			if(empty($configFormErrors)){
				$verification = $user->checkLogin($_POST['email'],$_POST['password']);
				if(!$verification){
					$configFormErrors[] = 'Email ou mot de passe incorrect';
				}
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
			$verificator->verificatorAddUser($registerForm, $_POST);
			$configFormErrors = $verificator->getMsg();
			if(empty($configFormErrors)){
				$verification = $user->checkEmailExist($_POST['email']); 
				if($verification){
					$user->setFirstname($_POST['firstname']);
					$user->setLastname($_POST['lastname']);
					$user->setEmail($_POST['email']);
					$user->setPassword($_POST['password']);
					$token = new Jwt([$user->getFirstname(),$user->getLastname(),$user->getEmail()]);
					$user->setToken($token->getToken());
					$token = $user->getToken();
					$user->save();
					$servername = $_SERVER['HTTP_HOST'];
					$email = $_POST['email'];
					new sendMail($_POST['email'],"VERIFICATION EMAIL","<a href='http://$servername/confirmation-mail?verify_key=$token&email=$email'>Verification email</a>","Inscription réussite, confirmer votre email","Une erreur s'est produite, merci de réesayer plus tard");
				}else{
					$configFormErrors[] = "Cette email est déjà associé à un autre compte.";
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
			$data = [];
			isset($_POST['email']) ? array_push($data, $_POST['email']) : '';
			$verificator = new Verificator($forgotPasswdForm, $data);
			$verificator->verificatorForgotPassword($forgotPasswdForm, $_POST);
			$configFormErrors = $verificator->getMsg();
			
			if(empty($configFormErrors)){
				$verification = $user->checkForgotPasswd($_POST['email']);
				if(!$verification){
					$configFormErrors[] = "Cette email n'est associé à aucun compte.";
				}else{
					$servername = $_SERVER['HTTP_HOST'];
					$email = $_POST['email'];
					$token = $user->checkForgotPasswd($_POST['email']);
					new sendMail($_POST['email'],"CHANGEMENT DE MDP","<a href='http://$servername/reinitialisation-mot-de-passe?token=$token&email=$email'>Nouveau mot de passe</a>","Un email à été envoyer pour la réinitialisation du mot de passe","Une erreur s'est produite, merci de réesayer plus tard");
					// $_SESSION["flash-success"] = "Un email vous à été envoyer pour la réinitialisation de votre mot de passe";
                	// header("Location: /se-connecter");
               	 	// exit();				
				}
			}
		}
		$v = new View("Auth/ForgotPasswd", "Front");
		$v->assign("configForm", $forgotPasswdForm);
		$v->assign("configFormErrors", $configFormErrors??[]);
	}

	public function resetPasswd(){
		if(!empty($_GET['token']) && !empty($_GET['email'])){
			$user = new UserModel();
			$resetPasswdForm = $user->resetPasswdForm();

			if( !empty($_POST) )
			{
				$verificator = new Verificator($resetPasswdForm, $_POST);
				$verificator->verificatorResetPassword($resetPasswdForm, $_POST);
				$configFormErrors = $verificator->getMsg();
				if(empty($configFormErrors)){
					$verification = $user->checkTokenPasswd($_GET['email'],$_GET['token'],$_POST['password']);
					if(!$verification){
						$configFormErrors[] = "Une erreur s'est produite. ";
					}else{
						header("Location: /se-connecter");
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
		$user->checkTokenEmail($_GET['verify_key'],$_GET['email']);
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




