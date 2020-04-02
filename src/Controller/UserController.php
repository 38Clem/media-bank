<?php

namespace App\Controller;

use App\Entity\Email;
use App\Entity\User;
use App\Form\EmailForm;
use App\Form\UserForm;

class UserController
{

    public function createUser()
    {
        $user = new User();
        $userForm = new UserForm();
        $userForm->buildForm($user);
        $userForm->fillUser($user);
        include __DIR__ . "/../../templates/user/signup.html.php";
    }

    public function updateUser()
    {
        echo 'Update User';
    }

    public function suspendUser()
    {
        echo 'Suspend User';
    }
}

