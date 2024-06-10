<?php

use Benzo\SingleEntryPoint\Application\Request;
use Benzo\SingleEntryPoint\Application\Router;
use Benzo\SingleEntryPoint\Application\Logger;

require_once ("vendor/autoload.php");

$requestMethod = $_SERVER['REQUEST_METHOD'];
$requestData = array_merge($_GET, $_POST);
$headers = getallheaders();
$request = new Request($requestMethod, $requestData, $headers);
$logger = Logger::getInstance();
$logger->info("[ACCESS LOG] $requestMethod {$request->getUri()}");
$router = new Router();
$response = $router->handle($request);

echo $response;

