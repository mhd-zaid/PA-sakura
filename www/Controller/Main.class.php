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
	}


}