<?php


namespace App\Database;

use PDO;
use stdClass;

class Connection
{
    private static PDO $dbh;
    private static bool $off = true;
    private stdClass $database;

    private function __construct()
    {

        $this->database = json_decode(file_get_contents(__DIR__ . "/../../config/database.json"));

        Connection::$dbh = new PDO(
            $this->database->driver.":"
            ."dbname=".$this->database->dbname.";"
            ."host=".$this->database->host.";"
            ."port=".$this->database->port.";"
            ."charset=".$this->database->charset,
            $this->database->user,
            $this->database->password,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);

        Connection::$off = !Connection::$off;
    }

    public static function getConnection(): PDO
    {
        if (Connection::$off) {
            new Connection();
        }
        return Connection::$dbh;
    }

}