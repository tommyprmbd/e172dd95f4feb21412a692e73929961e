<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-30 16:31:40
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 22:23:51
 * @ Description:
 */

namespace App\Infrastructure\Config;

use App\Domain\Config\DatabaseConfigInterface;
use Exception;
use PDO;

class DatabaseConnection implements DatabaseConfigInterface 
{
    private $connection = null;

    public function __construct() {
        $dbType = $_ENV["DB_CONNECTION"];
        $host = $_ENV["DB_HOST"];
        $port = $_ENV["DB_PORT"];
        $username = $_ENV["DB_USERNAME"];
        $password = $_ENV["DB_PASSWORD"];
        $database = $_ENV["DB_NAME"];

        try {
            $connectionString = "{$dbType}:host={$host};port={$port};dbname={$database}";
            // $connectionString = "{$dbType}:host={$host};port={$port};dbname={$database};charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ];
            $this->connection = new PDO($connectionString, $username, $password, $options);
        } catch (Exception $e) {
            throw new Exception("Failed to connect. " . $e->getMessage());
        }
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
}