<?php


namespace App\Service;

use App\Database\Connection;
use App\Entity\Email;
use App\Service\Exception\EmailExistsException;

class EmailService
{

    /**
     * @param Email $email
     * @throws EmailExistsException
     */

    public function save(Email $email){

        $connection = Connection::getConnection();

        try{
            $sth = $connection->prepare(
                "INSERT INTO `email`(`value`) VALUES (:email)"
            );
            $sth->bindValue(":email", $email->getEmail());
            $sth->execute();
            $email->setId($connection->lastInsertId());

        }catch (\PDOException $e){

            throw $e->getCode() === "23000" ? new EmailExistsException("Email already exist") : $e;

        }
    }

}