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
				$user->save();
				sendMail($user->getEmail());
			}

		}
		$v = new View("Auth/Register", "Front");
		$v->assign("configForm", $registerForm);
		$v->assign("configFormErrors", $configFormErrors??[]);
	}

	public function logout(){
		session_start();
		session_destroy();
		header("Location: /");
		die();
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
			$mail->Body    = new View("Mail/confirm", "Front");
			$mail->send();
			echo 'Message has been sent';
		} catch (Exception $th) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
}