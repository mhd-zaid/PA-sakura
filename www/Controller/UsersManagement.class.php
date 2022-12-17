<?php

namespace App\Controller;

use App\Core\View;
use App\Model\User;

class UsersManagement
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['email'])) {
            header("Location: /se-connecter");
        } else {
            $v = new View("Page/UsersManagement", "Back");
            $user = new  User();
            $users = $user->getUsers();
            $v->assign("users", $users);
        }
    }
}
