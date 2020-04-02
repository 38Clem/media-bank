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

    public function fillPasswordEntity(Password $password){
        $value = filter_input(INPUT_POST,"password");
        $confirmation = filter_input(INPUT_POST,"password_confirmation");
        if($value !== null){
            $password->setValue(filter_input(
                INPUT_POST,
                "password"
            ));
            if("" === $value){
                $this->error["password"] = "Your password must be between 6 and 24 characters ";
            }
        }

        if($value !== $confirmation){
            $this->error["confirm"] = "Confirmation Password doesn't match Password";
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