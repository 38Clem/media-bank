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

    public function __construct()
    {

    }

    public function isSubmitted(): bool
    {
        return filter_input(INPUT_POST, "password") !== null;
    }


    public function isValidPassword(): bool
    {
        if (!$this->isSubmitted()) {
            return false;
        }
        $value = filter_input(INPUT_POST, "password");
        if (6 > strlen($value) || strlen($value) > 24) {
            $this->error["password"] = "Your password must be between 6 and 24 characters ";
            return false;
        }
        return true;
    }

    public function isValidConfirmation(): bool
    {
        $value = filter_input(INPUT_POST, "password");
        $confirmation = filter_input(INPUT_POST, "password_confirmation");
        if (!$this->isSubmitted()) {
            return false;
        }
        if ($confirmation === "") {
            $this->error["confirm"] = "Confirmation Password is empty";
            return false;
        } elseif ($confirmation !== $value) {
            $this->error["confirm"] = "Doesn't match with Password";
            return false;
        }
        return true;

    }


    public function fillEntity(Password $password)
    {
        if ($this->isSubmitted()) {
            $password->setValue(filter_input(INPUT_POST, "password"));
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