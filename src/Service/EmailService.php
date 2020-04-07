<?php


namespace App\Service;

use App\Database\Connection;
use App\Entity\Email;
use App\Service\Exception\EmailExistsException;

class EmailService
{

    public function save(Email $email){

        $connection = new Connection();

        try{
            $sth = $connection->getConnection()->prepare(
                "INSERT INTO `email`(`value`) VALUES (:email)"
            );
            $sth->bindValue(":email", $email->getEmail());
            $sth->execute();
            $email->setId($connection->getConnection()->lastInsertId());

        }catch (\PDOException $e){
            if($e->getCode() === "23000"){
                throw new EmailExistsException("Email already exist");
            }
            throw $e;

        }
    }

}