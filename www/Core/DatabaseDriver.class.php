<?php

namespace App\Core;
use App\Vendor\DataTable\SSP;
use App\Model\User;
use App\Model\Article;
use App\Model\Comment;
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
			$this->pdo = new \PDO("mysql:host=database;dbname=sakura;port=3306" ,"usersql" ,"passwordsql",array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1"));

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

	public function serverProcessing(){
		if(get_class($this) == User::class){
			$dataTable = SSP::simple( $_GET, $this->pdo, $this->table,'id');
			$i=0;
			$result = [
				'recordsTotal' =>$dataTable['recordsTotal'] ,
				'recordsFiltered'=>$dataTable['recordsFiltered'],
				'data'=>null
			];
			
			foreach ($dataTable as $data => $value) {
				if(array_key_exists($i,$dataTable['data'])){
					if ($dataTable['data'][$i]['Role'] == 0) {
						unset($dataTable['data'][$i]);
					}else{
						$result['data'][] = $dataTable['data'][$i];
					}
				}
				$i++;
			}
			$result['recordsFiltered'] = $dataTable['recordsFiltered'];
			echo json_encode($result);
		}elseif((get_class($this) == Article::class) || (get_class($this) == Comment::class)){
			$dataTable = SSP::simple( $_GET, $this->pdo, $this->table,'id');
			$i=0;
			foreach ($dataTable as $data => $value) {
				preg_replace('/%u([0-9A-F]+)/', '&#x$1;', $dataTable['data'][$i]['Content']);
				html_entity_decode($dataTable['data'][$i]['Content'], ENT_COMPAT, 'UTF-8');
			}
			echo json_encode($dataTable);
		}
    }
}