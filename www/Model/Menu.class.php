<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use App\Model\Page as PageModel;

class Menu extends DatabaseDriver
{
    private $id = null;
    protected $content;
    protected $title;
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
        $page = new PageModel();

        return [
            "config" => [
                            "method"=>"POST",
                            "class"=>"form-register",
                            "submit"=>"Modifier"
                        ],

           "navigation"=>$this->find(),
           "user"=>$userInfo, 
           "existingPages"=>$page->getActivePage(),
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
    
    public function updateMain(Int $id = null): void
    {
        if ($id == null) {
            $id = $this->pdo->lastInsertId();
        }
    
        ($this->queryBuilder)->update(["Main = :Main"])->from($this->table)->params(["Main"=>0])->execute();

        ($this->queryBuilder)->update(["Main = :Main"])->from($this->table)->where("id = :id")->params(["Main"=>1,"id"=>$id])->execute();

    }
    
    public function updateContent(String $oldTitle, String $newTitle): void
    {

        $sql = ($this->queryBuilder)->select("Id")->from($this->table)->where("Content LIKE :oldTitle")->params(["oldTitle" =>"%{$oldTitle}%"]);
        $menusId=$sql->execute()->fetchAll();
        foreach ($menusId as $key => $value) {
            ($this->queryBuilder)->update(["Content = REPLACE(Content, :oldTitle, :newTitle)"])->from($this->table)->where("Id = :id")
                ->params([
                    "oldTitle"=>$oldTitle,
                    "newTitle" =>$newTitle,
                    "id" => $value['Id']
                ])->execute();
        }
    }

    public function getMainMenu()
    {
        $sql = ($this->queryBuilder)->select("*")->from($this->table)->where("Main = 1")->execute();
        $data = $sql->fetch();
		return $data;
    }
}
