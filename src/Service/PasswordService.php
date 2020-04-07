<?php


namespace App\Service;

use App\Database\Connection;
use App\Entity\Password;

class PasswordService
{

    public function save(Password $password){

        $connection = Connection::getConnection();

        $sth = $connection->prepare(
            "INSERT INTO `password`(`value`) VALUES (:password)");
        $sth->bindValue(
            ":password",
            password_hash($password->getValue(), PASSWORD_DEFAULT));
        $sth->execute();
        $password->setId($connection->lastInsertId());

    }

}