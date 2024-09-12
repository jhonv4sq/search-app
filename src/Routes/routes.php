<?php

use App\Core\Router;
use App\Controllers\SearchController;

$router = new Router();

$router->addRoute('GET', '', [new SearchController(), 'create']);

return $router;
