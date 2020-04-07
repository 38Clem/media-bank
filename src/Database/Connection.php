<?php


namespace App\Database;

use PDO;

class Connection
{
    private static PDO $dbh;
    private static bool $off = true;

    private function __construct()
    {

        Connection::$dbh = new PDO("mysql:host=localhost;dbname=media_bank;charset=utf8",
        "root",
        "",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    public static function getConnection():PDO
    {
        if(Connection::$off){
           new Connection();
           Connection::$off = false;
        }
    return Connection::$dbh;
    }

}