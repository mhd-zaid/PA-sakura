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
     * @return null | int
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
        return $this->css;
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
        $sql = ($this->queryBuilder)->select()->from($this->table)->where("Active = 1");
        $result = $sql->execute();
        $data = $result->fetch();
        return $data;
    }

    
    public function updateActive(Int $id): void
    {
        $sql =  ($this->queryBuilder)->update(["Active = :Active"])->from($this->table)->params(["Active"=>0]);
        $sql->execute();

        $sql =  ($this->queryBuilder)->update(["Active = :Active"])->from($this->table)->where("id = :id")->params(["Active"=>1,"id"=>$id]);
        $sql->execute();
    }

}
