<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-30 15:40:53
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 23:15:31
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
