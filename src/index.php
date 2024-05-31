<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-30 15:40:53
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 02:17:31
 * @ Description:
 */
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use App\Infrastructure\Config\DatabaseConnection;
use App\Infrastructure\Controllers\UserController;
use App\Infrastructure\Repository\UserRepository;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$pdo = (new DatabaseConnection())->getConnection();

/** Repositories */
$userRepository = new UserRepository($pdo);

/** Controllers */
$userController = new UserController($userRepository);

/** Routes */
$router = require __DIR__ .'/routes/api.php';

try {
    $requestUri = $_SERVER['REQUEST_URI'];
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    $route = $router->matchFromPath($requestUri, $requestMethod);
    $handler = $route->getHandler();
    $attributes = $route->getAttributes();

    $controllerName = $handler[0];
    $methodName = $handler[1] ?? null;

    $controller = new $controllerName($userRepository);
    if (!is_callable($controller)) {
        $controller =  [$controller, $methodName];
    }
    
    $response = $controller(...array_values($attributes));
    if (is_array($response)) {
        echo json_encode($response);
    } else {
        echo $response;
    }

} catch (\DevCoder\Exception\MethodNotAllowed $exception) {
    header("HTTP/1.0 405 Method Not Allowed");
    exit();
} catch (\DevCoder\Exception\RouteNotFound $exception) {
    header("HTTP/1.0 404 Not Found");
    exit();
}
