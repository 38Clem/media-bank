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
        "email" => false,
    ];

    public function __construct(Email $email)
    {
        $value = filter_input(INPUT_POST, "email");
        if ($value !== null) {
            $email->setEmail(filter_input(
                INPUT_POST,
                "email"
            ));
        }
        if("" === $value){
            $this->error["email"] = true;
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