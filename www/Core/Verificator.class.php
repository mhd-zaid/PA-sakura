<?php

namespace App\Core;
use App\Model\User;
use App\Model\Article;
use App\Model\Category;
use App\Model\Page;

class Verificator
{
	private $msg = [];

	public function __construct($configForm, $data)
	{
		// print_r($data);
		// echo '<br />';
		// print_r($configForm['inputs']);
		// die();
		//Vérifier que l'on a autant de post ou get  que de inputs dans la config (Faille XSS)
		if( count($data) != count($configForm["inputs"])){
			$this->msg[]="Tentative de Hack";
		}


	}
	public function verificatorEditionArticle($configForm, $data):void{
		foreach($configForm["inputs"] as $name=>$configInput){

			if(!empty($configInput["required"]) && empty($data[$name])){
				$this->msg[]="Le champs ".$name." est obligatoire";
			}

			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMinLength($data[$name], $configInput["min"])){
				$this->msg[]=$configInput["error"];
			}

			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMaxLength($data[$name], $configInput["max"])){
				$this->msg[]=$configInput["error"];
			}
		}

		if(empty($this->msg) && !empty($data["titre"]) && !self::checkIfExists("Title", $data["titre"], "Article")){
			$this->msg[]="Un article portant ce titre existe déjà";
		}

		if(empty($this->msg) && !empty($data["slug"]) && !self::checkIfExists("slug", $data["slug"], "Article")){
			$this->msg[]="Un article avec ce slug existe déjà";
		}

		if(empty($this->msg) && !empty($data["titre"]) && is_numeric($data["titre"])){
			$this->msg[]="Votre titre ne peut contenir que des chiffres";
		}
		if(empty($this->msg) && empty($data["editor"])){
			$this->msg[]="Veuillez ajouter du contenu";
		}
		if(empty($this->msg) && !empty($data["list"] && !self::isCategoryExist($data['list']))){
			$this->msg[]="Ajouter des catégories qui existent.";
		}

	}

	public function verificatorEditionPage($configForm, $data):void{
		foreach($configForm["inputs"] as $name=>$configInput){

			if(!empty($configInput["required"]) && empty($data[$name])){
				$this->msg[]="Le champs ".$name." est obligatoire";
			}

			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMinLength($data[$name], $configInput["min"])){
				$this->msg[]=$configInput["error"];
			}

			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMaxLength($data[$name], $configInput["max"])){
				$this->msg[]=$configInput["error"];
			}
		}

		if(empty($this->msg) && !empty($data["titre"]) && !self::checkIfExists("Title", $data["titre"], "Page")){
			$this->msg[]="Un article portant ce titre existe déjà";
		}

		if(empty($this->msg) && !empty($data["slug"]) && !self::checkIfExists("slug", $data["slug"], "Page")){
			$this->msg[]="Un article avec ce slug existe déjà";
		}

		if(empty($this->msg) && !empty($data["titre"]) && is_numeric($data["titre"])){
			$this->msg[]="Votre titre ne peut contenir que des chiffres";
		}
		if(empty($this->msg) && empty($data["editor"])){
			$this->msg[]="Veuillez ajouter du contenu";
		}

	}

	public function verificatorEditionCategory($configForm, $data):void{
		foreach($configForm["inputs"] as $name=>$configInput){

			if(!empty($configInput["required"]) && empty($data[$name])){
				$this->msg[]="Le champs ".$name." est obligatoire";
			}

			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMinLength($data[$name], $configInput["min"])){
				$this->msg[]=$configInput["error"];
			}

			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMaxLength($data[$name], $configInput["max"])){
				$this->msg[]=$configInput["error"];
			}
		}

		if(empty($this->msg) && !empty($data["titre"]) && !self::checkIfExists("Title", $data["titre"], "Category")){
			$this->msg[]="Une catégorie portant ce titre existe déjà";
		}

	}

	public function verificatorLogin($configForm, $data):void{
		foreach($configForm["inputs"] as $name=>$configInput){
			if(empty($this->msg) && !empty($configInput["required"]) && empty($data[$name])){
				$this->msg[]="Le champs ".$name." est obligatoire";
			}
			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMinLength($data[$name], $configInput["min"])){
				$this->msg[]=$configInput["error"];
			}
			if(empty($this->msg) && !empty($configInput["min"]) && !self::checkMaxLength($data[$name], $configInput["max"])){
				$this->msg[]=$configInput["error"];
			}
			if(empty($this->msg) && $configInput["type"]=="email" && !empty($configInput["required"]) && !self::checkEmail($data[$name])){
				$this->msg[]=$configInput["error"];		
			}
			if(empty($this->msg) && !empty($configInput["confirm"]) && !self::checkConfirm($data[$name], $data[$configInput["confirm"]]) ){
				$this->msg[]=$configInput["error"];		
			}
			else if(empty($this->msg) && $configInput["type"]=="password" && !empty($configInput["required"]) && !self::checkPassword($data[$name])){
				$this->msg[]=$configInput["error"];		
			}
		}
		if(empty($this->msg) && !empty($data["email"]) && !self::checkIfExists("Email", $data["email"], "User")){
			$this->msg[]="Cette email est déjà associé à un compte.";
		}
	}

	public function getMsg(): array
	{
		return $this->msg;
	}


	public static function checkMinLength(String $string, Int $min): bool
	{
		return strlen($string)>=$min;
	}

	public static function checkLogin(string $pwd, string $type):bool{
		$user = new User();
		return $user->isGoodPassword($pwd,$type);
	}

	public static function checkMaxLength(String $string, Int $max): bool
	{
		return strlen($string)<=$max;
	}

	public static function checkEmail(String $email): bool
	{
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}


	public static function checkPassword(String $pwd): bool
	{
		return strlen($pwd)>=8 && preg_match("/[a-z]/", $pwd)  && preg_match("/[A-Z]/", $pwd)  && preg_match("/[0-9]/", $pwd);
	}

	public static function checkConfirm(String $string, String $stringOrigin): bool
	{
		return $string == $stringOrigin;
	}

	public static function checkIfExists(string $context, string $data, $object):bool{
		if($object === "Article"){
		  $unique = new Article();
		}
		if($object === "Page"){
			$unique = new Page();
		  }
		if($object === "Category"){
			$unique = new Category();
		}
		if($object === "User"){
			$unique = new User();
		}
		return $unique->isUnique($context, $data);
	}

	public static function isCategoryExist($list):bool{
		$categoryList = explode(',', $list);
		foreach($categoryList as $value){
			$category = new Category();
			$categoryExist = $category->isExist($value);
			if(!$categoryExist){
				return false;
			}
		}
		return true;
	}
}