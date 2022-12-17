<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use App\Model\Category;


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
        $newSlug = self::slugify($slug);
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
        $this->categories = $categories;
    }

    public function createArticleForm(){

        return [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Modifier"
                        ],

           "article"=>$this->findArticle(),
           "category"=>$this->selectAllCategories(),

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
              
                "listCategorie"=>[
                                "type"=>"hidden",
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
            ]
        ];

    }

    public function findArticleRewriteUrl(){ 
        $sql = "SELECT Rewrite_Url FROM ".$this->table." WHERE Rewrite_Url =:Rewrite_Url";
        $params = ['Rewrite_Url'=>'1'];
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);
        $result = $queryPrepared->fetch();
        return $queryPrepared->rowCount();
    }

    public function findArticle(){
        if(!empty($_GET['Slug'])){
            $slug = $_GET['Slug'];
            $sql = "SELECT * FROM ".$this->table." WHERE Slug =:Slug";
            $params = ['Slug'=>$slug];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
            $data = $queryPrepared->fetch();
            if(empty($data)){
                header("Location: /article");
            }
        }elseif(!empty($_GET['id'])){
            $sql = "SELECT * FROM ".$this->table." WHERE id =:id";
            $params = ['id'=>$_GET['id']];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
            $data = $queryPrepared->fetch();
            if(empty($data)){
                header("Location: /article");
            }
        }else{
            return null;
        }
        return $data;
    }

    public function updateRewriteUrl(Int $choice){
        $sql = "Update ".$this->table." SET Rewrite_Url=:Rewrite_Url";
        $params = ['Rewrite_Url'=>$choice];
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);
    }

    public function deleteArticle():void{
        if(!empty($_GET['Slug'])){
            $slug = $_GET['Slug'];
            $sql = "DELETE  FROM ".$this->table." WHERE Slug =:Slug";
            $params = ['Slug'=>$slug];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
        }elseif(!empty($_GET['id'])){
            $sql = "DELETE  FROM ".$this->table." WHERE id =:id";
            $params = ['id'=>$_GET['id']];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
        }else{
        }
    }
    public function selectAllCategories(){
        $categories = new Category();
        $data = $categories->getCategories();
        return $data;
    }

    public function selectAllCategoriesArticle(){
        $sql = "SELECT  * FROM ".$this->table;
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll();
        return $data;
    }
    
    public function slugify($text, string $divider = '-')
    {
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

  return $text;
}
}