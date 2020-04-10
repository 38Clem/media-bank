<?php


namespace App\Form;


use App\Entity\Password;

/**
 * Class PasswordForm
 * @package App\Form
 * Responsable de renseigner les attributs de type primitif de Password Entity
 */
class PasswordForm extends Form implements FormInterface
{

    public function __construct()
    {
        parent::__construct();
        $this->error["password"] = null;
        $this->error["confirm"] = null;

    }

    public function isSubmitted(): bool
    {
        return filter_input(INPUT_POST, "password") !== null;
    }


    public function isValid(): bool
    {
        if (!$this->isSubmitted()) {
            return false;
        }
        $value = filter_input(INPUT_POST, "password");
        $confirmation = filter_input(INPUT_POST, "password_confirmation");
        if (6 > strlen($value) || strlen($value) > 24) {
            $this->error["password"] = FormInterface::ERROR_PASSWORD;
            return false;
        }
        if($confirmation){
            if ($confirmation === "") {
                $this->error["confirm"] = FormInterface::ERROR_BLANK;
                return false;
            } elseif ($confirmation !== $value) {
                $this->error["confirm"] = FormInterface::ERROR_CONFIRM_PASSWORD;
                return false;
            }
        }
        return true;
    }



    public function fillEntity(Password $password)
    {
        if ($this->isSubmitted()) {
            $password->setValue(filter_input(INPUT_POST, "password"));
        }

    }

}