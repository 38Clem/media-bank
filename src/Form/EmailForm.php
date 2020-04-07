<?php


namespace App\Form;


use App\Entity\Email;

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

    public function __construct()
    {
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
            $this->error["email"] = "Invalid email adress";
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

    /**
     * @param array $error
     */
    public function setError(array $error): void
    {
        $this->error = $error;
    }



    /**
     * @return array
     */
    public function getError(): array
    {
        return $this->error;
    }

}