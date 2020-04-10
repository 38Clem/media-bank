<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserForm;
use App\Service\Exception\EmailExistsException;
use App\Service\Exception\UserNameExistsException;
use App\Service\UserService;
use Throwable;

class UserController
{

    public function __construct(){}

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
                if($e instanceof EmailExistsException){
                    $userForm->getEmailForm()->setError(["email" => $e->getMessage()]);
                }elseif ($e instanceof UserNameExistsException){
                    $userForm->setError(["name" => $e->getMessage()]);
                }else{
                    throw $e;
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

