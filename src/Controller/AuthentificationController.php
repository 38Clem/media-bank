<?php

namespace App\Controller;


use App\Entity\Email;
use App\Entity\Password;
use App\Form\EmailForm;
use App\Form\PasswordForm;
use App\Service\AuthentificationService;

class AuthentificationController
{

    public function __construct(){}

    public function logIn()
    {
        $email = new Email();
        $emailForm = new EmailForm();
        $emailForm->fillEntity($email);
        $emailForm->isValid();

        $password = new Password();
        $passwordForm = new PasswordForm();
        $passwordForm->fillEntity($password);
        $passwordForm->isValid();

        if($passwordForm->isValid() && $emailForm->isValid()){
            $authentification = new AuthentificationService();
            $authentification->getUser($email, $password);
        }
        include __DIR__ . "/../../templates/authentification/login.html.php";
    }

    public function logOut()
    {
        echo 'Log Out User';
    }
}
