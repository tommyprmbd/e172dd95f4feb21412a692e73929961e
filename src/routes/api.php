<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 01:29:05
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 13:16:01
 * @ Description:
 */
use DevCoder\Route;
use DevCoder\Router;

return [
    new Route('users-find-all', '/api/users', [\App\Infrastructure\Controllers\UserController::class, 'findAll'], ['GET']),
    new Route('users-find-by-id', '/api/users/{id}', [\App\Infrastructure\Controllers\UserController::class, 'findById'], ['GET']),
];