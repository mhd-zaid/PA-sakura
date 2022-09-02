<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class User extends DatabaseDriver
{
	private $id = null;
	protected $firstname;
	protected $lastname;
	protected $email;
    protected $password;
	protected $status = 0;
	private $date_created;
	private $date_updated;


	public function __construct()
	{
		parent::__construct();
	}


    /**
     * @return null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    //abstract public function setId($id);
    public function setId(Int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname(String $firstname): void
    {
        $this->firstname = ucwords(mb_strtolower(trim($firstname)));
    }

     /**
     * @return mixed
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param mixed $lastname
     */
    public function setLastname(String $lastname): void
    {
        $this->lastname = mb_strtoupper(trim($lastname));
    }

    /**
     * @return mixed
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail(String $email): void
    {
        $this->email = mb_strtolower(trim($email));
    }

    /**
     * @return mixed
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword(String $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);

    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @return mixed
     */
    public function getDateUpdated()
    {
        return $this->date_updated;
    }



    public function registerForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"S'inscrire"
                            ],
                "inputs"=> [
                    "firstname"=>[
                                    "type"=>"text",
                                    "label"=>"Prénom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>25,
                                    "required"=>true,
                                    "error"=>"Votre prénom doit faire entre 2 et 25 caractères"
                                ],

                    "lastname"=>[
                                    "type"=>"text",
                                    "label"=>"Nom",
                                    "class"=>"ipt-form-entry",
                                    "min"=>2,
                                    "max"=>75,
                                    "required"=>true,
                                    "error"=>"Votre nom doit faire entre 2 et 75 caractères"
                                ],
                    "email"=>[
                                    "type"=>"email",
                                    "label"=>"Email",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email est incorrect"
                                ],
                    "password"=>[
                                    "type"=>"password",
                                    "label"=>"Votre mot de passe",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                                ],
                    "passwordconfirm"=>[
                                    "type"=>"password",
                                    "label"=>"Confirmation",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "confirm"=>"password",
                                    "error"=>"Votre mot de passe de confirmation ne correspond pas"
                                ],

                ]
            ];

    }

    public function loginForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Se connecter"
                            ],
                "inputs"=> [
                    "email"=>[
                                    "type"=>"email",
                                    "label"=>"Adresse e-mail",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email ou mot de passe est incorrect"
                                ],
                    "password"=>[
                                    "type"=>"password",
                                    "label"=>"Mot de passe",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email ou mot de passe est incorrect"
                                ],
                ]
            ];

    }

    public function contactForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Envoyer"
                            ],
                "inputs"=> [
                    "name"=>[
                                    "type"=>"text",
                                    "label"=>"Votre nom (obligatoire)",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre email ou mot de passe est incorrect"
                                ],
                    "email"=>[
                                    "type"=>"email",
                                    "label"=>"Votre e-mail (obligatoire)",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                ],
                    "message"=>[
                                    "type"=>"textarea",
                                    "label"=>"Message",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                ],
                ]
            ];

    }

    public function checkLogin(String $email, String $pwd): void
    {
        $sql = "SELECT * FROM $this->table WHERE email = '$email' AND password = '$pwd'";
        $queryPrepared = $this->pdo->query($sql);
        print_r($queryPrepared->fetchAll());
    }

}