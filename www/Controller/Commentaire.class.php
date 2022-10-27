<?php

namespace App\Controller;

use App\Core\View;
use App\Model\Comment as CommentModel;
use App\Model\User;

class Commentaire
{
    public function index()
    {
        $v = new View("Page/Commentaire", "Back");
    }

    public function saveComment()
    {
        $user = new User();
        $comment = new CommentModel();
        $userData = $user->getUser(null,$_COOKIE['Email']);
        if(isset($_POST['submit'])){
            if(isset($_POST['editor']) && !empty($_POST['editor'])){
                $comment->setContent($_POST['editor']);
                $comment->setUserId($userData['Id']);
                $comment->save();
                header("Location: /Commentaire");
             }
             
        }   


        
        $v = new View("Page/EditCommentaire", "Back");
    }







    public function motsbannis()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header("Location: /se-connecter");
        } else {
            $v = new View("Page/CommentaireMotsBannis", "Back");
        }
    }
}
