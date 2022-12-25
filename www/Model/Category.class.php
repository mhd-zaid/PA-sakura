<?php

namespace App\Model;

use App\Core\DatabaseDriver;


class Category extends DatabaseDriver
{

	private $id = null;
	protected $title;

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


    public function getTitle(): ?String
    {
        return $this->title;
    }

    /**
     * @param null $content
     */
    public function setTitle(String $title): void
    {
        $this->title = strip_tags($title);
    }

    public function createCategoryForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Enregistrer"
                            ],
                "category"=>$this->find(),

                "inputs"=> [
                    "titre"=>[
                        "type"=>"text",
                        "label"=>"Titre de l'article",
                        "class"=>"ipt-form-entry",
                        "min"=>2,
                        "max"=>25,
                        "required"=>true,
                        "error"=>"Le titre doit faire entre 2 et 25 caractères"
                    ],
                ]
            ];

    }

    public function setCatTitle(string $title): void
    {
        $this->title = $title;
    }

    public function selectAllLimit()
	{
		$sql = "SELECT * FROM $this->table LIMIT 4";
		return $result = $this->pdo->query($sql)->fetchAll();
	}
}
