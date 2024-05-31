<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 20:52:49
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 21:04:10
 * @ Description:
 */

namespace App\Domain\Mapper;

use App\Domain\Entity\User;

interface UserMapperInterface 
{
    public static function toModel($row) : User;

    public static function toList($rows) : array;
}