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
        "password" => false,
        "confirm" => false,
    ];

    public function __construct(Password $password)
    {
        $value = filter_input(INPUT_POST,"password");
        $confirmation = filter_input(INPUT_POST,"password_confirmation");
        if($value !== null){
            $password->setValue(filter_input(
                INPUT_POST,
                "password"
            ));

        }

        if("" === $value){
            $this->error["password"] = true;
        }

        if("" === $confirmation){
            $this->error["confirm"] = true;
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