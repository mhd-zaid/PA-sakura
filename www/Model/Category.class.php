<?php

namespace App\Model;

use App\Core\DatabaseDriver;


class Category extends DatabaseDriver
{

	private $id = null;
	protected $titre;

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


    public function getTitre(): ?String
    {
        return $this->titre;
    }

    /**
     * @param null $content
     */
    public function setTitre(String $titre): void
    {
        $this->titre = strip_tags($titre);
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

    public function getCategories(){
        $sql = "SELECT * FROM ".$this->table."";
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll();
        return $data;
    }
}

?>