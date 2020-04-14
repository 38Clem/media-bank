<?php

namespace App\Controller;

class HomeController {

    public function home () {
        session_start();
        include __DIR__ . "/../../templates/home/home.html.php";
    }

}