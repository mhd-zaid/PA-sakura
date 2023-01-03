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
        $content = array_unique(explode(',', $content));
        $this->content = strip_tags(implode(',', $content));
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

    public function createNavigationForm(){
        $user = new User();
        $userInfo = $user->getUser($_COOKIE['JWT']);

        return [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Modifier"
                        ],

           "navigation"=>$this->find(),
           "user"=>$userInfo, 
           "existingPages"=>$this->getExistingPages(),
            "inputs"=> [
                "titre"=>[
                                "type"=>"text",
                                "label"=>"Titre de la navigation",
                                "class"=>"ipt-form-entry",
                                "min"=>2,
                                "max"=>25,
                                "required"=>true,
                                "error"=>"Le titre doit faire entre 2 et 25 caractères"
                            ],
            ]
        ];

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

        // $sql = "UPDATE {$this->table} SET Main = 0";
        // $this->pdo->query($sql);
        ($this->queryBuilder)->update(["Main = :Main"])->from($this->table)->params(["Main"=>0])->execute();

        // $sql1 = $this->pdo->prepare("UPDATE {$this->table} SET Main = 1 WHERE id = :id");
        // $sql1->bindValue("id", $id);
        // $sql1->execute();
        // $this->pdo->query($sql1);
        ($this->queryBuilder)->update(["Main = :Main"])->from($this->table)->where("id = :id")->params(["Main"=>1,"id"=>$id])->execute();
    }
    
    public function updateContent(String $oldTitle, String $newTitle): void
    {
        //TO-DO:
        // - récupérer tout les menus
        // $sql = $this->pdo->prepare("SELECT Id FROM {$this->table} WHERE Content LIKE :oldTitle");
        // $sql->bindValue("oldTitle", "%{$oldTitle}%");
        // $sql->execute();
        $sql = ($this->queryBuilder)->select("Id")->from($this->table)->where("Content LIKE :oldTitle")->params(["oldTitle" =>"%{$oldTitle}%"]);
        $menusId=$sql->execute()->fetchAll();
        foreach ($menusId as $key => $value) {
            // $req = "UPDATE {$this->table} SET Content = REPLACE(Content, :oldTitle, :newTitle) WHERE Id = :id ";
            // $sqlUpdate = $this->pdo->prepare($req);
            // $sqlUpdate->bindValue("oldTitle", $oldTitle);
            // $sqlUpdate->bindValue("newTitle", $newTitle);
            // $sqlUpdate->bindValue("id", $value['Id']);
            // $sqlUpdate->execute();
            // $this->pdo->query($sqlUpdate);
            //print_r($sqlUpdate);
            // continue;
            ($this->queryBuilder)->update(["Content = REPLACE(Content, :oldTitle, :newTitle)"])->from($this->table)->where("Id = :id")
                ->params([
                    "oldTitle"=>$oldTitle,
                    "newTitle" =>$newTitle,
                    "id" => $value['Id']
                ])->execute();
        }
        // die();
    }

    public function getMainMenu()
    {
        //$sql = "SELECT * FROM ".$this->table. " WHERE Main = 1";
        $sql = ($this->queryBuilder)->select("*")->from($this->table)->where("Main = 1")->execute();
        $data = $sql->fetchAll();
		return $data[0];
    }
}
