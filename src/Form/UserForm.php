<?php


namespace App\Form;


use App\Entity\User;

/**
 * Class UserForm
 * @package App\Form
 * Responsable de renseigner les attributs de type primitif de User Entity
 * Il doit instancier EmailFrom et PasswordForm et leur donner l'entity concernée
 */
class UserForm extends Form implements FormInterface
{
    private EmailForm $emailForm;
    private PasswordForm $passwordForm;


    public function __construct()
    {
        parent::__construct();
        $this->error["name"] = false;
        $this->emailForm = new EmailForm();
        $this->passwordForm = new PasswordForm();
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
        $passwordValid = $this->getPasswordForm()->isValid(true);
        $name = filter_input(INPUT_POST, "name");
        if (3 > strlen($name) || strlen($name) > 12) {
            $this->error["name"] = FormInterface::ERROR_FORMAT_NAME;
            return false;
        }
        if ($this->error["name"] || !$emailValid || !$passwordValid) {
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