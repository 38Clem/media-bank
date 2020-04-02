<?php

namespace App\Controller;

class HomeController {

    public function home () {
        include __DIR__ . "/../../templates/home/home.html.php";
    }

}