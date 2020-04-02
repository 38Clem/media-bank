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

    public function fillEmailEntity(Email $email){

        $value = filter_input(INPUT_POST, "email");
        if ($value !== null) {
            $email->setEmail(filter_input(
                INPUT_POST,
                "email"
            ));

        if("" === $value){
            $this->error["email"] = "Invalid email adress";
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