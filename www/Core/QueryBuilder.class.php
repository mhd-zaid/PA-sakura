<?php

namespace App\Core;

class QueryBuilder
{
    private $select = [];
    private $delete;
    private $insert;
    private $update;
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
        if (!empty($columns)) {
            $this->select = $columns;
        }else{
            $this->select = ['*'];
        }

        return $this;
    }

    public function delete()
    {
        $this->delete = ['DELETE'];

        return $this;
    }

    public function insert(array $columns)
    {
        $this->insert = "INSERT INTO ". $this->from." (".implode(",",$columns).") VALUES (:".implode(",:",$columns).")";

        return $this;
    }

    public function update(array $update)
    {
        $this->update = $update;

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
            $this->reset();
            return $statement;
        }
        $this->reset();
        return $this->pdo->query($query);
    }

    public function reset()
    {
        $this->select = [];
        $this->delete = [];
        $this->from = [];
        $this->where = [];
        $this->params = [];
    }

    public function __toString()
    {
        if (!empty($this->insert)) {
            $query = [$this->insert];
        }else{
            if (!empty($this->select)) {
                $query = ['SELECT'];
                $query[] = implode(",",$this->select); 
                $query[] = 'FROM';
                $query[] = $this->from;
            }elseif(!empty($this->delete)){
                $query = $this->delete;
            }elseif (!empty($this->update)) {
                $query = ['UPDATE'];
                $query[] = $this->from;
                $query[] = "SET";
                $query[] = implode(",",$this->update);
            }
            if (!empty($this->where)) {
                $query[] = 'WHERE';
                $query[] = $this->where;
            }
        }

        return implode(" ",$query);
    }
}