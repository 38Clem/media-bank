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

    public function __construct(User $user)
    {
        $this->emailForm = new EmailForm($user->getEmail());
        $this->passwordForm = new PasswordForm($user->getPassword());
    }

    public function isSubmitted(): bool
    {
        return filter_input(INPUT_POST, "name") !== null;
    }

    public function isValid(): bool
    {
        if (!$this->isSubmitted()) {
            return false;
        }
        $emailValid = $this->getEmailForm()->isValid();
        $passwordValid = $this->getPasswordForm()->isValidPassword();
        $confirmPasswordValid = $this->getPasswordForm()->isValidConfirmation();
        $name = filter_input(INPUT_POST, "name");
        if (3 > strlen($name) || strlen($name) > 12) {
            $this->error["name"] = "Your pseudo must be between 3 and 12 characters";
            return false;
        }
        if ($this->error["name"] || !$emailValid || !$passwordValid || !$confirmPasswordValid) {
            return false;
        }
        return true;


    }

    public function fillEntity(User $user)
    {
        $name = filter_input(INPUT_POST, "name");
        if ($this->isSubmitted()) {
            $user->setName($name);
        }
        $this->emailForm->fillEntity($user->getEmail());
        $this->passwordForm->fillEntity($user->getPassword());
    }

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

    /**
     * @param array $error
     */
    public function setError(array $error): void
    {
        $this->error = $error;
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