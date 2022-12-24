<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class Apparence extends DatabaseDriver
{
    private $id = null;
    protected $css;

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

}
