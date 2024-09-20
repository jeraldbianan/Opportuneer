<?php

namespace Framework;

class router {
  protected $routes = [];

  public function registerRoute($method, $uri, $action) {
    list($controller, $controllerMethod) = explode('@', $action);

    $this->routes[] = [
      'method' => $method,
      'uri' => $uri,
      'controller' => $controller,
      'controllerMethod' => $controllerMethod
    ];
  }

  public function get($uri, $controller) {
    $this->registerRoute('GET', $uri, $controller);
  }

  public function post($uri, $controller) {
    $this->registerRoute('POST', $uri, $controller);
  }

  public function put($uri, $controller) {
    $this->registerRoute('PUT', $uri, $controller);
  }

  public function DELETE($uri, $controller) {
    $this->registerRoute('DELETE', $uri, $controller);
  }

  public function route($uri) {
    $requestMethod = $_SERVER['REQUEST_METHOD'] ?? '';

    foreach ($this->routes as $route) {
      $uriSegments = explode('/', trim($uri['path'], '/'));
      $routeSegments = explode('/', trim($route['uri'], '/'));

      if (count($uriSegments) === count($routeSegments) && strtoupper($route['method']) === $requestMethod) {
        $params = [];

        $match = true;
        for ($i = 0; $i < count($uriSegments); $i++) {
          if ($routeSegments[$i] !== $uriSegments[$i] && !preg_match('/\{(.+?)\}/', $routeSegments[$i])) {
            $match = false;
            break;
          }

          if (preg_match('/\{(.+?)\}/', $routeSegments[$i], $matches)) {
            $params[$matches[1]] = $uriSegments[$i];
          }
        }

        if ($match) {
          $controller = 'App\\Controllers\\' . $route['controller'];
          $controllerMethod = $route['controllerMethod'];
          $controllerInstance = new $controller();
          $controllerInstance->$controllerMethod($params);
          return;
        }
      }
    }

    ErrorHandler::error('Route not found', 404);
  }
}
