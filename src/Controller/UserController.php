<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserForm;
use App\Service\UserService;
use Throwable;

class UserController
{

    public function createUser()
    {
        $user = new User();
        $userForm = new UserForm($user);
        $userForm->fillEntity($user);

        if ($userForm->isValid()) {

            $userService = new UserService();

            try {

                $userService->save($user);

            } catch (Throwable $e) {
                var_dump($e->getCode());
                if($e->getCode() === 1){
                    $userForm->getEmailForm()->setError(["email" => "Email already exists"]);
                }elseif ($e->getCode() === 2){
                    $userForm->setError(["name" => "Pseudo already exists"]);
                }

            }
        }
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

