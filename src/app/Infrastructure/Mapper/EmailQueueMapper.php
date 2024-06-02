<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 02:35:41
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 14:45:36
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
        $email->setCreatedAt($row->created_at ? (new DateHelper($row->created_at))->createdAt() : null);
        $email->setUpdatedAt($row->updated_at ? (new DateHelper($row->updated_at))->createdAt() : null);
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
        $row->setCreatedAt($row->getCreatedAt() ? (new DateHelper($row->getCreatedAt()))->createdAt() : null);
        $row->setUpdatedAt($row->getUpdatedAt() ? (new DateHelper($row->getUpdatedAt()))->createdAt() : null);
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