<?php

namespace App\Controller;


use App\Entity\Email;
use App\Entity\Password;
use App\Form\EmailForm;
use App\Form\PasswordForm;

class AuthentificationController
{

    public function logIn()
    {
        $emailForm = new EmailForm();
        $emailForm->isValid();

        $passwordForm = new PasswordForm();
        $passwordForm->isValidPassword();

        include __DIR__ . "/../../templates/authentification/login.html.php";
    }

    public function logOut()
    {
        echo 'Log Out User';
    }
}
