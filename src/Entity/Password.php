<?php 

namespace App\Entity;

class Password{
    
    private int $id;
    private string $value;
    private PasswordToken $passwordToken;
   
    public function __construct(){

        $this->value = "";
        $this->passwordToken =  new PasswordToken();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    /**
     * @return PasswordToken
     */
    public function getPasswordToken(): PasswordToken
    {
        return $this->passwordToken;
    }

    /**
     * @param PasswordToken $passwordToken
     */
    public function setPasswordToken(PasswordToken $passwordToken): void
    {
        $this->passwordToken = $passwordToken;
    }
}