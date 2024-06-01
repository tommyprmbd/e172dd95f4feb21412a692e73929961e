<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 02:35:41
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 02:44:52
 * @ Description:
 */

namespace App\Infrastructure\Mapper;

use App\Domain\Entity\EmailQueue;
use App\Domain\Mapper\MapperInterface;
use App\Infrastructure\Helpers\DateHelper;

class EmailQueueMapper implements MapperInterface 
{
    public static function toModel($row): EmailQueue {
        $row = (object)$row;
        $email = new EmailQueue();
        $email->setId($row->id);
        $email->setEmail($row->email);
        $email->setSubject($row->subject);
        $email->setMessage($row->message);
        $email->setProcessedAt($row->processed_at);
        $email->setStatus($row->status);
        $email->setAdditionalInfo($row->additional_info);
        $email->setCreatedBy($row->created_by);
        $email->setCreatedAt((new DateHelper($row->created_at))->createdAt());
        $email->setUpdatedAt((new DateHelper($row->updated_at))->createdAt());
        $email->setUpdatedBy($row->updated_by);
        return $email;
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
     * @param EmailQueue $row
     */
    public static function fromModel($row) {
        $row->setCreatedAt((new DateHelper($row->getCreatedAt()))->createdAt());
        $row->setUpdatedAt((new DateHelper($row->getUpdatedAt()))->createdAt());
        $response = $row->toArray();
        return $response;
    }

    public static function toList(array $rows): array {
        $list = [];
        foreach ($rows as $row) {
            $list[] = $row->toArray();
        }
        return $list;
    }
}