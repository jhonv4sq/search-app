<?php

namespace App\Core;

class View {
    public function __construct(string $view) {
        $view = str_replace(".", "/", $view);
        require_once("src/Views/{$view}.php");
    }
}
