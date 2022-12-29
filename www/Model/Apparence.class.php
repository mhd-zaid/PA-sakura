<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class Apparence extends DatabaseDriver
{
    private $id = null;
    protected $css;
    protected $active;

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
    public function getCss(): ?string
    {
        return $this->title;
    }

    /**
     * @param mixed $css
     */
    public function setCss(String $css): void
    {
        $this->css = $css;
    }
    /**
     * @return mixed
     */
    public function getActive(): ?int
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive(int $active): void
    {
        $this->active = $active;
    }

    public function select(){
        //$sql = "SELECT  * FROM ".$this->table. " WHERE Active = 1";
        //$result = $this->pdo->query($sql);
        $sql = ($this->queryBuilder)->select()->from($this->table)->where("Active = 1");
        $result = $sql->execute();
        $data = $result->fetch();
        return $data;
    }

    
    public function updateActive(Int $id): void
    {
        //$sql = "UPDATE {$this->table} SET Active = 0";
        //$this->pdo->query($sql);

        // $sql1 = $this->pdo->prepare("UPDATE {$this->table} SET Active = 1 WHERE id = :id");
        // $sql1->bindValue("id", $id);
        // $sql1->execute();

        $sql =  ($this->queryBuilder)->update(["Active = :Active"])->from($this->table)->params(["Active"=>0]);
        $sql->execute();

        $sql =  ($this->queryBuilder)->update(["Active = :Active"])->from($this->table)->where("id = :id")->params(["Active"=>1,"id"=>$id]);
        $sql->execute();
    }

}
