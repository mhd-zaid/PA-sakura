<?php

namespace App\Model;

use App\Core\DatabaseDriver;

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
        $arr = ['?', '#', '(', ')',' '];
        $this->slug = str_replace($arr,'-',trim($slug));
    }

    public function getUserId(): ?Int
    {
        return $this->user_id;
    }

     /**
     * @param mixed $title
     */
    public function setTitle(String $title): void
    {
        $this->title = $title;
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

    public function createArticleForm(){

        return [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Modifier"
                        ],

           "article"=>$this->findArticle(),

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

                "openFile"=>[
                                "type"=>"button",
                                "value"=>"Ajouter une image",
                                "id"=>"openFile",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Votre nom doit faire entre 2 et 75 caractères"
                            ],
                "deleteImage"=>[
                                "type"=>"button",
                                "value"=>"Supprimer l'image",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Votre email est incorrect"
                            ],
                "imageName"=>[
                                "type"=>"hidden",
                                "class"=>"ipt-form-entry",
                                "required"=>false,
                                "error"=>"Votre mot de passe doit faire plus de 8 caractères avec une minuscule une majuscule et un chiffre"
                            ],
            ]
        ];

    }

    public function findArticleRewriteUrl(){ 
        $sql = "SELECT Rewrite_Url FROM ".$this->table." WHERE Rewrite_Url =1";
        $result = $this->pdo->query($sql);
        return $result->rowCount();
    }

    public function findArticle(){
        if(!empty($_GET['Slug'])){
            $slug = $_GET['Slug'];
            $sql = "SELECT * FROM ".$this->table." WHERE Slug = '$slug'";
            $result = $this->pdo->query($sql);
            $data = $result->fetch();
            if(empty($data)){
                header("Location: /article");
            }
        }elseif(!empty($_GET['id'])){
            $sql = "SELECT * FROM ".$this->table." WHERE id =".$_GET['id'];
            $result = $this->pdo->query($sql);
            $data = $result->fetch();
            if(empty($data)){
                header("Location: /article");
            }
        }else{
            return null;
        }
        return $data;
    }

    public function updateRewriteUrl(Int $choice){
        $sql = "Update ".$this->table." SET Rewrite_Url=$choice";
        $result = $this->pdo->query($sql);
    }

    public function deleteArticle():void{
        if(!empty($_GET['Slug'])){
            $slug = $_GET['Slug'];
            $sql = "DELETE  FROM ".$this->table." WHERE Slug = '$slug'";
            $result = $this->pdo->query($sql);
        }elseif(!empty($_GET['id'])){
            $sql = "DELETE  FROM ".$this->table." WHERE id =".$_GET['id'];
            $result = $this->pdo->query($sql);
        }else{
        }
    }

    public function isTitleExist(String $title){
        $sql = "SELECT * FROM ".$this->table."  WHERE Title = '$title'";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();

        $numberRow = $result->rowCount();
        if($numberRow > 0){
            if(isset($_GET['Slug']) && !empty($_GET['Slug'])){
                $slug = $_GET['Slug'];
                $compare = "SELECT * FROM ".$this->table."  WHERE Slug = '$slug'";  
                $resultSlug = $this->pdo->query($compare);
                $dataSlug = $resultSlug->fetch();
                if($dataSlug['Id'] == $data['Id']){
                    return true;
                }else{
                    return false;
                }
            }elseif(isset($_GET['id']) && !empty($_GET['id'])){
                $id = $_GET['id'];
                $compareId = "SELECT * FROM ".$this->table."  WHERE Id = '$id'";  
                $resultId = $this->pdo->query($compareId);
                $dataId = $resultId->fetch();
                if($dataId['Id'] == $data['Id']){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
}