<?php

namespace App\Model;

use App\Core\DatabaseDriver;


class Comment extends DatabaseDriver
{

	private $id = null;
	protected $content;
    protected $active = 0;
    protected $user_id;

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

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    /**
     * @param null $content
     */
    public function setUserId(Int $userId): void
    {
        $this->user_id = $userId;
    }
    

}

?>