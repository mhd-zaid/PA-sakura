<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use DateTime;
use App\Core\Observer;
use App\Core\Notification\AddNotification;
use App\Core\Notification\ModifyNotification;

class Comment extends DatabaseDriver
{

	private $id = null;
	protected $author;
    protected $content;
    protected $email;
    protected $status = "unapproved";
    protected $date_created;
    protected $comment_post_id;
    protected $nombre_signalement;
    public static $notification = [];

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
     * @param mixed $content
     */
    public function setContent(?String $content): void
    {
        $this->content = strip_tags($content);
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
    
    public function getNbrSignalement(): ?int
    {
        return $this->nombre_signalement;
    }

    public function setNbrSignalement(Int $nombre_signalement): void
    {

        $this->nombre_signalement = $nombre_signalement;
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

    public function formCommentaire(){

        return [
                "config" => [
                                "method"=>"POST",
                                "class"=>"form-register",
                                "submit"=>"Envoyer"
                            ],
                "inputs"=> [
                    "author"=>[
                        "type"=>"text",
                        "label"=>"Pseudo",
                        "class"=>"ipt-form-entry",
                        "min"=>2,
                        "max"=>25,
                        "required"=>true,
                        "error"=>"Pseudo inccorect."
                    ],
                    "email"=>[
                        "type"=>"email",
                        "label"=>"E-mail",
                        "class"=>"ipt-form-entry",
                        "min"=>2,
                        "max"=>25,
                        "required"=>true,
                        "error"=>"E-mail inccorect."
                    ],
                    "content"=>[
                        "type"=>"text",
                        "label"=>"Message",
                        "class"=>"ipt-form-entry",
                        "min"=>2,
                        "max"=>200,
                        "required"=>true,
                        "error"=>"Le message doit faire entre 2 et 25 caractères."
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

    public function subscribeToNotification(Observer $notif){
        array_push(static::$notification, $notif);
    }

    public function update(?int $id = null){
        foreach(static::$notification as $observer){
            switch(get_class($observer)){
                case AddNotification::class:
                    $observer->alert("Ajout d'un commentaire", "Un nouveau commentaire a ete ajoute.");
                    break;
                case ModifyNotification::class:
                    $observer->alert("Signalement", "Le commentaire avec l'id $id a ete signale.");
                    break;
                default:
                    break;
            }
        }
    }
}

?>