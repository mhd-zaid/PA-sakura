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

    public function findArticleById(Int $id = null){ 
        $sql = "SELECT * FROM ".$this->table." WHERE id =".$id;
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }

    public function findArticleRewriteUrl(){ 
        $sql = "SELECT Rewrite_Url FROM ".$this->table." WHERE Rewrite_Url =1";
        $result = $this->pdo->query($sql);
        return $result->rowCount();
    }

    public function findArticleBySlug(String $slug ){ 
        $sql = "SELECT * FROM ".$this->table." WHERE Slug = '$slug'";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }

    public function updateRewriteUrl(Int $choice){
        $sql = "Update ".$this->table." SET Rewrite_Url=$choice";
        $result = $this->pdo->query($sql);
    }

    public function deleteArticleById(Int $id = null):void{ 
        $sql = "DELETE  FROM ".$this->table." WHERE id =".$id;
        $result = $this->pdo->query($sql);
    }

    public function deleteArticleBySlug(String $slug):void{ 
        $sql = "DELETE  FROM ".$this->table." WHERE Slug = '$slug'";
        $result = $this->pdo->query($sql);
    }
}