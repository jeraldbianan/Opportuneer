<?php
require '../helpers.php';
require basePath('vendor/autoload.php');

use Framework\Database;
use Framework\Middleware\CorsMiddleware;

CorsMiddleware::handle();

$config = require basePath('config/db.php');
new Database($config);
