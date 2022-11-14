<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use DateTime;

class Stats extends DatabaseDriver
{
    private $id = null;
	protected $ip;
    protected $date;


	public function __construct()
	{
		parent::__construct();
	}

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(Int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getDate(): ?String
    {
        return $this->date;
    }

    /**
     * @param String $date
     */
    public function setDate(String $date): void
    {
        $this->date = $date;
    }

    /**
     * @return String
     */
    public function getIp(): ?String
    {
        return $this->ip;
    }

    /**
     * @param String $ip
     */
    public function setIp(String $ip): void
    {
        $this->ip = $ip;
    }

    public function existIp(String $ip): bool
    {
        $sql = "SELECT Ip FROM $this->table WHERE Ip='$ip'";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        if ($data["Ip"] == $ip ){
            return true;
        }
        else{
            return false;
        }
    }

	public function findIdByIp(string $ip) : int
	{
		//recup L'id par une requete sql avec l'ip
        $sql = "SELECT Id FROM $this->table WHERE Ip='$ip'";
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
        return $data["Id"];
	}

    public function getDayStats(String $date) : int
    {
        $todayDate = date_format(new DateTime(),"Y-m-d");
        switch ($date) {
            case 'today':
                $sql = "SELECT COUNT(Ip) FROM ".$this->table." WHERE Date='$todayDate'";
                $result = $this->pdo->query($sql);
                $data = $result->fetch();
                return $data[0];
            
            case 'yesterday' :
                $compareDate = date_format(new DateTime("yesterday"),"Y-m-d");
                $sql = "SELECT COUNT(Ip) FROM ".$this->table." WHERE Date between'$compareDate' and '$todayDate'";
                $result = $this->pdo->query($sql);
                $data = $result->fetch();
                return $data[0];

            case 'week' : 
                $compareDate = date_format(new DateTime("-7 days"),"Y-m-d");
                $sql = "SELECT COUNT(Ip) FROM ".$this->table." WHERE Date between'$compareDate' and '$todayDate'";
                $result = $this->pdo->query($sql);
                $data = $result->fetch();
                return $data[0];

            case 'month' : 
                $compareDate=date('Y-m-d',strtotime("-1 month"));
                $sql = "SELECT COUNT(Ip) FROM ".$this->table." WHERE Date between '$compareDate' and '$todayDate'";
                $result = $this->pdo->query($sql);
                $data = $result->fetch();
                return $data[0];

            case 'months' :
                $compareDate=date('Y-m-d',strtotime("-3 month"));
                $sql = "SELECT COUNT(Ip) FROM ".$this->table." WHERE Date between '$compareDate' and '$todayDate'";
                $result = $this->pdo->query($sql);
                $data = $result->fetch();
                return $data[0];
            
            case 'year' : 
                $compareDate = date_format(new DateTime("-1 year"),"Y-m-d");
                $sql = "SELECT COUNT(Ip) FROM ".$this->table." WHERE Date between'$compareDate' and '$todayDate'";
                $result = $this->pdo->query($sql);
                $data = $result->fetch();
                return $data[0];

            default:
                return 0;
                break;
        }
    }

}