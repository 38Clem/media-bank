<?php

namespace App\Controller;


use App\Entity\Email;
use App\Entity\Password;
use App\Form\EmailForm;
use App\Form\PasswordForm;
use App\Service\AuthentificationService;
use App\Service\Exception\AuthentificationException;
use App\Service\ServiceInterface;

class AuthentificationController
{

    public function __construct(){}

    public function logIn()
    {
        session_start();

        if(array_key_exists("user", $_SESSION)){
            header("Location: /");
            exit;
        }
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
            try{
                $_SESSION["user"] = $authentification->getUser($email, $password);;
                header("Location: /");
                exit;
            }catch (AuthentificationException $e){
                $emailForm->setError(["email" => ServiceInterface::ERROR_INVALID_USER]);
            }

        }
        include __DIR__ . "/../../templates/authentification/login.html.php";
    }

    public function logOut()
    {
        session_start();
        include __DIR__ . "/../../templates/authentification/logout.html.php";
    }
}
