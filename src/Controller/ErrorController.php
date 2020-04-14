<?php

namespace App\Controller;

class ErrorController {

    public function error404 () {
        session_start();
        header("HTTP/1.1 404 Not Found");
        include __DIR__ . "/../../templates/error/not-found.html.php";
    }

    public function error500 () {
        session_start();
        header("HTTP/1.1 500 Internal Error");
        include __DIR__ . "/../../templates/error/internalError.html.php";
    }
}