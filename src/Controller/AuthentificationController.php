<?php
namespace App\Controller;

class AuthentificationController
{

    public function logIn()
    {
        include __DIR__ . "/../../templates/authentification/login.html.php";
    }

    public function logOut()
    {
        echo 'Log Out User';
    }
}
