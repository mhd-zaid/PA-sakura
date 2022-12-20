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

    public function findMenuById(Int $id = null)
    {
        $sql = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $sql->bindValue("id", $id);
        $sql->execute();
        $data = $sql->fetch();
        return $data;
    }

    public function getMenus()
    {
        $sql = "SELECT * FROM {$this->table};";
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll();
        return $data;
    }

    public function deleteMenuById(Int $id = null): void
    {
        $sql = $this->pdo->prepare("DELETE  FROM {$this->table} WHERE id = :id");
        $sql->bindValue("id", $id);
        $sql->execute();;
    }

    public function getExistingPages()
    {
        $pages = new PageModel();
        $data = $pages->select();
        return $data;
    }

    public function updateMain(Int $id = null): void
    {
        if ($id == null) $id = $this->pdo->lastInsertId();

        $sql = "UPDATE {$this->table} SET Main = 0";
        $this->pdo->query($sql);

        $sql1 = $this->pdo->prepare("UPDATE {$this->table} SET Main = 1 WHERE id = :id");
        $sql1->bindValue("id", $id);
        $sql1->execute();
        $this->pdo->query($sql1);
    }
    
    public function updateContent(String $oldTitle, String $newTitle): void
    {
        //TO-DO:
        // - récupérer tout les menus
        $sql = $this->pdo->prepare("SELECT Id FROM {$this->table} WHERE Content LIKE :oldTitle");
        $sql->bindValue("oldTitle", "%{$oldTitle}%");
        $sql->execute();
        $menusId=$sql->fetchAll();
        foreach ($menusId as $key => $value) {
            $req = "UPDATE {$this->table} SET Content = REPLACE(Content, :oldTitle, :newTitle) WHERE Id = :id ";
            $sqlUpdate = $this->pdo->prepare($req);
            $sqlUpdate->bindValue("oldTitle", $oldTitle);
            $sqlUpdate->bindValue("newTitle", $newTitle);
            $sqlUpdate->bindValue("id", $value['Id']);
            $sqlUpdate->execute();
            $this->pdo->query($sqlUpdate);
            print_r($sqlUpdate);
            // continue;
        }
        // die();
    }
}
