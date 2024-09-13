<?php

use App\Core\Router;
use App\Controllers\SearchController;

$router = new Router();

$router->addRoute('GET', '', [new SearchController(), 'index']);
$router->addRoute('POST', 'searches/store', [new SearchController(), 'store']);
$router->addRoute('GET', 'searches/history', [new SearchController(), 'history']);
$router->addRoute('GET', 'searches/show/{text}', [new SearchController(), 'show']);

return $router;
