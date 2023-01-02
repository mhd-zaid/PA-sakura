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
    private static $instance;

    
    /**
     * @return object
     */
    public static function getInstance(): object
    {
        if (is_null(self::$instance)) {
			self::$instance = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=3306" ,DB_USER ,DB_PASSWD,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1"));

			self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    		self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }
        return self::$instance;
    }

	public function __construct()
	{
		if (file_exists(__DIR__."/../config.php")) {
            include_once __DIR__."/../config.php";
        }
        //Connexion avec la bdd
		try{
			$this->pdo = $this::getInstance();

		}catch(\Exception $e){
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

	public function select()
	{
		$sql = "SELECT * FROM ".$this->table;
        $result = $this->pdo->query($sql);
        $data = $result->fetchAll();
		return $data;
	}

	public function selectAll()
	{
		$sql = "SELECT * FROM $this->table";
		return $result = $this->pdo->query($sql)->fetchAll();
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
		if((get_class($this) == Article::class) || (get_class($this) == Page::class)){

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
		}elseif((get_class($this) == Category::class) || get_class($this) === User::class || get_class($this) == Comment::class){
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

		if($context === 'Email'){
			$user = new User();
			$userInfo = $user->getUser($_COOKIE['JWT']);
			$sql = "SELECT * FROM ".$this->table." WHERE Email = :Email AND Id!= :id";
			$params = ['Email'=>$data, "id"=>$userInfo['Id']];
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

	public function find(){
        if(!empty($_GET['Slug'])){
            $slug = $_GET['Slug'];
            $sql = "SELECT * FROM ".$this->table." WHERE Slug =:Slug";
            $params = ['Slug'=>$slug];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
            $data = $queryPrepared->fetch();
            if(empty($data)){
                header("Location: /page");
            }
        }elseif(!empty($_GET['id'])){
            $sql = "SELECT * FROM ".$this->table." WHERE id =:id";
            $params = ['id'=>$_GET['id']];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
            $data = $queryPrepared->fetch();
            if(empty($data)){
                header("Location: /page");
            }
        }else{
            return null;
        }
        return $data;
    }

	public function findRewriteUrl(){ 
        $sql = "SELECT Rewrite_Url FROM ".$this->table." WHERE Rewrite_Url =:Rewrite_Url";
        $params = ['Rewrite_Url'=>'1'];
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);
        $result = $queryPrepared->fetch();
        return $queryPrepared->rowCount();
    }

	public function updateRewriteUrl(Int $choice){
        $sql = "Update ".$this->table." SET Rewrite_Url=:Rewrite_Url";
        $params = ['Rewrite_Url'=>$choice];
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);
    }

	public function delete():void{
        if(!empty($_GET['Slug'])){
            $slug = $_GET['Slug'];
            $sql = "DELETE  FROM ".$this->table." WHERE Slug =:Slug";
            $params = ['Slug'=>$slug];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
        }elseif(!empty($_GET['id'])){
            $sql = "DELETE  FROM ".$this->table." WHERE id =:id";
            $params = ['id'=>$_GET['id']];
            $queryPrepared = $this->pdo->prepare($sql);
            $queryPrepared->execute($params);
        }else{
        }
    }

	public function isExist($value){
        $sql = "SELECT * FROM " .$this->table. " WHERE Title=:title";
        $params = ['title'=>$value];
        $queryPrepared = $this->pdo->prepare($sql);
        $queryPrepared->execute($params);

        if($queryPrepared->rowCount() > 0 ){
            return true;
        }
        return false;
    }

	public function slugify($text, string $divider = '-')
    {
    // replace non letter or digits by divider
    $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

    // transliterate
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

    // remove unwanted characters
    $text = preg_replace('~[^-\w]+~', '', $text);

    // trim
    $text = trim($text, $divider);

    // remove duplicate divider
    $text = preg_replace('~-+~', $divider, $text);

    // lowercase
    $text = strtolower($text);

    if (empty($text)) {
        return 'n-a';
    }

	return $text;
	}
}