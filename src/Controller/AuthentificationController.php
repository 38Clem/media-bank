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
        $email = filter_input(INPUT_POST, "email");
        $emailForm = new EmailForm();
        $emailForm->controlEmail($email);

        $password = filter_input(INPUT_POST, "password");
        $passwordForm = new PasswordForm();
        $passwordForm->controlPassword($password);


        include __DIR__ . "/../../templates/authentification/login.html.php";
    }

    public function logOut()
    {
        echo 'Log Out User';
    }
}
