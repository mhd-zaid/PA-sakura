<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class Site extends DatabaseDriver
{
	private $id = null;
	protected $logo;
    protected $name;
    protected $email;
    protected $number;
    protected $address;
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
     * @return null
     */
    public function getName(): ?String
    {
        return $this->name;
    }

    /**
     * @param null $id
     */

    //abstract public function setId($id);
    public function setName(String $name): void
    {
        $this->name = strip_tags($name);
    }

    /**
     * @return mixed
     */
    public function getLogo(): ?string
    {
        return $this->logo;
    }

    /**
     * @param mixed $firstname
     */
    public function setLogo (String $logo): void
    {
        $this->logo = $logo;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param mixed $user_id
     */
    public function setEmail(String $email): void
    {   
        $this->email = $email;
    }

    public function getNumber(): ?Int
    {
        return $this->number;
    }

     /**
     * @param mixed $title
     */
    public function setNumber(string $number): void
    {
        $this->number = $number;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    /**
     * @param mixed $user_id
     */
    public function setAddress(string $address): void
    {
        $this->address = strip_tags($address);
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


    public function updateSiteForm(){
        return [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Ajouter"
                        ],

           "site"=>$this->select(),
           "textarea"=>[
                "class"=>"ckeditor",
                "id"=>"editor",
                "name"=>"editor"
           ],
            "inputs"=> [
                "logo"=>[
                                "type"=>"file",
                                "label"=>"Logo de votre site",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Type de logo non accepté."
                            ],
                "name"=>[
                                "type"=>"text",
                                "label"=>"Nom de votre site",
                                "class"=>"ipt-form-entry",
                                "required"=>true,
                                "error"=>"Nom de site inccorect."
                            ],
              
                "email"=>[
                                "type"=>"email",
                                "label"=>"Email",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Votre email est incorrect."
                            ],
                "number"=>[
                                "type"=>"number",
                                "label"=>"Numéro de téléphone",
                                "class"=>"ipt-form-entry",
                                "min"=>10,
                                "required"=>false,
                                "error"=>"Le numéro de téléphone doit contenir 10 chiffres et commencer par 0."
                            ],
                "address"=>[
                                "type"=>"text",
                                "label"=>"Addresse",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Addresse invalide."
                ],
            ]
        ];

    }
}