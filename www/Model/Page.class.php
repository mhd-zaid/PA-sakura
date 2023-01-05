<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class Page extends DatabaseDriver
{
    private $id = null;
    protected $title;
    protected $content;
    protected $active = 0;
    protected $user_id;
    protected $slug;
    protected $rewrite_Url;
    protected $description;
    protected $main;
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param mixed $firstname
     */
    public function setTitle(String $title): void
    {
        $this->title = strip_tags($title);
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param mixed $user_id
     */
    public function setContent(String $content): void
    {
        $this->content = $content;
    }

    public function getDescription(): ?string
    {
        return $this->content;
    }


    public function setDescription(String $description): void
    {
        $this->description = strip_tags($description);
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

    /**
     * @param mixed $user_id
     */
    public function setUserId(Int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getActive(): ?Int
    {
        return $this->active;
    }

     /**
     * @param mixed $rewrite_Url
     */
    public function setRewriteUrl(Int $rewrite_Url): void
    {
        $this->rewrite_Url = $rewrite_Url;
    }

    public function getRewriteUrl(): ?Int
    {
        return $this->rewrite_Url;
    }

     /**
     * @param mixed $main
     */
    public function setMain(Int $main): void
    {
        $this->main = $main;
    }

    public function getMain(): ?Int
    {
        return $this->main;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param mixed $user_id
     */
    public function setSlug(String $slug): void
    {   
        $newSlug = $this->slugify($slug);
        $this->slug = $newSlug;
    }


    /**
     * @param mixed $user_id
     */
    public function setActive(Int $active): void
    {
        $this->active = $active;
    }

    public function createPageForm(){
        $user = new User();
        $userInfo = $user->getUser($_COOKIE['JWT']);

        return [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Modifier"
                        ],

           "page"=>$this->find(),
           "user"=>$userInfo, 

           "textarea"=>[
                "class"=>"ckeditor",
                "id"=>"editor",
                "name"=>"editor"
           ],
            "inputs"=> [
                "titre"=>[
                                "type"=>"text",
                                "label"=>"Titre de la page",
                                "class"=>"ipt-form-entry",
                                "min"=>2,
                                "max"=>25,
                                "required"=>true,
                                "error"=>"Le titre doit faire entre 2 et 25 caractères"
                            ],
                "metadescription"=>[
                                "type"=>"text",
                                "label"=>"Metadescription",
                                "class"=>"ipt-form-entry",
                                "min"=>2,
                                "max"=>25,
                                "required"=>true,
                                "error"=>"Les metadescriptions sont obligatoires"
                ],
                "slug"=>[
                                "type"=>"text",
                                "label"=>"Slug",
                                "class"=>"ipt-form-entry",
                                "min"=>2,
                                "max"=>25,
                                "required"=>true,
                                "error"=>"Le slug doit faire entre 2 et 25 caractères"
                            ],
                "editor"=>[
                    "type"=>"hidden",
                    "class"=>"ipt-form-entry",
                    "required"=>false,
                    "error"=>"Votre mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                ],
            ]
        ];

    }

    public function getMainPage()
    {
        $sql = ($this->queryBuilder)->select("*")->from($this->table)->where(" Main = 1")->execute();

        $data = $sql->fetch();
		return $data;
    }
}
