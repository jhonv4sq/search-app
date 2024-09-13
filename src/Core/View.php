<?php

namespace App\Core;

class View {
    public function __construct(string $view, array $data = [], string $layout = 'layouts/app') {
        $view = str_replace(".", "/", $view);

        // extraemos las variables para usarlas en la vista
        extract($data);

        // se captura el contenido de la vista en un buffer
        ob_start();
        require_once("src/Views/{$view}.html");
        $content = ob_get_clean();

        // se carga el layout y mostramos la vista incrustada
        require_once("src/Views/{$layout}.html");
    }
}
