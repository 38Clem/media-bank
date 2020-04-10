<?php


namespace App\Form;


use App\Entity\Email;

/**
 * Class EmailForm
 * @package App\Form
 * Responsable de renseigner les attributs de type primitif de Email Entity
 */
class EmailForm extends Form implements FormInterface
{


    public function __construct()
    {
        parent::__construct();
        $this->error["email"] = null;
    }

    public function isSubmitted(): bool
    {
        return filter_input(INPUT_POST, "email") !== null;
    }

    public function isValid(): bool
    {
        if (!$this->isSubmitted()) {
            return false;
        }
        $value = filter_input(INPUT_POST, "email");

        if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
            $this->error["email"] = FormInterface::ERROR_EMAIL;
            return false;
        }
        return true;


    }

    public function fillEntity(Email $email)
    {
        if ($this->isSubmitted()) {
            $email->setEmail(filter_input(INPUT_POST, "email"));
            $this->isValid();
        }
    }



}