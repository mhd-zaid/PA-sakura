<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User as UserModel;
use App\Core\Verificator;
use App\Core\SendMail;
use App\Core\Jwt;

class Parameters{
    public function index(){
        $v = new View("Page/Parameters", "Back");
        
    }

    public function AccountManagement()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
        header("Location: /se-connecter");
        } else {
        $v = new View("Page/AccountManagement", "Back");
        }
    }
    
    public function parametersSupport(){
        $v = new View("Page/ParametersSupport", "Back");
    }
    public function parametersLangue(){
        $v = new View("Page/ParametersLangue", "Back");
    }
    public function parametersUsers(){
        $v = new View("Page/ParametersUsers", "Back");
    }
    public function parametersAccount(){
        $v = new View("Page/ParametersAccount", "Back");
    }
    public function parametersAddUser(){
        $user = new UserModel();
		$userRegisterForm = $user->userRegisterForm();

        if( !empty($_POST) )
		{
			// $verificator = new Verificator($userRegisterForm, $_POST);

			// $configFormErrors = $verificator->getMsg();

			// if(empty($configFormErrors)){
				
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
			// }

		}

        $v = new View("Page/ParametersNewUsers", "Back");
        $v->assign("configForm", $userRegisterForm);
        $v->assign("configFormErrors", $configFormErrors??[]);
    }
}

