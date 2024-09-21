<?php

namespace Framework\Middleware;

class CorsMiddleware {
  public static function handle() {
    header("Access-Control-Allow-Origin: http://localhost:9000");
    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
      http_response_code(200);
      exit;
    }
  }
}
