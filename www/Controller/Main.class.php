<?php
namespace App\Controller;


use App\Core\View;
use App\Model\User as UserModel;
use App\Core\Verificator;
use App\Vendor\PHPMailer\PHPMailer;
use App\Vendor\PHPMailer\SMTP;
use App\Vendor\PHPMailer\Exception;


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
				$user->setVerifyKey($_POST['firstname']);
				$user->save();
				$this->sendMailVerification($user,$user->getVerifyKey());
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
					$this->sendMail($_POST['email']);
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
					if($user->checkToken($_COOKIE['Email'],$_COOKIE['JWT'],$_POST['password'])){
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

	public function sendMail($userMail){
		$mail = new PHPMailer();
		try {
			$mail->SMTPDebug = 2;                      
			$mail->isSMTP();                                            
			$mail->Host       = 'smtp.outlook.com';                    
			$mail->SMTPAuth   = true;                                   
			$mail->Username   = 'pa.sakura@outlook.fr';                     
			$mail->Password   = 'sakura12345@';
			$mail->SMTPSecure = 'STARTTLS';                                       
			$mail->Port       = 587;              
		
			$mail->From = "pa.sakura@outlook.fr";
			$mail->FromName = "sakura";
			$mail->addAddress($userMail);  

			$mail->isHTML(true);                   
			$mail->Subject = 'Here is the subject';
			$mail->Body    = file_get_contents("View/Mail/forgotPasswd.view.php");
			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $th) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function sendMailVerification($user, $verify_key){
		$mail = new PHPMailer();
		try {
			$mail->SMTPDebug = 2;                      
			$mail->isSMTP();                                            
			$mail->Host       = 'smtp.outlook.com';                    
			$mail->SMTPAuth   = true;                                   
			$mail->Username   = 'pa.sakura@outlook.fr';                     
			$mail->Password   = 'sakura12345@';
			$mail->SMTPSecure = 'STARTTLS';                                       
			$mail->Port       = 587;              
		
			$mail->From = "pa.sakura@outlook.fr";
			$mail->FromName = "sakura";
			$mail->addAddress($user->getEmail());  

			$mail->isHTML(true);                   
			$mail->Subject = 'Here is the subject';
			$mail->Body    = "<a href='http://localhost/confirm-mail?verify_key=$verify_key'>Verify email</a>";
			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $th) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}

	public function confirmMail(){
		$user = new UserModel();
		$user->checkVerifyKey($_GET['verify_key']);
		echo 'Email vérifié';
	}
}