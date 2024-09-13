<?php

use App\Core\Router;
use App\Controllers\SearchController;

$router = new Router();

$router->addRoute('GET', '', [new SearchController(), 'create']);
$router->addRoute('POST', 'searches/store', [new SearchController(), 'store']);
$router->addRoute('GET', 'searches/history', [new SearchController(), 'history']);

return $router;
