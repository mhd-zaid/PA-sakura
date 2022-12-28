<?php

namespace App\Core;

class QueryBuilder
{
    private $select;
	private $from;
    private $where;
    private $params;
    private $pdo;


    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function from(string $table)
    {
        $this->from = $table;

        return $this;
    }

    public function select(string ...$columns)
    {
        $this->select = $columns;

        return $this;
    }

    public function where(string $condition)
    {
        $this->where = $condition;

        return $this;
    }

    public function andWhere(string ...$condition)
    {
        $this->where = array_merge($this->where,"AND $condition");

        return $this; 
    }

    public function orWhere(string ...$condition)
    {
        $this->where = array_merge($this->where,"OR $condition");
        
        return $this;
    }

    public function params(array $params)
    {
        $this->params = $params;
        
        return $this;
    }

    public function execute()
    {
        $query = $this->__toString();

        if (!empty($this->params)) {
            $statement = $this->pdo->prepare($query);
            $statement->execute($this->params);

            return $statement;
        }

        return $this->pdo->query($query);
    }

    public function __toString()
    {
        $query = ['SELECT'];
        if (!empty($this->select)) {
            $query[] = implode(",",$this->select); 
        }else{
            $query[] = '*';
        }
        
        $query[] = 'FROM';
        $query[] = $this->from;
        
        if (!empty($this->where)) {
            $query[] = 'WHERE';
            $query[] = $this->where;
        }

        return implode(" ",$query);
    }
}