<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Comment as CommentModel;
use App\Model\User;

class Commentaire
{
    public function index(): void
    {
        $v = new View("Page/Commentaire", "Back");
    }

    public function saveComment(): void
    {
        $user = new User();
        $comment = new CommentModel();
        $userData = $user->getUser(null, $_COOKIE['Email']);
        //On regarde si l'id du commentaire existe 
        //si existe alors nous sommes dans un edit
        //si non nous somme dans la création
        if (isset($_GET['id']) || !empty($_GET['id'])) {
            $data = $comment->findCommentById($_GET["id"]);
            //Id -> vient de la bdd
            $comment->setId($data["Id"]);
        }
        if (isset($_POST['submit'])) {
            if (isset($_POST['editor']) && !empty($_POST['editor'])) {
                $comment->setContent($_POST['editor']);
                if (!($this->checkComment($comment->getContent()))) {
                    $comment->setActive(0);
                    // $comment->setArticleId(1);
                    //save permet d'enregistrer dans la base de donner 
                    $comment->save();
                    header("Location: /Commentaire");
                } else {
                    echo "Votre commentaire contient un mot banni !";
                }
            }
        }
        if (isset($_POST['delete'])) {
            if (isset($_POST['editor']) && !empty($_POST['editor'])) {
                $comment->delete($_GET["id"]);
                header("Location: /Commentaire");
            }
        }
        $v = new View("Page/EditCommentaire", "Back");
        $v->assign("data", $data ?? []);
    }

    public function motsbannis(): void
    {
        $data=$this->getBanWords();
        if (isset($_POST['submit'])) {
            print_r(!empty($_POST['ajouter-mot']));
            if(isset($_POST['ajouter-mot']) && !empty($_POST['ajouter-mot'])){
                // print_r("Le mot a été ajouter dans la liste des mots bannis");
                file_put_contents(getcwd() . "/banWords.txt", "\n".$_POST['ajouter-mot'],FILE_APPEND);
            }
        }
        $v = new View("Page/CommentaireMotsBannis", "Back");
        $v->assign("data", $data ?? []);
    }


    public function checkComment(string $comment): bool
    {
        $comment = strip_tags($comment);
        $banWords = file(getcwd() . "/banWords.txt");

        foreach ($banWords as $banWord) {
            $banWord = trim($banWord);
            if (preg_match("/$banWord/", $comment)) {
                return true;
            }
        }
        return false;
    }


    public function getBanWords(): array
    {
        $banWords = file(getcwd() . "/banWords.txt");
        return $banWords;
    }
}
