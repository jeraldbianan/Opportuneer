<?php

namespace Framework;

class ErrorHandler {
  public static function error($message = "Resource not found", $httpError = 404) {
    http_response_code($httpError);
    header('Content-Type: application/json');
    echo json_encode(['error' => $message]);
  }
}
