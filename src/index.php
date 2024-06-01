<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-30 15:40:53
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 23:08:48
 * @ Description:
 */
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use App\Infrastructure\Config\DatabaseConnection;
use App\Infrastructure\Controllers\UserController;
use App\Infrastructure\Repository\UserRepository;
use App\Infrastructure\Response\HttpResponse;
use App\Infrastructure\Route\Router;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pdo = (new DatabaseConnection())->getConnection();

/** Repositories */
$userRepository = new UserRepository($pdo);

/** Controllers */
$userController = new UserController($userRepository);

/** Routes */
$routes = require __DIR__ .'/routes/api.php';

$router = new Router($routes, $_ENV['APP_URL'] ?? 'http://localhost');

try {
    $requestUri = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    // echo "<pre>";
    // print_r([$requestUri, $requestMethod]);
    // print_r("================");
    // echo "</pre>";
    $route = $router->matchFromPathAndMethod($requestUri, $requestMethod);
    $handler = $route->getHandler();
    $attributes = $route->getAttributes();

    $controllerName = $handler[0];
    $methodName = $handler[1] ?? null;

    $controller = new $controllerName($userRepository);
    if (!is_callable($controller)) {
        $controller =  [$controller, $methodName];
    }

    $requestBody = null;
    if (in_array($requestMethod, ['POST', 'PUT'])) {
        $requestBody = json_decode(file_get_contents('php://input'), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \Exception('Invalid JSON in request body');
        }

        $response = $controller($requestBody);
    } else {
        $response = $controller(...array_values($attributes));
    }

    $statusCode = $response->status->code;
    (new HttpResponse($statusCode, [$requestMethod]))->setHeader();
    
    echo $response;

} catch (\DevCoder\Exception\MethodNotAllowed $exception) {
    header("HTTP/1.0 405 Method Not Allowed");
    exit();
} catch (\DevCoder\Exception\RouteNotFound $exception) {
    header("HTTP/1.0 404 Not Found");
    exit();
}
