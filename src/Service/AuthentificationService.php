<?php

namespace App\Service;

use App\Database\Connection;
use App\Entity\Email;
use App\Entity\Password;
use App\Entity\User;
use App\Service\Exception\AuthentificationException;

class AuthentificationService
{

    private User $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUser(Email $email, Password $password): User
    {
        if (!$this->user->getName() || $this->user->getEmail()->getEmail() !== $email->getEmail()) {
            $this->user->setEmail($email);
            $this->user->setPassword($password);
            if (!$this->checkCredentials()) {
                throw new AuthentificationException();
            }
        }
        return $this->user;
    }

    public function checkCredentials(): bool
    {
        $result = $this->findUserByEmail($this->user->getEmail()->getEmail());
        if (!$result || !password_verify($this->user->getPassword()->getValue(), $result["value"])) {
            return false;
        }
        $this->user->setId($result["id"]);
        $this->user->setName($result["name"]);
        $this->user->getPassword()->setValue($result["value"]);
        return true;
    }

    public function findUserByEmail(string $email)
    {
        $sth = Connection::getConnection()->prepare(
            "SELECT `user`.`id`,`user`.`name`,`password`.`value` FROM `user` "
            . "JOIN `email` ON `user`.`email` = `email`.`id` "
            . "JOIN `password` ON `user`.`password` = `password`.`id` "
            . "WHERE `email`.`value` = :email"
        );
        $sth->bindValue(":email", $email);
        $sth->execute();
        return $sth->fetch(\PDO::FETCH_ASSOC);
    }

}