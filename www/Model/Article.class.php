<?php

namespace App\Model;

use App\Core\DatabaseDriver;

class Article extends DatabaseDriver
{
	private $id = null;
	protected $content;

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
}