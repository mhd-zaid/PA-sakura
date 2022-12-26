<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use App\Model\Category;
use App\Model\User;

class Article extends DatabaseDriver
{
	private $id = null;
	protected $content;
    protected $slug;
    protected $title;
    protected $user_id;
    protected $image_name;
    protected $active = 0;
    private $date_created;
	private $date_updated;
    protected $rewrite_Url;
    protected $categories;
    protected $description;

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
    public function getActive(): ?int
    {
        return $this->active;
    }

    /**
     * @param null $id
     */

    //abstract public function setId($id);
    public function setActive(Int $active): void
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param mixed $firstname
     */
    public function setContent(String $content): void
    {
        $this->content = $content;
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

    public function getUserId(): ?Int
    {
        return $this->user_id;
    }

     /**
     * @param mixed $title
     */
    public function setTitle(?String $title): void
    {
        $this->title = strip_tags($title);
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId(Int $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getDescription(): ?string
    {
        return $this->content;
    }


    public function setDescription(String $description): void
    {
        $this->description = strip_tags($description);
    }

    public function getImageName(): ?String
    {
        return $this->image_name;
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
     * @param mixed $image_name
     */
    public function setImageName(String $image_name): void
    {
        $this->image_name = $image_name;
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
     * @return null
     */
    public function getCategories(): ?string
    {
        return $this->categories;
    }

    /**
     * @param null $id
     */
    //abstract public function setId($id);
    public function setCategories(String $categories): void
    {
        $categories = array_unique(explode(',', $categories));
        $this->categories = strip_tags(implode(',', $categories));
    }
    public function selectAllLimit()
	{
		$sql = "SELECT * FROM $this->table LIMIT 10";
		return $result = $this->pdo->query($sql)->fetchAll();
        
	}

    public function selectSingleArticle(Int $id)
	{
		$sql = "SELECT * FROM $this->table WHERE Id = $id";
		return $result = $this->pdo->query($sql)->fetchAll();
        
	}

    public function createArticleForm(){
        $user = new User();
        $category = new Category();
        $userInfo = $user->getUser($_COOKIE['JWT']);

        return [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Modifier"
                        ],

           "article"=>$this->find(),
           "category"=>$category->select(),
           "user"=>$userInfo, 

           "textarea"=>[
                "class"=>"ckeditor",
                "id"=>"editor",
                "name"=>"editor"
           ],
            "inputs"=> [
                "titre"=>[
                                "type"=>"text",
                                "label"=>"Titre de l'article",
                                "class"=>"ipt-form-entry",
                                "min"=>2,
                                "max"=>25,
                                "required"=>true,
                                "error"=>"Le titre doit faire entre 2 et 25 caractères"
                            ],
                "imageName"=>[
                                "type"=>"hidden",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Votre mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                            ],
              
                "listCategorie"=>[
                                "type"=>"hidden",
                                "id"=>"list",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Votre mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
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
                    "required"=>true,
                    "error"=>"Veuillez ajouter du contenu."
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
            ]
        ];

    }

    public function formManageUrl(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Modifier",
                                "delete"=>"Supprimer"
                            ],
                "rewriteUrl"=>$this->findRewriteUrl(), 
                            
                "inputs"=> [    
                    "choice"=>[
                        "Slug"=>[
                            "type"=>"radio",
                            "label"=>"Slug",
                            "class"=>"ipt-form-entry",
                            "value"=>"2",
                            "elemName"=>"choice"
                        ],
                        "Id"=>[
                            "type"=>"radio",
                            "label"=>"Id",
                            "class"=>"ipt-form-entry",
                            "value"=>"1",
                            "elemName"=>"choice"
                        ],
                    ],
                ]
            ];

    }
}