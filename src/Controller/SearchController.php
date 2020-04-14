<?php

namespace App\Controller;


class SearchController
{

    public function search()
    {
        session_start();
        include __DIR__ . ("/../../templates/search/search.html.php");
    }

}