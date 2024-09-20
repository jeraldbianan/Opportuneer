<?php
require '../helpers.php';
require basePath('vendor/autoload.php');

use Framework\Middleware\CorsMiddleware;
use Framework\router;

CorsMiddleware::handle();

$router = new router();

$routes = require basePath('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI']) ?? '';

$router->route($uri);
