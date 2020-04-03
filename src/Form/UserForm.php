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
        "name" => "",
    ];

    public function __construct()
    {
    }


    public function buildForm(User $user)
    {

        $this->emailForm = new EmailForm($user->getEmail());
        $this->passwordForm = new PasswordForm($user->getPassword());

    }

    public function controlUser($name)
    {
        if (null !== $name){
           if(3 > strlen($name) || strlen($name) > 12) {
                $this->error["name"] = "Your pseudo must be between 3 and 12 characters";
                return false;
            }
           return true;

        }

    }

    public function fillUser(User $user){
        $name = filter_input(INPUT_POST, "name");
        $control = $this->controlUser($name);
        if($control){
            $user->setName($name);
        }
        $this->emailForm->fillEmailEntity($user->getEmail());
        $this->passwordForm->fillPasswordForm($user->getPassword());
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