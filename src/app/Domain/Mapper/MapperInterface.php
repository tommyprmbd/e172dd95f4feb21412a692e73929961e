<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 20:52:49
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 14:04:21
 * @ Description:
 */

namespace App\Domain\Mapper;

use App\Domain\Entity\BaseEntityInterface;
use App\Domain\Entity\User;

interface MapperInterface 
{
    public static function toModel($row) : BaseEntityInterface;

    public static function toModelList($rows) : array;

    public static function fromModel($row);

    public static function toList(array $rows) : array;
}