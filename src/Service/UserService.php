<?php


namespace App\Service;

use App\Entity\User;
use App\Service\Exception\UserNameExistsException;
use Throwable;
use App\Database\Connection;

class UserService
{
    private EmailService $emailService;
    private PasswordService $passwordService;

    public function save(User $user){
        $this->emailService = new EmailService();
        $this->passwordService = new PasswordService();

        $connection = new Connection();
        $connection->getConnection()->beginTransaction();
        try {
            $this->passwordService->save($user->getPassword());
            $this->emailService->save($user->getEmail());

            $sth = $connection->getConnection()->prepare(
                "INSERT INTO `user`(
                    `name`, `email`, `password`
                    ) VALUES (:name,:email,:password)"
            );

            $sth->bindValue(":name", $user->getName());
            $sth->bindValue(":email", $user->getEmail()->getId());
            $sth->bindValue(":password", $user->getPassword()->getId());
            $sth->execute();

            $user->setId($connection->getConnection()->lastInsertId());

            $connection->getConnection()->commit();

        }catch (Throwable $e){
            if($e->getCode() === "23000"){
                $connection->getConnection()->rollBack();
                throw new UserNameExistsException("Pseudo already exists");
            }
            $connection->getConnection()->rollBack();
            throw $e;
        }

    }

}