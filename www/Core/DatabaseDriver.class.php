<?php

namespace App\Core;
use App\Vendor\DataTable\SSP;
use App\Model\User;
use App\Model\Article;
use App\Model\Comment;
use App\Model\Page;
use App\Model\Category;

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

	public function select()
	{
		if(isset($_GET['id']) && !empty($_GET['id'])){
		$sql = "SELECT * FROM ".$this->table." WHERE id =".$_GET['id'];
        $result = $this->pdo->query($sql);
        $data = $result->fetch();
		return $data;
		}else{
			return null;
		}

	}

	public function serverProcessing(){

		$objectVars = get_object_vars($this);
		$classVars = get_class_vars(get_class());
		$columns = array_diff_key($objectVars, $classVars);
		$arrColumns = [['db' => 'Id', 'dt' => 'Id']];
			foreach($columns as $key => $col){
				$arrColumns[] = ['db' => $key, 'dt' => $key];
			}
		$user = new User();
		if((get_class($this) == Article::class) || (get_class($this) == Comment::class) || (get_class($this) == Page::class)){

			$dataTable = SSP::simple( $_GET, $this->pdo, $this->table,'Id', $arrColumns);

			foreach ($dataTable['data'] as $data => &$value) {

				preg_replace('/%u([0-9A-F]+)/', '&#x$1;', $value['content']);
				html_entity_decode($value['content'], ENT_COMPAT, 'UTF-8');

				if ($value['active'] == 0) {
					$value['active'] = "Brouillon";
				}
				if($value['active'] == 1){
				   $value['active'] = "Publié";
				}
				if(isset($value['user_id'])){
				$value['user_id'] = $user->getNameUserId($value['user_id']);
				}
			}
			echo json_encode($dataTable);
		}elseif((get_class($this) == Category::class) || get_class($this) === User::class){
			$dataTable = SSP::simple( $_GET, $this->pdo, $this->table,'id', $arrColumns);
			echo json_encode($dataTable);
		}
    }

	public function isUnique(String $context, String $data){

		if($context === 'Title'){
			$sql = "SELECT * FROM ".$this->table." WHERE Title = :Title";
			$params = ['Title'=>$data];
		}
		if($context === 'slug'){
			$sql = "SELECT * FROM ".$this->table." WHERE slug = :slug";
			$params = ['slug'=>$data];
		}

        $queryPrepared = $this->pdo->prepare($sql);
		$queryPrepared->execute($params);
        $result = $queryPrepared->fetch();

        $numberRow = $queryPrepared->rowCount();
        if($numberRow > 0){
            if(isset($_GET['Slug']) && !empty($_GET['Slug'])){

				$sql = "SELECT * FROM ".$this->table." WHERE Slug = :Slug";
				$params = ['Slug'=>$_GET['Slug']];
				$queryPrepared = $this->pdo->prepare($sql);
				$queryPrepared->execute($params);
				$dataSlug = $queryPrepared->fetch();

                if($dataSlug['Id'] == $result['Id']){
                    return true;
                }else{
                    return false;
                }
            }elseif(isset($_GET['id']) && !empty($_GET['id'])){
                $sql = "SELECT * FROM ".$this->table." WHERE Id = :Id";
				$params = ['Id'=>$_GET['id']];
				$queryPrepared = $this->pdo->prepare($sql);
				$queryPrepared->execute($params);
				$dataSlug = $queryPrepared->fetch();

                if($dataSlug['Id'] == $result['Id']){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }else{
            return true;
        }
    }
}