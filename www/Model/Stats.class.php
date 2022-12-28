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
        $params = ['session'=>$session];
        $sql = ($this->queryBuilder)->select()->from($this->table)->where("Session=:session")->params($params);
        $queryPrepared = $sql->execute();
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
        $params = ['session'=>$session];
        $sql = ($this->queryBuilder)->select()->from($this->table)->where("Session=:session")->params($params);
        $queryPrepared = $sql->execute();
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
                $params = ['date'=>$todaydate];
                $sql = ($this->queryBuilder)->select("COUNT(Id)")->from($this->table)->where("Year(Date) = Year(:date)")->params($params);
                $queryPrepared = $sql->execute();
                $data = $queryPrepared->fetch();
                return $data[0];
            default:
                if(empty($compareDate)){
                    $params = ['date'=>$todaydate];
                    $sql = ($this->queryBuilder)->select("COUNT(Id)")->from($this->table)->where("Date = :date")->params($params);
        
                }else{
                    $params = ['date'=>$todaydate,'compareDate'=>$compareDate];
                    $sql = ($this->queryBuilder)->select("COUNT(Id)")->from($this->table)->where("Date between :compareDate AND :date")->params($params);
                }
                $queryPrepared = $sql->execute();
                $data = $queryPrepared->fetch();
                break;
        }
        return $data[0];

    }

}