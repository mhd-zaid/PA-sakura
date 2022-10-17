<?php

namespace App\Core;
use App\Vendor\DataTable\SSP;

abstract class DatabaseDriver
{

	abstract public function setId(Int $id);
	abstract public function getId();

	protected $pdo;
	protected $table;


	public function __construct()
	{
		//Connexion avec la bdd
		try{
			$this->pdo = new \PDO("mysql:host=database;dbname=sakura;port=3306" ,"usersql" ,"passwordsql" );

			$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    		$this->pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);

		}catch(Exception $e){
			die("Erreur SQL ".$e->getMessage());
		}

		$CalledClassExploded = explode("\\", get_called_class());
		$this->table = strtolower("sakura_".end($CalledClassExploded));
	}


	//Insert et Update
	public function save() :void
	{

		$objectVars = get_object_vars($this);
		$classVars = get_class_vars(get_class());
		$columns = array_diff_key($objectVars, $classVars);


		if(is_null($this->getId())){
			// INSERT INTO esgi_user (firstname,lastname,email,pwd,status) VALUES (:firstname,:lastname,:email,:pwd,:status) ;
			$sql = "INSERT INTO ".$this->table. " (".implode(",", array_keys($columns) ) .") VALUES (:".implode(",:", array_keys($columns) ) .") ;";
		}else{

			foreach($columns as $column=>$value){
				$sqlUpdate[] = $column."=:".$column;
			}

			$sql = "UPDATE ".$this->table. " SET  ".implode(",",$sqlUpdate)."  WHERE id=".$this->getId();
		}

		$queryPrepared = $this->pdo->prepare($sql);
		$queryPrepared->execute($columns);

	}

	public function delete(int $id):void
	{
		$sql = "DELETE FROM $this->table where id=$id";
		$queryPrepared = $this->pdo->prepare($sql);
		$queryPrepared->execute();

	}

	public function serverProcessing($class){
        $vars = array_keys(get_class_vars($class));
		$sql_details = array(

			'user' => 'usersql',
			
			'pass' => 'passwordsql',
			
			'db'   => 'sakura',
			
			'host' => 'database'
		);
		$columns = [];
        foreach ($vars as $var) {
			$columns[] = array('db' => $var, 'dt' => $var);
		}
		//print_r($columns);
        $test = array(
            array(
                'db' => 'id',
                'dt' => 'DT_RowId',
                'formatter' => function( $d, $row ) {
                    // Technically a DOM id cannot start with an integer, so we prefix
                    // a string. This can also be useful if you have multiple tables
                    // to ensure that the id is unique with a different prefix
                    return 'row_'.$d;
                }
            ),
			$columns
        );
		//print_r($columns);
        echo json_encode(SSP::simple( $_GET, $sql_details, $this->table,'id', $test));
    }
}