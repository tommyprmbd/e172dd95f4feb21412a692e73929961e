<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-30 15:40:53
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 17:49:30
 * @ Description:
 */
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use App\Infrastructure\Config\DatabaseConnection;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$db = (new DatabaseConnection())->getConnection();