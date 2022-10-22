<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class Article extends DatabaseDriver
{
	private $id = null;
	protected $content;
    protected $slug;

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
     * @param mixed $firstname
     */
    public function setSlug(String $slug): void
    {
        $this->slug = $slug;
    }

    public function findArticleById(Int $id = null){ 
        $sql = "SELECT * FROM ".$this->table." WHERE id =".$id;
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }

    public function deleteArticleById(Int $id = null):void{ 
        $sql = "DELETE  FROM ".$this->table." WHERE id =".$id;
        $result = $this->pdo->query($sql);
    }
}