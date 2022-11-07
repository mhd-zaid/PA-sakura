<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class Menu extends DatabaseDriver
{
	private $id = null;
	protected $content;
    protected $title;
    protected $active = 0;

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

     /**
     * @return mixed
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle(String $title): void
    {
        $this->title = $title;
    }

    public function findMenuById(Int $id = null){ 
        $sql = "SELECT * FROM ".$this->table." WHERE id =".$id;
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }
    
    public function getMenus(){ 
        $sql = "SELECT * FROM ".$this->table.";";
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll();
        return $data;
    }

    public function deleteMenuById(Int $id = null):void{ 
        $sql = "DELETE  FROM ".$this->table." WHERE id =".$id;
        $result = $this->pdo->query($sql);
    }
}