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

    /**
     * @param User $user
     * @throws Throwable
     * @throws UserNameExistsException
     */

    public function save(User $user){
        $this->emailService = new EmailService();
        $this->passwordService = new PasswordService();

        $connection = Connection::getConnection();
        $connection->beginTransaction();
        try {

            $this->passwordService->save($user->getPassword());
            $this->emailService->save($user->getEmail());

            $sth = $connection->prepare(
                "INSERT INTO `user`(
                    `name`, `email`, `password`
                    ) VALUES (:name,:email,:password)"
            );

            $sth->bindValue(":name", $user->getName());
            $sth->bindValue(":email", $user->getEmail()->getId());
            $sth->bindValue(":password", $user->getPassword()->getId());
            $sth->execute();

            $user->setId($connection->lastInsertId());

            $connection->commit();

        }catch (Throwable $e){

            $connection->rollBack();
            throw $e->getCode() === "23000" ? new UserNameExistsException(ServiceInterface::ERROR_ALREADY_EXIST) : $e;
        }

    }

}