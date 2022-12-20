<?php

namespace App\Core;
use App\Model\User;
use App\Model\Article;
use App\Model\Page;

class Verificator
{
	private $msg = [];

	public function __construct($configForm, $data)
	{
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

	public function verificatorLogin($configForm, $data):void{
		foreach($configForm["inputs"] as $name=>$configInput){
			if(!empty($configInput["required"]) && empty($data[$name])){
				$this->msg[]="Le champs ".$name." est obligatoire";
			}
			if(!empty($configInput["min"]) && !self::checkMinLength($data[$name], $configInput["min"])){
				$this->msg[]=$configInput["error"];
			}
			if(!empty($configInput["min"]) && !self::checkMaxLength($data[$name], $configInput["max"])){
				$this->msg[]=$configInput["error"];
			}
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
		return $unique->isUnique($context, $data);
	}
}