<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use DateTime;

class Page extends DatabaseDriver
{
    private $id = null;
    protected $title;
    protected $content;
    protected $active;
    protected $user_id;
    protected $description;
    protected $date_publi;



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
        $this->title = $title;
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
        $this->description = $description;
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
     * @param mixed $user_id
     */
    public function setActive(Int $active): void
    {
        $this->active = $active;
    }

     /**
     * @param mixed $date_publi
     */
    public function setDate(String $date_publi): void
    {
        $this->date_publi = $date_publi;
    }

    public function getDate(): ?String
    {
        return $this->date_publi;
    }


    public function findPageById(Int $id = null)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id =" . $id;
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }

    public function deletePageById(Int $id = null): void
    {
        $sql = "DELETE  FROM " . $this->table . " WHERE id =" . $id;
        $result = $this->pdo->query($sql);
    }

    public function getPages()
    {
        $sql = "SELECT * FROM ".$this->table;
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll();
        return $data;
    }

}
