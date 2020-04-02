<?php

require '../vendor/autoload.php';

use App\Controller\AuthentificationController;
use App\Controller\UserController;

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

$routes = [
    "/home" => [
        "controller" => "App\Controller\HomeController",
        "method" => "home"
    ],
    "/login" => [
        "controller" => "App\Controller\AuthentificationController",
        "method" => "login"
    ],
    "/signup" => [
        "controller" => "App\Controller\UserController",
        "method" => "createUser"
    ],
    "/404" => [
        "controller" => "App\Controller\ErrorController",
        "method" => "error404"
    ],
    "/500" => [
        "controller" => "App\Controller\ErrorController",
        "method" => "error500"
    ],
];


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

/**
 * On veut un système de log
 */

