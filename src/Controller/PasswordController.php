<?php
namespace App\Controller;

class PasswordController
{

    public function forgotPassword()
    {
        session_start();
        echo 'Forgot Password, send email pls';
    }
}
