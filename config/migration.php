<?php

$str = file_get_contents("./media_bank.sql");

$host = "localhost";
$dbname = "media_bank";
$port = "3306";
$charset = "utf8";

$user = "root";
$password = "";

$dbh = new PDO (
    "mysql:host=$host;dbname=$dbname;charset=$charset",
    $user,
    $password,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);


/**
 * Statement Handler
 * @var PDOStatement
 */

$sth = $dbh->prepare($str);

try {
    $sth->execute();
    echo "\033[01;32m success \033[0m";
} catch (Throwable $e) {
    echo "\033[01;31m $e \033[0m";
}

