<?php

namespace App\Core;

class View {
    public function __construct(string $view, array $data = [], string $layout = 'layouts/app') {
        $view = str_replace(".", "/", $view);
        extract($data);

        ob_start();
        require_once("src/Views/{$view}.php");
        $content = ob_get_clean();

        require_once("src/Views/{$layout}.php");
    }
}
