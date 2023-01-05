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

class Parameters
{
	public function index()
	{
		$v = new View("Page/Parameters", "Back");
	}
	public function parametersAppearance()
	{
		$v = new View("Page/ParametersThemesMode", "Back");
	}
	public function setAppearance()
	{
		//existe & = like
		if (isset($_SESSION['isDarkModeEnable']) && $_SESSION['isDarkModeEnable'] === "light" ) $_SESSION["isDarkModeEnable"] = "dark";
		//existe pas || existe & <> light 
		else $_SESSION["isDarkModeEnable"] = "light";
		$_SESSION["flash-success"] = "Affichage du site mise à jour.";
		header("Location: /parametres-affichage");
		exit();
	}
	public function parametersUsers()
	{
		$user = new UserModel();
		$role = $user->getUser($_COOKIE['JWT']);
		if ($role['Role'] !== 1 && $role['Role'] !== 0) header("Location: /tableau-de-bord");
		$v = new View("Page/ParametersUsers", "Back");
	}
	public function parametersAccount()
	{
		$site = new Site();
		$siteInfo = $site->select();
		$v = new View("Page/ParametersAccount", "Back");
		$v->assign("site", $siteInfo);
	}

	public function parametersUpdateSite()
	{
		$site = new Site();
		$siteInfo = $site->select();
		$siteUpdateForm = $site->updateSiteForm();
		if(!empty($_POST)){
			$data = [];
            isset($_FILES['logo']) ? array_push($data, $_FILES["logo"]) : '';
            isset($_POST['name']) ? array_push($data, $_POST["name"]) : '';
            isset($_POST['email']) ? array_push($data, $_POST["email"]) : '';
            isset($_POST['number']) ? array_push($data, '0'.$_POST["number"]) : '';
            isset($_POST['address']) ? array_push($data, $_POST["address"]) : '';

            $verificator = new Verificator($siteUpdateForm, $data);
			$verificator->verificatorUpdateSite($siteUpdateForm, $_POST);
			$configFormErrors = $verificator->getMsg();

            if(empty($configFormErrors)){

			if(isset($_POST['submit'])){

					$target_dir = __DIR__."/../uploads"; //défini le path de notre dossier upload
					if (!is_dir($target_dir)) { //si upload n'existe pas
						mkdir($target_dir, 0777);
					}
					if(!empty($_FILES['logo']['name'])){
						$file = $_FILES['logo']['name'];//récupère le nom du fichier
						$file_extension = strrchr($file,".");//récupère l'extension
						$extension_allow = array('.JPG','.jpg','.png','.PNG','.JPEG','.jpeg');//extension prise en charge
						if(in_array($file_extension,$extension_allow)){//si extension est prise en charge
							$temp_file = $_FILES['logo']['tmp_name'];  
							copy($temp_file, $target_dir."/".$file); //copie l'image dans upload
						}else{
							$configFormErrors[] = "Les formats acceptés sont : .jpg, .png, .jpeg";
						}
					}


				$site->setId(1);
				$site->setName($_POST['name']);
				!empty($_FILES['logo']['name']) ? $site->setLogo($_FILES['logo']['name']) : $site->setLogo($siteInfo[0]['Logo']);
				$site->setAddress($_POST["address"]);
				$site->setEmail($_POST["email"]);
				$site->setNumber($_POST['number']);
				if(empty($configFormErrors)){
				$site->save();
				$_SESSION["flash-success"] = "Information du site mise à jour.";
				header("Location: /parametres");
                exit();
				}
			}
		}
		}
        $v = new View("Page/SiteInformation", "Back");
		$v->assign("configForm", $siteUpdateForm);
		$v->assign("configFormErrors", $configFormErrors??[]);
    }

