<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 20:55:11
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 21:04:35
 * @ Description:
 */

namespace App\Infrastructure\Mapper;

use App\Domain\Entity\User;
use App\Domain\Mapper\UserMapperInterface;

class UserMapper implements UserMapperInterface 
{
    public static function toModel($row): User
    {
        $user = new User();
        $user->setId($row->id);
        $user->setFirstName($row->first_name);
        $user->setLastName($row->last_name);
        $user->setEmail($row->email);
        $user->setPassword($row->password);
        $user->setCreatedAt($row->created_at);
        return $user;
    }    

    public static function toList($rows): array
    {
        $list = [];
        foreach ($rows as $row) {
            $list[] = self::toModel($row);
        }
        return $list;
    }
}