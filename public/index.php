<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 *
 */

$url = filter_input(
    INPUT_SERVER,
    "REDIRECT_URI")
    ? filter_input(
        INPUT_SERVER,
        "REDIRECT_URI")
    : filter_input(
        INPUT_SERVER,
        "PATH_INFO");

/**
 *
 */
$routes = json_decode(file_get_contents(__DIR__ . "/../config/route.json"));


if ($routes === null) {
    die("invalid route" . json_last_error_msg());
}


try {

    if (!property_exists($routes, $url)) {
        $url = "/404";
    };

    (new $routes->$url->controller)->{$routes->$url->method}();

} catch (Throwable $e) {

    $filePath = __DIR__ . "/../var/log/" . date("Y-m-d") . ".error.log";

    file_put_contents(
        $filePath,
        (file_exists($filePath) ? file_get_contents($filePath):  "") . date("H\h i\m s\s:")
        . " "
        . $e->getMessage()
        . " "
        . $e->getFile()
        . ": "
        . $e->getLine()
        . "."
        . "\n"
    );

    (new $routes->{"/500"}->controller)->{$routes->{"/500"}->method}();
}
