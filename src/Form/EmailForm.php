<?php


namespace App\Form;


use App\Entity\Email;
use App\Entity\User;

/**
 * Class EmailForm
 * @package App\Form
 * Responsable de renseigner les attributs de type primitif de Email Entity
 */
class EmailForm
{
    private array $error = [
        "email" => "",
    ];

    public function __construct()
    {
    }


    public function controlEmail($value)
    {
        if(null !== $value){
            if (filter_var($value, FILTER_VALIDATE_EMAIL) === false) {
                $this->error["email"] = "Invalid email adress";
            }else{
                return true;
            }
        }


    }

    public function fillEmailEntity(Email $email)
    {
        $value = filter_input(INPUT_POST, "email");
        if ($value !== null) {
            $control = $this->controlEmail($value);
            if($control){
                $email->setEmail($value);
            }

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