<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Category as CategoryModel;
use App\Model\User;
use App\Model\Article;
use App\Core\Verificator;

class Category{
    public function index(){
        $v=new View("Page/Category", "Back");
    }

    public function saveCategory(){
        $user = new User();
        $userData = $user->getUser(null,$_COOKIE['Email']);
        if($userData['Role'] !== 3){
            $category = new CategoryModel();
            $form = $category->createCategoryForm();
        }else{
            header("Location: /category");
        }

        if(isset($_POST['submit'])){
            $article = new Article();
            $category = new CategoryModel();
            $dataCategory = $category->select();
            if(isset($_GET['id']) && !empty($_GET['id'])){
                $category->setId($_GET['id']);
            }

            $category->setTitre($_POST['titre']);
            $data = $article->selectAllCategoriesArticle();
            $search = $dataCategory['Titre'];

            foreach($data as $id=>$key ){
                if(preg_match("@$search@",$key['categories'])){

                    $replace = str_replace($search,$_POST['titre'],$key['categories']);

                    $articleUpdate = new Article();
                    $articleUpdate->setId($key['Id']);
                    $articleUpdate->setContent($key['Content']);
                    $articleUpdate->setSlug($key['Slug']);
                    $articleUpdate->setUserId($key['User_Id']);
                    $articleUpdate->setImageName($key['Image_Name']);
                    $articleUpdate->setActive($key['Active']);
                    $articleUpdate->setTitle($key['Title']);
                    $articleUpdate->setRewriteUrl($key['Rewrite_Url']);
                    $articleUpdate->setCategories($replace);
                    $articleUpdate->save();
                }
            }
            $category->save();
            header("Location: /category");
        }

        if(isset($_POST['delete'])){
            $article = new Article();
            $data = $article->selectAllCategoriesArticle();
            $category = new CategoryModel();
            $dataCategory = $category->select();
            $search = $dataCategory['Titre'];


            foreach($data as $id=>$key ){
                if(preg_match("@$search@",$key['categories'])){
                    $replace = str_replace($search,'',$key['categories']);
                    $array = explode(',',$replace);
                    $newArray = array_filter($array);
                    $articleUpdate = new Article();
                    $articleUpdate->setId($key['Id']);
                    $articleUpdate->setContent($key['Content']);
                    $articleUpdate->setSlug($key['Slug']);
                    $articleUpdate->setUserId($key['User_Id']);
                    $articleUpdate->setImageName($key['Image_Name']);
                    $articleUpdate->setActive($key['Active']);
                    $articleUpdate->setTitle($key['Title']);
                    $articleUpdate->setRewriteUrl($key['Rewrite_Url']);
                    $articleUpdate->setCategories(implode(',',$newArray));
                    $articleUpdate->save();
                }
            }
            $category->delete($_GET['id']);
            header("Location: /category");
        }
        $v=new View("Page/EditCategory", "Back");
        $v->assign("configForm", $form);
    }

}