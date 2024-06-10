<?php

namespace Benzo\SingleEntryPoint\Application;
class Router
{
    private array $routes = [];

    public function __construct()
    {
        $this->routes = require_once __DIR__ . '/../routes.php';
    }

    public function handle(Request $request)
    {
        $uri = $request->getUri();
        $method = $request->getMethod();
        $searchString = "$method $uri";

        if (!isset($this->routes[$searchString])) {
            return '<html><body>error 404</body></html>';
        }

        $controllerData = $this->routes[$searchString];

        $controller = new $controllerData['controller']($request);
        $action = $controllerData['action'];

        return $controller->{$action}();
    }
}