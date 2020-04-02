<?php

namespace App\Controller;


class SearchController
{

    public function search()
    {
        include __DIR__ . ("/../../templates/search/search.html.php");
    }

}