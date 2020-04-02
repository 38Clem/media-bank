<?php


namespace App\Form;


use App\Entity\Email;
use App\Entity\Password;
use App\Entity\User;

/**
 * Class UserForm
 * @package App\Form
 * Responsable de renqeigner les attributs de type primitif de User Entity
 * Il doit instancier EmailFrom et PasswordForm et leur donner l'entity concernée
 */
class UserForm
{
    private EmailForm $emailForm;
    private PasswordForm $passwordForm;
    private array $error = [
        "name" => false,
    ];
    private $submit = false;


    public function __construct()
    {


        if ($name === "") {
           $this->error["name"] = true;
        }

    }

    public function buildForm(User $user){

        $this->emailForm = new EmailForm($user->getEmail());
        $this->passwordForm = new PasswordForm($user->getPassword());
        $name = filter_input(INPUT_POST, "name");
        if (null !== $name) {
            $user->setName(filter_input(INPUT_POST, "name"));
        }

}

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * @return EmailForm
     */
    public function getEmailForm(): EmailForm
    {
        return $this->emailForm;
    }

    /**
     * @return PasswordForm
     */
    public function getPasswordForm(): PasswordForm
    {
        return $this->passwordForm;
    }



}