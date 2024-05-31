<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 01:29:05
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 01:37:32
 * @ Description:
 */
use DevCoder\Route;
use DevCoder\Router;

$routes = [
    new Route('find-all-users', '/api/users', [\App\Infrastructure\Controllers\UserController::class, 'findAll'], ['GET']),
];

return new Router($routes, $_ENV['APP_URL'] ?? 'http://localhost:8081');