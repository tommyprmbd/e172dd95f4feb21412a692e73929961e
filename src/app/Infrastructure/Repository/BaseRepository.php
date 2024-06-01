<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 01:42:27
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 02:11:13
 * @ Description:
 */

namespace App\Infrastructure\Repository;

use PDO;

class BaseRepository
{
    private $connection;

    public function __construct(PDO $pdo) {
        $this->connection = $pdo;
    }

    public function db() {
        return $this->connection;
    }
}