<?php

namespace App\Core;

use App\Vendor\DataTable\SSP;
use App\Core\QueryBuilderMySQL;
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
    protected $queryBuilder;
    private static $instance;


    /**
     * @return object
     */
    public static function getInstance(): object
    {
        if (is_null(self::$instance)) {
            self::$instance = new \PDO(DB_ENGINE . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=3306", DB_USER, DB_PASSWD, array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES latin1"));

            self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        }
        return self::$instance;
    }

    public function __construct()
    {
        if (file_exists(__DIR__ . "/../config.php")) {
            include_once __DIR__ . "/../config.php";
        }
        //Connexion avec la bdd
        try {
            $this->pdo = $this::getInstance();
        } catch (\Exception $e) {
            die("Erreur SQL " . $e->getMessage());
        }
        switch (DB_ENGINE) {
            case 'mysql':
                $this->queryBuilder =  new QueryBuilderMySQL($this->pdo);
                break;
            case 'pgsql':
                $this->queryBuilder =  new QueryBuilderMySQL($this->pdo);
                break;
            default:

                break;
        }
        $CalledClassExploded = explode("\\", get_called_class());
        $this->table = strtolower("sakura_" . end($CalledClassExploded));
    }


    //Insert et Update
    public function save(): void
    {

        $objectVars = get_object_vars($this);
        $classVars = get_class_vars(get_class());
        $columns = array_diff_key($objectVars, $classVars);

        if (is_null($this->getId())) {
            $sql = ($this->queryBuilder)->from($this->table)->insert(array_keys($columns));
        } else {

            foreach ($columns as $column => $value) {
                $sqlUpdate[] = $column . "=:" . $column;
            }

            $sql = ($this->queryBuilder)->update($sqlUpdate)->from($this->table)->where("id=" . $this->getId());
        }
        $sql->params($columns)->execute();
    }

    public function select()
    {
        $sql = ($this->queryBuilder)->select()->from($this->table);
        $result = $sql->execute();
        $data = $result->fetchAll();
        return $data;
    }

    public function selectLimit()
    {
        $sql = ($this->queryBuilder)->select()->from($this->table)->limit(1, 2, 3, 4);
        $result = $sql->execute();
        $data = $result->fetchAll();
        return $data;
    }

    public function serverProcessing()
    {

        $objectVars = get_object_vars($this);
        $classVars = get_class_vars(get_class());
        $columns = array_diff_key($objectVars, $classVars);
        $arrColumns = [['db' => 'Id', 'dt' => 'Id']];
        foreach ($columns as $key => $col) {
            $arrColumns[] = ['db' => $key, 'dt' => $key];
        }
        $user = new User();
        if ((get_class($this) == Article::class) || (get_class($this) == Page::class)) {

            $dataTable = SSP::simple($_GET, $this->pdo, $this->table, 'Id', $arrColumns);

            foreach ($dataTable['data'] as $data => &$value) {

                preg_replace('/%u([0-9A-F]+)/', '&#x$1;', $value['content']);
                html_entity_decode($value['content'], ENT_COMPAT, 'UTF-8');

                if ($value['active'] == 0) {
                    $value['active'] = "Brouillon";
                }
                if ($value['active'] == 1) {
                    $value['active'] = "Publié";
                }
                if (isset($value['user_id'])) {
                    $value['user_id'] = $user->getNameUserId($value['user_id']);
                }
            }
            echo json_encode($dataTable);
        } elseif ((get_class($this) == Category::class) || get_class($this) === User::class || get_class($this) == Comment::class) {
            $dataTable = SSP::simple($_GET, $this->pdo, $this->table, 'id', $arrColumns);
            echo json_encode($dataTable);
        }
    }

    public function isUnique(String $context, String $data)
    {
        if ($context === 'Title') {

            $params = ['Title' => $data];
            $sql = ($this->queryBuilder)->select()->from($this->table)->where("Title = :Title")->params($params);
        }
        if ($context === 'slug') {

            $params = ['slug' => $data];
            $sql = ($this->queryBuilder)->select()->from($this->table)->where("slug = :slug")->params($params);
        }

        if ($context === 'Email') {
            $user = new User();
            $userInfo = $user->getUser($_COOKIE['JWT']);

            $params = ['Email' => $data, "id" => $userInfo['Id']];
            $sql = ($this->queryBuilder)->select()->from($this->table)->where("Email = :Email")->andWhere("Id != :id")->params($params);
        }

        $queryPrepared = $sql->execute();
        $result = $queryPrepared->fetch();

        $numberRow = $queryPrepared->rowCount();
        if ($numberRow > 0) {
            if (isset($_GET['Slug']) && !empty($_GET['Slug'])) {

                $params = ['Slug' => $_GET['Slug']];
                $sql = ($this->queryBuilder)->select()->from($this->table)->where("Slug = :Slug")->params($params);

                $queryPrepared = $sql->execute();
                $dataSlug = $queryPrepared->fetch();

                if ($dataSlug['Id'] == $result['Id']) {
                    return true;
                } else {
                    return false;
                }
            } elseif (isset($_GET['id']) && !empty($_GET['id'])) {

                $params = ['Id' => $_GET['id']];
                $sql = ($this->queryBuilder)->select()->from($this->table)->where("Id = :Id")->params($params);

                $queryPrepared = $sql->execute();
                $dataSlug = $queryPrepared->fetch();

                if ($dataSlug['Id'] == $result['Id']) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return true;
        }
    }

    public function find()
    {
        if (!empty($_GET['Slug'])) {
            $slug = $_GET['Slug'];

            $params = ['Slug' => $slug];
            $sql = ($this->queryBuilder)->select()->from($this->table)->where("Slug =:Slug")->params($params);

            $queryPrepared = $sql->execute();
            $data = $queryPrepared->fetch();
            if (empty($data)) {
                require "View/Site/404.view.php";
                die;
            }
        } elseif (!empty($_GET['id'])) {
            $params = ['id' => $_GET['id']];
            $sql = ($this->queryBuilder)->select()->from($this->table)->where("id =:id")->params($params);

            $queryPrepared = $sql->execute();
            $data = $queryPrepared->fetch();
            if (empty($data)) {
                require "View/Site/404.view.php";
                die;
            }
        } else {
            return null;
        }
        return $data;
    }

    public function findRewriteUrl()
    {

        $params = ['Rewrite_Url' => '1'];
        $sql = ($this->queryBuilder)->select("Rewrite_Url")->from($this->table)->where("Rewrite_Url =:Rewrite_Url")->params($params);

        $queryPrepared = $sql->execute();
        $result = $queryPrepared->fetch();
        return $queryPrepared->rowCount();
    }

    public function updateRewriteUrl(Int $choice)
    {

        $params = ['Rewrite_Url' => $choice];
        $sql = ($this->queryBuilder)->update(["Rewrite_Url = :Rewrite_Url"])->from($this->table)->params($params);
        $sql->execute();
    }

    public function delete(): void
    {
        if (!empty($_GET['Slug'])) {
            $slug = $_GET['Slug'];
            $params = ['Slug' => $slug];
            $sql = ($this->queryBuilder)->delete()->from($this->table)->where("Slug =:Slug")->params($params);
            $sql->execute();
        } elseif (!empty($_GET['id'])) {
            $params = ['id' => $_GET['id']];
            $sql = ($this->queryBuilder)->delete()->from($this->table)->where("Id =:id")->params($params);
            var_dump($sql->__toString());
            $sql->execute();
        } else {
        }
    }

    public function isExist($value)
    {

        $params = ['title' => $value];
        $sql = ($this->queryBuilder)->select()->from($this->table)->where("Title=:title")->params($params);
        $queryPrepared = $sql->execute();


        if ($queryPrepared->rowCount() > 0) {
            return true;
        }
        return false;
    }

    public function isActive($value)
    {

        $params = ['title' => $value];
        $sql = ($this->queryBuilder)->select()->from($this->table)->where("Title=:title")->params($params);
        $queryPrepared = $sql->execute();
        $data = $queryPrepared->fetch();

        if ($data['Active']) {
            return true;
        }
        return false;
    }

    public function selectAllActive()
    {
        $params = ['active' => 1];
        $sql = ($this->queryBuilder)->select("*")->from($this->table)->where("Active=:active")->params($params)->execute();

        return $sql->fetchAll();
    }

    public function getActivePage()
    {
        $params = ['active' => 1];
        $sql = ($this->queryBuilder)->select("*")->from($this->table)->where("Active=:active")->params($params)->execute();
        $data =  $sql->fetchAll();
        return $data;
    }

    public function slugify($text, string $divider = '-')
    {

        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        $text = preg_replace('~[^-\w]+~', '', $text);

        $text = trim($text, $divider);

        $text = preg_replace('~-+~', $divider, $text);

        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function getAllPostActive(): array
    {
        $params = ['active' => 1];
        $sql = ($this->queryBuilder)->select("Slug")->from($this->table)->where("Active=:active")->params($params)->execute();
        $data =  $sql->fetchAll();
        $arraySlug = [];
        foreach ($data as $k => $v) {
            $arraySlug[] = $v[0];
        }
        return $arraySlug;
    }
}
