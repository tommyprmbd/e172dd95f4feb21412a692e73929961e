<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 20:55:11
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 22:32:20
 * @ Description:
 */

namespace App\Infrastructure\Mapper;

use App\Domain\Entity\User;
use App\Domain\Mapper\MapperInterface;
use App\Infrastructure\Helpers\DateHelper;

class UserMapper implements MapperInterface 
{
    public static function toModel($row): User
    {
        $row = (object)$row;
        $user = new User();
        $user->setId($row->id);
        $user->setFirstName($row->first_name);
        $user->setLastName($row->last_name);
        $user->setEmail($row->email);
        $user->setPassword($row->password);
        $user->setCreatedAt((new DateHelper($row->created_at))->createdAt());
        return $user;
    }  

    public static function toModelList($rows): array
    {
        $list = [];
        foreach ($rows as $row) {
            $list[] = self::toModel($row);
        }
        return $list;
    }
    
    /**
     * @param User $row
     */
    public static function fromModel($row) {
        $row->setCreatedAt((new DateHelper($row->getCreatedAt()))->createdAt());
        $response = $row->toArray();
        unset($response["password"]);
        return $response;
    }

    public static function toList(array $rows): array {
        $list = [];
        foreach ($rows as $row) {
            $user = $row->toArray();
            unset($user["password"]);
            $list[] = $user;
        }
        return $list;
    }
}