<?php

namespace Framework\Middleware;

class CorsMiddleware {
  public static function handle() {
    $allowedOrigins = [
      'http://localhost:9000',
      'https://oppotuneer.netlify.app'
    ];

    // Check the request's origin and only allow if it's in the allowed list
    if (isset($_SERVER['HTTP_ORIGIN']) && in_array($_SERVER['HTTP_ORIGIN'], $allowedOrigins)) {
      header("Access-Control-Allow-Origin: " . $_SERVER['HTTP_ORIGIN']);
    }

    header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    header("Access-Control-Allow-Credentials: true");

    // Handle preflight requests
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
      http_response_code(200);
      exit;
    }
  }
}
