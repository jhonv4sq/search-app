<?php

namespace App\Controllers;

use App\Models\Search;
use App\Core\View;

class SearchController {

    public function create () {
        new View('searches.create');
    }

    public function store () {

    }

}
