<?php


namespace App\Service;


use App\Database\Connection;
use App\Entity\Email;
use App\Entity\Password;
use PDOException;
use PDO;


class AuthentificationService
{

    public function __construct(){}

    public function getUser(Email $email, Password $password)
    {
        $connection = Connection::getConnection();

        try {
            $sth = $connection->prepare('SELECT * FROM user 
            INNER JOIN email ON user.email = email.id
            INNER JOIN password ON user.password = password.id 
            WHERE email.value = :email
');
            $sth->bindValue(':email', $email->getEmail());
            $sth->execute();
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            var_dump($result);

        } catch (PDOException $e) {
            var_dump($e);
        };

    }

    public function checkCredentials()
    {
    }


}