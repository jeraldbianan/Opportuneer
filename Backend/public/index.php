<?php
require '../helpers.php';
require basePath('vendor/autoload.php');

use Framework\Middleware\CorsMiddleware;

CorsMiddleware::handle();
