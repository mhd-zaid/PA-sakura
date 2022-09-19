<?php
namespace App\Controller;


use App\Core\View;
use App\Model\User as UserModel;
use App\Core\Verificator;
use App\Core\SendMail;


class Main{

	public function index(): void
	{
		$user = new UserModel();
		$contactForm = $user->contactForm();
		
		$v = new View("Front/Home", "Front");
		$v->assign("configForm", $contactForm);
		$v->assign("configFormErrors", $configFormErrors??[]);		
	}

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


				$user->setFirstname($_POST['firstname']);
				$user->setLastname($_POST['lastname']);
				$user->setEmail($_POST['email']);
				$user->setPassword($_POST['password']);
				$token = $this->getJWT([$user->getFirstname(),$user->getLastname(),$user->getEmail()]);
				$user->setToken($token);
				$user->save();
				setcookie("JWT",$user->getToken(),time()+(60*5));
				$servername = $_SERVER['HTTP_HOST'];
				$token = $_COOKIE["JWT"];
				new sendMail($_POST['email'],"VERIFICATION EMAIL","<a href='http://$servername/confirm-mail?verify_key=$token'>Verify email</a>");
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
					new sendMail($_POST['email'],"CHANGEMENT DE MDP",file_get_contents("View/Mail/forgotPasswd.view.php"));
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
						header("Location: /forgot-passwd");
						die();
					}
				}
			}
				$v = new View("Auth/ResetPasswd", "Front");
				$v->assign("configForm", $resetPasswdForm);
				$v->assign("configFormErrors", $configFormErrors??[]);
		}else{
			header("Location: /forgot-passwd");
			die();
		}
		
	}

	public function confirmMail(){
		$user = new UserModel();
		$user->checkTokenEmail($_COOKIE['JWT']);
		echo 'Email vérifié';
	}

	public function getJWT(array $data){
		$header = base64_encode(json_encode(array("alg"=>"HS256","typ"=>"JWT")));
		$playload = base64_encode(json_encode($data));
		$secret = base64_encode('Za1234');
		$signature = hash_hmac('sha256',$header.".".$playload,$secret);

		return $header.".".$playload.".".$signature;
	}
}