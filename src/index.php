<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-30 15:40:53
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 13:54:46
 * @ Description:
 */

require 'vendor/autoload.php';


use App\Infrastructure\Controllers\SendEmailController;
use App\Infrastructure\Exception\InvalidJsonException;
use App\Infrastructure\Presenter\BasePresenter;
use App\Infrastructure\Repository\EmailQueueRepository;
use App\Infrastructure\Response\StatusResponse;
use Dotenv\Dotenv;
use App\Infrastructure\Config\DatabaseConnection;
use App\Infrastructure\Controllers\UserController;
use App\Infrastructure\Exception\MethodNotAllowedException;
use App\Infrastructure\Exception\NotFoundException;
use App\Infrastructure\Repository\UserRepository;
use App\Infrastructure\Response\HttpResponse;
use App\Infrastructure\Response\HttpStatus;
use App\Infrastructure\Route\Router;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

ini_set('display_errors', $_ENV["APP_ENV"] == 'development' ? 1 : 0); // development | production

$pdo = (new DatabaseConnection())->getConnection();

/** Repositories */
$userRepository = new UserRepository($pdo);
$emailQueueRepository = new EmailQueueRepository($pdo);

/** Routes */
$routes = require __DIR__ .'/routes/api.php';

$router = new Router($routes, $_ENV['APP_URL'] ?? 'http://localhost');

$requestUri = $_SERVER['REQUEST_URI'];
$requestMethod = $_SERVER['REQUEST_METHOD'];

$header = new HttpResponse();
$header->setHeader();

try {
    $route = $router->matchFromPathAndMethod($requestUri, $requestMethod);
    $handler = $route->getHandler();
    $attributes = $route->getAttributes();

    $controllerName = $handler[0];
    $methodName = $handler[1] ?? null;

    $repository = $route->getRepository();
    $repository = new $repository($pdo);

    $controller = new $controllerName($repository);
    if (!is_callable($controller)) {
        $controller =  [$controller, $methodName];
    }

    if (in_array($requestMethod, ['POST', 'PUT'])) {
        $requestBody = json_decode(file_get_contents('php://input'), true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo (new InvalidJsonException())->message();
            exit();
        }

        array_push($attributes, $requestBody);
    } 
    $response = $controller(...array_values($attributes));

    $statusCode = $response->status->code;
    $header->setHeaderStatusCode($statusCode);
    
    echo $response;

} catch (MethodNotAllowedException $exception) {
    $header->setHeaderStatusCode(HttpStatus::METHOD_NOT_ALLOWED['code']);
    echo $exception->message();
    exit();
} catch (NotFoundException $exception) {
    $header->setHeaderStatusCode(HttpStatus::NOT_FOUND['code']);
    echo $exception->message();
    exit();
}
