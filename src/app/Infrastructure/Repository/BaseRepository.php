<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 01:42:27
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 16:22:03
 * @ Description:
 */

namespace App\Infrastructure\Repository;

use App\Domain\Repository\RepositoryInterface;
use App\Infrastructure\Config\DatabaseConnection;

class BaseRepository
{
    private $connection;

    public function __construct() {
        $this->connection = (new DatabaseConnection() )->getConnection();
    }

    public function db() {
        return $this->connection;
    }
}