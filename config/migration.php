<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Database\Connection;



/**
 * Statement Handler
 * @var PDOStatement
 */

$connection = Connection::getConnection();

try {
    $sth = $connection->prepare(file_get_contents(
        __DIR__ . "/../media_bank.sql"));
    $sth->execute();
    echo "\033[01;32m success \033[0m";
} catch (Throwable $e) {
    echo "\033[01;31m $e \033[0m";
}

