<?php


namespace App\Form;


use App\Entity\Password;

/**
 * Class PasswordForm
 * @package App\Form
 * Responsable de renseigner les attributs de type primitif de Password Entity
 */
class PasswordForm
{
    private array $error = [
        "password" => "",
        "confirm" => "",
    ];

    public function __construct()
    {

    }

    public function controlPassword($value)
    {
        if ($value !== null) {
            if (6 > strlen($value) || strlen($value) > 24) {
                $this->error["password"] = "Your password must be between 6 and 24 characters ";
                return false;
            }
            return true;

        }
    }

    public function controlPasswordConfirm($confirmation, $value)
    {
        if (null !== $confirmation)
            if ($confirmation === "") {
                $this->error["confirm"] = "Confirmation Password is empty";
            } elseif ($confirmation !== $value) {
                $this->error["confirm"] = "Doesn't match with Password";
            } else {
                return true;
            }
    }


    public function fillPasswordForm(Password $password)
    {
        $value = filter_input(INPUT_POST, "password");
        $confirmation = filter_input(INPUT_POST, "password_confirmation");
        $controlPassword = $this->controlPassword($value);
        $controlConfirm = $this->controlPasswordConfirm($confirmation, $value);
        if ($controlPassword) {
            $password->setValue($value);
        }

    }

    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

}