	public function parametersAccountManagement()
	{
		$profil = new UserModel();
		$profilUpdateForm = $profil->profilUpdateForm();

		if (!empty($_POST)) {
			$verificator = new Verificator($profilUpdateForm, $_POST);
			$verificator->verificatorLogin($profilUpdateForm, $_POST);
			$configFormErrors = $verificator->getMsg();
			if (empty($configFormErrors)) {

				isset($_POST['password']) && !empty($_POST['password']) ? $profil->setPassword($_POST['password'])
					: $profil->setPasswordWithoutHash($profilUpdateForm['profil']['Password']);

				$profil->setId($profilUpdateForm['profil']['Id']);
				$profil->setFirstname($_POST['firstname']);
				$profil->setLastname($_POST['lastname']);
				$profil->setEmail($_POST['email']);
				$profil->setStatus($profilUpdateForm['profil']['Status']);
				$profil->setToken($profilUpdateForm['profil']['Token']);
				$profil->save();
				$_SESSION["flash-success"] = "Vos informations ont été mises à jours avec succès.";
                header("Location: /parametres");
                exit();
			}
		}

		$v = new View("Page/ParametersAccountManagement", "Back");
		$v->assign("configForm", $profilUpdateForm);
		$v->assign("configFormErrors", $configFormErrors ?? []);
	}
	public function parametersAddUser()
	{
		$user = new UserModel();
		$userRegisterForm = $user->userRegisterForm();

		if (!empty($_POST)) {

			$verificator = new Verificator($userRegisterForm, $_POST);
			$verificator->verificatorAddUser($userRegisterForm, $_POST);
			$configFormErrors = $verificator->getMsg();

			if (empty($configFormErrors)) {
				$user->setFirstname($_POST['firstname']);
				$user->setLastname($_POST['lastname']);
				$user->setEmail($_POST['email']);
				$user->setPassword($_POST['password']);
				$token = new Jwt([$user->getFirstname(), $user->getLastname(), $user->getEmail()]);
				$user->setToken($token->getToken());
				$token = $user->getToken();
				$user->setRole(intval($_POST['userRole']));
				$user->setStatus(0);
				$user->save();
				$servername = $_SERVER['HTTP_HOST'];
				$email = $_POST['email'];
				new sendMail($_POST['email'], "VERIFICATION EMAIL", "<a href='http://$servername/confirmation-mail?verify_key=$token&email=$email'>Verification email</a>", "Inscription réussite, confirmer votre email", "Une erreur s'est produite, merci de réesayer plus tard");
			}
		}

		$v = new View("Page/ParametersNewUsers", "Back");
		$v->assign("configForm", $userRegisterForm);
		$v->assign("configFormErrors", $configFormErrors ?? []);
	}
	public function parametersEditUser()
	{	
		if ($_GET['id'] == 1) {
			$_SESSION['flash-error'] = "Vous n'avez pas le droit de editer le super administrateur";
			header('Location: /parametres-users');
			exit;
		}elseif (empty($_GET['id'])) {
			require "View/Site/404.view.php";
			exit;
		}
		$user = new UserModel();
		$role = $user->getUser($_COOKIE['JWT']);
		if ($role['Role'] !== 1 && $role['Role'] !== 0) header("Location: /tableau-de-bord");
		$userUpdateForm = $user->userUpdateForm();
		$userInformation = $user->find();

		if (!empty($_POST)) {
			$data = [];

			isset($_POST['userRole']) ? array_push($data, $_POST['userRole']) : '';

			$verificator = new Verificator($userUpdateForm, $data);
			$verificator->verificatorUpdateUserRole($userUpdateForm, $_POST);
			$configFormErrors = $verificator->getMsg();

			if (empty($configFormErrors)) {
				if (isset($_POST['update'])) {
					$user->updateUserRole($userInformation);
					$_SESSION["flash-success"] = "Utilisateur mis à jour.";
                	header("Location: /parametres-users");
                	exit();
				}
				if (isset($_POST['delete'])) {
					$user->delete();
					$_SESSION["flash-success"] = "Utilisateur supprimé.";
                	header("Location: /parametres-users");
                	exit();				
				}
			}
		}
		$v = new View("Page/ParametersEditUsers", "Back");
		$v->assign("configForm", $userUpdateForm);
		$v->assign("configFormErrors", $configFormErrors ?? []);
	}

	public function manageUrl()
	{
		$article = new Article();
		$page = new Page();
		$formRewriteUrl = $article->formManageUrl();
		if (!empty($_POST)) {
			$data = [];
			isset($_POST['choice']) ? array_push($data, $_POST['choice']) : '';

			$verificator = new Verificator($formRewriteUrl, $data);
			$verificator->verificatorRewriteUrl($formRewriteUrl, $_POST);
			$configFormErrors = $verificator->getMsg();
			if (empty($configFormErrors)) {
				if (isset($_POST['save'])) {
					$article->updateRewriteUrl($_POST['choice']);
					$page->updateRewriteUrl($_POST['choice']);
					$_SESSION["flash-success"] = "Choix sauvegardé.";
                	header("Location: /parametres");
                	exit();
				}
			}
		}
		$v = new View("Page/ParametresManageArticle", "Back");
		$v->assign("configFormErrors", $configFormErrors ?? []);
		$v->assign("configForm", $formRewriteUrl);
	}
}
