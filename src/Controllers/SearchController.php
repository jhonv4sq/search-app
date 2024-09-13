<?php

namespace App\Controllers;

use App\Models\Search;
use App\Core\View;

class SearchController {

    public function index () {
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

    public function show (String $title) {

        $infoJson = array(
            'action' => 'parse',
            'page' => $title,
            'format' => 'json'
        );

        $url = $_ENV['API_URI'].http_build_query($infoJson);
        $response = json_decode(file_get_contents($url), true);

        if(isset($response['error'])) {
            echo '404 - Not Found';
        }else {
            $title = $response['parse']['title'];
            $content = $response['parse']['text']["*"];
            new View('searches.show', ['title' => $title, 'content' => $content]);
        }
    }

}
