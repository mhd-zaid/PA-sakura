<?php

namespace App\Model;

use App\Core\DatabaseDriver;


class Comment extends DatabaseDriver
{

	private $id = null;
	protected $content;
    protected $active = 0;
    protected $article_id;
    protected $nbr_signalement = 0;

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


    public function getContent(): ?String
    {
        return $this->content;
    }

    /**
     * @param null $content
     */
    public function setContent(String $content): void
    {
        $this->content = $content;
    }
    
    public function getActive(): ?int
    {
        return $this->active;
    }

    /**
     * @param null $content
     */
    public function setActive(Int $active): void
    {
        $this->active = $active;
    }

    public function getArticleId(): ?int
    {
        return $this->article_id;
    }

    /**
     * @param null $content
     */
    public function setArticleId(Int $article_id): void
    {
        $this->article_id = $article_id;
    }
    
    public function getNbrSignalement(): ?int
    {
        return $this->nbr_signalement;
    }

    /**
     * @param null $content
     */
    public function setNbrSignalement(Int $nbr_signalement): void
    {
        $this->nbr_signalement = $nbr_signalement;
    }

    public function findCommentById(Int $id){
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }
}

?>