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
        $this->titre = $titre;
    }

    public function createCategoryForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Enregistrer"
                            ],
                "category"=>$this->select(),

                "inputs"=> [
                    "titre"=>[
                                    "type"=>"text",
                                    "label"=>"Titre de la catégorie",
                                    "class"=>"ipt-form-entry",
                                    "required"=>true,
                                    "error"=>"Votre titre est inccorect"
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