<?php

namespace App\Controllers;

use App\Models\Search;
use App\Core\View;

class SearchController {

    public function create () {
        new View('searches.index');
    }

    public function store () {
        $text = "";
        $response = array(
            'status' => 'error',
            'message' => 'Search text not provided',
        );

        if (isset($_POST['search'])) {
           $text = str_replace("_", " ", $_POST['search']);
        }

        if ($text != "") {
            $search = new Search($text);
            $search->create();

            $response['status'] = 'success';
            $response['message'] = 'Text stored in history correctly';
        }

        echo json_encode($response);
    }

    public function history () {

        $search = new Search();

        $allSearch = $search->showAll();
        new View('searches.history', ['allSearch' => $allSearch]);
    }

}
