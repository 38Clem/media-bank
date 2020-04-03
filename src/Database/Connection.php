<?php


namespace App\Database;

use PDO;

class Connection
{
    private PDO $dbh;

    public function __construct()
    {

        $this->dbh = new PDO("mysql:host=localhost;dbname=media_bank;charset=utf8",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public function getConnection():PDO
    {
    return $this->dbh;
    }

}