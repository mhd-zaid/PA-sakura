<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User as UserModel;
use App\Core\Verificator;
use App\Model\Article;
use App\Model\Page;
use App\Core\SendMail;
use App\Core\Jwt;
use App\Model\Site;

class Parameters{
    public function index(){
        $v = new View("Page/Parameters", "Back");
        
    }
    public function parametersSupport(){
        $v = new View("Page/ParametersSupport", "Back");
    }
    public function parametersLangue(){
        $v = new View("Page/ParametersLangue", "Back");
    }
    public function parametersUsers(){
		$user = new UserModel();
		$role = $user->getUser($_COOKIE['JWT']);
		if($role['Role'] !== 1) header("Location: /tableau-de-bord");
        $v = new View("Page/ParametersUsers", "Back");
    }
    public function parametersAccount(){
		$site = new Site();
		$siteInfo = $site->select();
        $v = new View("Page/ParametersAccount", "Back");
		$v->assign("site", $siteInfo);
    }

	public function parametersUpdateSite(){
		$site = new Site();
		$siteUpdateForm = $site->updateSiteForm();
		if(!empty($_POST)){
			if(isset($_POST['submit'])){
				$site->setId(1);
				$site->setName($_POST['name']);
				$site->setLogo("manga.jpg");
				$site->setAddress($_POST["address"]);
				$site->setEmail($_POST["email"]);
				$site->setNumber($_POST['number']);
				$site->save();
				$_SESSION["flash-success"] = "Information du site mise à jour.";
				header("Location: /parametres");
                exit();
			}
		}
        $v = new View("Page/SiteInformation", "Back");
		$v->assign("configForm", $siteUpdateForm);
    }

    public function parametersAccountManagement(){
		$profil = new UserModel();
		$profilUpdateForm = $profil->profilUpdateForm();
       
		if( !empty($_POST) )
		{				
			$verificator = new Verificator($profilUpdateForm, $_POST);
			$verificator->verificatorLogin($profilUpdateForm, $_POST);
			$configFormErrors = $verificator->getMsg();
			if(empty($configFormErrors)){
				
				isset($_POST['password']) && !empty($_POST['password']) ? $profil->setPassword($_POST['password'])
				: $profil->setPasswordWithoutHash($profilUpdateForm['profil']['Password']);

				$profil->setId($profilUpdateForm['profil']['Id']);
                $profil->setFirstname($_POST['firstname']);
                $profil->setLastname($_POST['lastname']);
                $profil->setEmail($_POST['email']);
                $profil->setStatus($profilUpdateForm['profil']['Status']);
                $profil->setToken($profilUpdateForm['profil']['Token']);
				$profil->save();
				header("Location: /tableau-de-bord");
			}
		}

		$v = new View("Page/ParametersAccountManagement", "Back");
        $v->assign("configForm", $profilUpdateForm);
        $v->assign("configFormErrors", $configFormErrors??[]);
    }
    public function parametersAddUser(){
        $user = new UserModel();
		$userRegisterForm = $user->userRegisterForm();

        if( !empty($_POST) )
		{		
			
			$verificator = new Verificator($userRegisterForm, $_POST);
			$verificator->verificatorAddUser($userRegisterForm, $_POST);
			$configFormErrors = $verificator->getMsg();
			
			if(empty($configFormErrors)){
					$user->setFirstname($_POST['firstname']);
					$user->setLastname($_POST['lastname']);
					$user->setEmail($_POST['email']);
					$user->setPassword($_POST['password']);
					$token = new Jwt([$user->getFirstname(),$user->getLastname(),$user->getEmail()]);
					$user->setToken($token->getToken());
					$token = $user->getToken();
                    $user->setRole(intval($_POST['userRole']));
					$user->setStatus(0);
					$user->save();
					$servername = $_SERVER['HTTP_HOST'];
					$email = $_POST['email'];
					new sendMail($_POST['email'],"VERIFICATION EMAIL","<a href='http://$servername/confirmation-mail?verify_key=$token&email=$email'>Verification email</a>","Inscription réussite, confirmer votre email","Une erreur s'est produite, merci de réesayer plus tard");
		}
	}

        $v = new View("Page/ParametersNewUsers", "Back");
        $v->assign("configForm", $userRegisterForm);
        $v->assign("configFormErrors", $configFormErrors??[]);
    }
    public function parametersEditUser(){
		$user = new UserModel();
		$role = $user->getUser($_COOKIE['JWT']);
		if($role['Role'] !== 1) header("Location: /tableau-de-bord");
		$userUpdateForm = $user->userUpdateForm();
        $userInformation = $user->find();
		
        if( !empty($_POST) )
		{
			$data = [];
	
			isset($_POST['userRole']) ? array_push($data, $_POST['userRole']) : '';

			$verificator = new Verificator($userUpdateForm, $data);
			$verificator->verificatorUpdateUserRole($userUpdateForm, $_POST);
			$configFormErrors = $verificator->getMsg();

			if(empty($configFormErrors)){
				if(isset($_POST['update'])){
					$user->updateUserRole($userInformation);
				}
				if(isset($_POST['delete'])){
					$user->delete();
					header('Location: /parametres-users');
				}
			}
		}
        $v = new View("Page/ParametersEditUsers", "Back");
        $v->assign("configForm", $userUpdateForm);
        $v->assign("configFormErrors", $configFormErrors??[]);
    }

	public function manageUrl(){
        $article = new Article();
		$page = new Page();
		$formRewriteUrl = $article->formManageUrl();
		if(!empty($_POST)){
			$data = [];
			isset($_POST['choice']) ? array_push($data, $_POST['choice']) : '';

			$verificator = new Verificator($formRewriteUrl, $data);
			$verificator->verificatorRewriteUrl($formRewriteUrl, $_POST);
			$configFormErrors = $verificator->getMsg();
			if(empty($configFormErrors)){
				if(isset($_POST['save'])){
					$article->updateRewriteUrl($_POST['choice']);
					$page->updateRewriteUrl($_POST['choice']);
					header('Location: /parametres ');
				}
			}
		}
        $v = new View("Page/ParametresManageArticle", "Back");
        $v->assign("configFormErrors", $configFormErrors??[]);
		$v->assign("configForm", $formRewriteUrl);
    }
}

