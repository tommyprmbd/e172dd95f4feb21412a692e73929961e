<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-30 16:29:33
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-30 16:44:17
 * @ Description:
 */

namespace App\Domain\Config;

interface DatabaseConfigInterface {
    public function getConnection();
}