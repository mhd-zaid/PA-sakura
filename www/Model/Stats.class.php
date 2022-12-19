<?php

namespace App\Model;

use App\Core\DatabaseDriver;
use DateTime;

class Stats extends DatabaseDriver
{
    private $id = null;
	protected $session;
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
    public function getSession(): ?String
    {
        return $this->session;
    }

    /**
     * @param String $session
     */
    public function setSession(String $session): void
    {
        $this->session = $session;
    }

    public function existSession(String $session): bool
    {
        $sql = "SELECT Session FROM $this->table WHERE Session=:session";
        $params = ['session'=>$session];
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);
        $data = $queryPrepared->fetch();
        if ($data["Session"] == $session ){
            return true;
        }
        else{
            return false;
        }
    }

	public function findIdBySession(string $session) : int
	{
		//recup L'id par une requete sql avec l'ip
        $sql = "SELECT Id FROM $this->table WHERE Session=:session";
        $params = ['session'=>$session];
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);
        $data = $queryPrepared->fetch();
        return $data["Id"];
	}

    public function getDayStats(String $date) : int
    {
        $todayDate = date_format(new DateTime(),"Y-m-d");
        switch ($date) {
            case 'today':
                
                return $this->getVisitor($todayDate);
            
            case 'yesterday' :
                $compareDate = date_format(new DateTime("yesterday"),"Y-m-d");
                
                return $this->getVisitor($compareDate);

            case 'week' : 
                $compareDate = date_format(new DateTime("-7 days"),"Y-m-d");
            
                return $this->getVisitor($todayDate,$compareDate);

            case 'month' : 
                $compareDate=date('Y-m-d',strtotime("-1 month"));
               
                return $this->getVisitor($todayDate,$compareDate);

            case 'months' :
                $compareDate=date('Y-m-d',strtotime("-3 month"));
                
                return $this->getVisitor($todayDate,$compareDate);
                
            case 'year' : 
                $compareDate = date_format(new DateTime("-1 year"),"Y-m-d");
                
                return $this->getVisitor($todayDate,$compareDate);
                
            case 'year-1' : 
            $compareDate = date_format(new DateTime("-1 year"),"Y-m-d");
            return $this->getVisitor($compareDate);

            case 'year-2' : 
                $compareDate = date_format(new DateTime("-2 year"),"Y-m-d");
                
                return $this->getVisitor($compareDate);

            case 'year-3' : 
                $compareDate = date_format(new DateTime("-3 year"),"Y-m-d");
                
                return $this->getVisitor($compareDate);

            default:
                return 0;
                break;
        }
    }

    public function getVisitor(String $todaydate,? String $compareDate = null): Int
    {
        $data = null;
        $sql = "";
        $params = [];
        switch ($_GET['year']) {
            case 'year-1':
            case 'year-2':
            case 'year-3':
                $sql = "SELECT COUNT(Id) FROM ".$this->table." WHERE Year(Date) = Year(:date)";
                $params = ['date'=>$todaydate];
                $queryPrepared = $this->pdo->prepare($sql);
                $queryPrepared->execute($params);
                $data = $queryPrepared->fetch();
                
            default:
                if(empty($compareDate)){
                    $sql = "SELECT COUNT(Id) FROM ".$this->table." WHERE Date=:date";
                    $params = ['date'=>$todaydate];
        
                }else{
                    $sql = "SELECT COUNT(Id) FROM ".$this->table." WHERE Date between :compareDate AND :date";
                    $params = ['date'=>$todaydate,'compareDate'=>$compareDate];
                }
                $queryPrepared = $this->pdo->prepare($sql);
                $queryPrepared->execute($params);
                $data = $queryPrepared->fetch();
                break;
        }
    
        return $data[0];

    }

}