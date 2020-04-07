<?php

require __DIR__ . '/../vendor/autoload.php';


$url = "/home";
$redirecturl =filter_input(
    INPUT_SERVER,
    "REDIRECT_URI");
$pathinfo =filter_input(
    INPUT_SERVER,
    "PATH_INFO");

if ($redirecturl) {
    $url = redirecturl;
} elseif ($pathinfo) {
    $url = $pathinfo;
}




$obj = null;

try {
    foreach ($routes as $key => $value) {

        if ($url === $key) {
            $obj = new $value["controller"];
            $methodName = $value["method"];
            $obj->$methodName();
        }
    }

    if (!$obj) {
        $obj = new $routes["/404"]["controller"];
        $methodName = $routes["/404"]["method"];
        $obj->$methodName();
    }

} catch (Throwable $e) {
    $obj = new $routes["/500"]["controller"];
    $methodName = $routes["/500"]["method"];
    $obj->$methodName();
}

var_dump($e);
/**
 * On veut un système de log
 */

