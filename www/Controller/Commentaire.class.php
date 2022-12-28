<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Comment as CommentModel;
use App\Model\User;
use App\Core\Verificator;

class Commentaire
{
    public function index(): void
    {
        $v = new View("Page/Commentaire", "Back");
    }

    public function showComments(): void
    {
        $comment = new CommentModel();
        $comments = $comment->selectAll();
        $v = new View("Page/Commentaire", "Back");
        $v->assign("comments", $comments);
    }

    public function deleteComment(): void
    {
        if (isset($_GET['id']))
            $comment = new CommentModel();
        $comment->delete($_GET['id']);
        header("Location: /commentaire");
    }

    public function approveComment(): void
    {
        if (isset($_GET['approve'])) {
            $comment = new CommentModel();
            $data = $comment->findCommentById($_GET['approve']);
            $comment->setId($_GET['approve']);
            $comment->setStatus("approved");
            $comment->setAuthor($data['Author']);
            $comment->setContent($data['Content']);
            $today = date("Y-m-d");
			$comment->setDateCreated($today);
            $comment->setEmail($data['Email']);
            $comment->setCommentPostId($data['Comment_Post_Id']);
            $comment->save();
            header("Location: /commentaire");
        }
    }


    // public function saveComment(): void
    // {
    //     $comment = new CommentModel();
    //     //On regarde si l'id du commentaire existe 
    //     //si existe alors nous sommes dans un edit
    //     //si non nous somme dans la création
    //     if (isset($_GET['id']) || !empty($_GET['id'])) {
    //         $data = $comment->findCommentById($_GET["id"]);
    //         //Id -> vient de la bdd
    //         $comment->setId($data["Id"]);
    //     }
    //     if (isset($_POST['submit'])) {
    //         if (isset($_POST['editor']) && !empty($_POST['editor'])) {
    //             $comment->setContent($_POST['editor']);
    //             if (!($this->checkComment($comment->getContent()))) {
    //                 $comment->setActive(intval($_POST['active']));
    //                 if($comment->getActive() == 1){
    //                     $comment->setNbrSignalement(0);
    //                 }
    //                 $comment->setArticleId(1);
    //                 //save permet d'enregistrer dans la base de donner 
    //                 $comment->save();
    //                 header("Location: /Commentaire");
    //             } else {
    //                 echo "Votre commentaire contient un mot banni !";
    //             }
    //         }
    //     }
    //     if (isset($_POST['delete'])) {
    //         if (isset($_POST['editor']) && !empty($_POST['editor'])) {
    //             $comment->delete($_GET["id"]);
    //             header("Location: /Commentaire");
    //         }
    //     }
    //     $v = new View("Page/EditCommentaire", "Back");
    //     $v->assign("data", $data ?? []);
    // }


    public function motsbannis(): void
    {
        $comment = new CommentModel();
        $form = $comment->createMotBanForm();
        if(!empty($_POST)){
            $data = [];
            isset($_POST['word']) ? array_push($data, $_POST["word"]) : '';
            $verificator = new Verificator($form, $data);
            $verificator->verificatorEditionMotBanni($form, $_POST);
            $configFormErrors = $verificator->getMsg();

            if(empty($configFormErrors)){
                if (isset($_POST['submit'])) {
                        file_put_contents(getcwd() . "/banWords.txt", "\n".strip_tags($_POST['word']),FILE_APPEND);
                }
            }
        }
        $data = $this->getBanWords();
        $v = new View("Page/CommentaireMotsBannis", "Back");
        $v->assign("data", $data ?? []);
        $v->assign("configForm", $form);
        $v->assign("configFormErrors", $configFormErrors??[]);
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

    public function removeBanWord(): void
    {
        if (isset($_GET['word'])) {
            $file = getcwd() . "/banwords.txt";
            $contents = file_get_contents($file);
            $contents = str_replace($_GET['word'], '', $contents);
            file_put_contents($file, $contents);
            file_put_contents($file, implode(PHP_EOL, file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
            header("Location: /commentaire-mots-bannis");
        }
        $data = $this->getBanWords();
        $v = new View("Page/Commentaire", "Back");
        $v->assign("data", $data ?? []);
    }

    // public function signaler(): void
    // {
    //     $comment = new CommentModel();
    //     $commentData = $comment->findCommentById($_GET['id']);
    //     $comment->setId($commentData['Id']);
    //     $comment->setContent($commentData['Content']);
    //     $comment->setArticleId($commentData['Article_Id']);
    //     $comment->setNbrSignalement($commentData['Nbr_Signalement']+1);
    //     if($commentData['Nbr_Signalement'] >= 20){
    //         $comment->setActive(0);
    //     }else{
    //         $comment->setActive($commentData['Active']);
    //     }
    //     $comment->save();
    //     $v = new View("Page/Commentaire", "Back");
    // }
}
