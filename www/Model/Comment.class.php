<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use DateTime;

class Comment extends DatabaseDriver
{

	private $id = null;
	protected $author;
    protected $content;
    protected $email;
    protected $status = "unapproved";
    protected $date_created;
    protected $comment_post_id;



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


    public function getAuthor(): ?String
    {
        return $this->author;
    }

    /**
     * @param null $author
     */
    public function setAuthor(String $author): void
    {
        $this->author = $author;
    }

    public function getEmail(): ?String
    {
        return $this->email;
    }

    /**
     * @param null $email
     */
    public function setEmail(String $email): void
    {
        $this->email = $email;
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

    public function getStatus(): ?String
    {
        return $this->status;
    }

    /**
     * @param null $content
     */
    public function setStatus(String $status): void
    {
        $this->status = $status;
    }

    public function setDateCreated(String $date_created): void
    {
        $this->date_created = $date_created;
    }

    public function getDateCreated(): ?String
    {
        return $this->date_created;
    }

    public function setCommentPostId(Int $comment_post_id): void
    {
        $this->comment_post_id = $comment_post_id;
    }

    public function getCommentPostId(): ?Int
    {
        return $this->comment_post_id;
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

    public function createMotBanForm(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Enregistrer"
                            ],
                "category"=>$this->find(),

                "inputs"=> [
                    "word"=>[
                        "type"=>"text",
                        "label"=>"Mot Banni",
                        "class"=>"ipt-form-entry",
                        "min"=>2,
                        "max"=>25,
                        "required"=>true,
                        "error"=>"Le mot banni doit faire entre 2 et 25 caractères."
                    ],
                ]
            ];

    }

    public function findCommentById(Int $id){
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data;
    }

    public function selectpApprovedComments(Int $id){
        $sql = "SELECT * FROM $this->table WHERE comment_post_id = $id AND status = 'approved'";
		return $result = $this->pdo->query($sql)->fetchAll();
    }

    public function selectAll()
    {
        $sql = "SELECT * FROM $this->table";
		return $result = $this->pdo->query($sql)->fetchAll();
    }
}

?>