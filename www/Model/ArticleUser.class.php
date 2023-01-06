<?php

namespace App\Model;

use App\Core\DatabaseDriver;


class ArticleUser extends DatabaseDriver
{

	private $id = null;
	protected $idArticle;
    protected $idUser;

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
     * @return null
     */
    public function getArticleId(): ?int
    {
        return $this->idArticle;
    }

    /**
     * @param null $id
     */
    public function setArticleId(Int $idArticle): void
    {
        $this->idArticle = $idArticle;
    }

     /**
     * @return null
     */
    public function getUserId(): ?int
    {
        return $this->idUser;
    }

    /**
     * @param null $id
     */
    public function setUserId(Int $idUser): void
    {
        $this->idUser = $idUser;
    }

    public function getUserByArticleId($articleId){
        $params = ['idArticle' => $articleId];
        $sql = ($this->queryBuilder)->select()->from($this->table)->where("idArticle = :idArticle")->params($params);
        $queryPrepared = $sql->execute();
        $data = $queryPrepared->fetchAll();
        return $data;
    }
}
