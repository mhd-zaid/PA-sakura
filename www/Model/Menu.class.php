<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use App\Model\Page as PageModel;

class Menu extends DatabaseDriver
{
	private $id = null;
	protected $content;
    protected $title;
    protected $active = 0;
    protected $main = 0;

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
     
    /**
     * @return mixed
     */
    public function getMain(): ?int
    {
        return $this->main;
    }

    /**
     * @param mixed $main
     */
    public function setMain(int $main): void
    {
        $this->main = $main;
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
    
    public function getExistingPages()
    {
        $pages = new PageModel();
        $data = $pages->getPages();
        return $data;
    }

    public function updateMain(Int $id = null):void{
        if($id==null) $id = $this->pdo->lastInsertId();
        $sql = "UPDATE {$this->table} SET Main = 0";
        $sql1 = "UPDATE {$this->table} SET Main = 1 WHERE id = {$id}";
        $this->pdo->query($sql);
        $this->pdo->query($sql1);
    }
}