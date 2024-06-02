<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 15:22:06
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 14:42:51
 * @ Description:
 */

namespace App\Infrastructure\Repository;

use App\Domain\Entity\EmailQueue;
use App\Domain\Repository\EmailQueueRepositoryInterface;
use App\Infrastructure\Mapper\EmailQueueMapper;

class EmailQueueRepository extends BaseRepository implements EmailQueueRepositoryInterface
{
    private string $table = 'email_queue';

    public function findAll() {
        $query = $this->db()->query('select * from ' . $this->table);
        $rows = $query->fetchAll(\PDO::FETCH_ASSOC);
        if ($rows === false) {
            return [];
        }
        return EmailQueueMapper::toModelList($rows);
    }

    public function findById(int $id): ?EmailQueue {
        $query = $this->db()->prepare('select * from ' . $this->table . ' where id = :id');
        $query->bindValue('id', $id, \PDO::PARAM_INT);
        $query->execute();

        $row = $query->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return EmailQueueMapper::toModel($row);
        }

        return null;
    }

    public function create($entity): EmailQueue | \PDOException {
        if (!$entity instanceof EmailQueue) {
            throw new \InvalidArgumentException('Expected EmailQueue entity object as parameter.');
        }

        $newEntity = null;
        try {
            $query = $this->db()->prepare('insert into '. $this->table . ' 
                (email, subject, message, status, additional_info, created_by) 
                values 
                (:email, :subject, :message, :status, :additional_info, :created_by)
            ');
            $query->bindValue(':email', $entity->getEmail(), \PDO::PARAM_STR);
            $query->bindValue(':subject', $entity->getSubject(), \PDO::PARAM_STR);
            $query->bindValue(':message', $entity->getMessage(), \PDO::PARAM_STR);
            $query->bindValue(':status', $entity->getStatus(), \PDO::PARAM_STR);
            $query->bindValue(':additional_info', $entity->getAdditionalInfo(), \PDO::PARAM_STR);
            $query->bindValue(':created_by', $entity->getCreatedBy(), \PDO::PARAM_INT);
            // $query->bindValue(':processed_at', $entity->getProcessedAt(), \PDO::PARAM_STR);
            $query->execute();
            $entity->setId($this->db()->lastInsertId());

            $newEntity = $this->findById($entity->getId());
        } catch (\PDOException $e) {
            return $e;
        }

        return $newEntity;
    }

    public function update($entity): EmailQueue | \PDOException {
        if (!$entity instanceof EmailQueue) {
            throw new \InvalidArgumentException('Expected User entity object as parameter.');
        }

        try {
            $query = $this->db()->prepare('update '. $this->table . ' set 
                email = :email,
                subject = :subject,
                message = :message,
                processed_at = :processed_at,
                status = :status,
                additional_info = :additional_info,
                updated_by = :updated_by,
                updated_at = :updated_at
            where
                id = :id
            ');
            $query->bindValue(':email', $entity->getEmail(), \PDO::PARAM_STR);
            $query->bindValue(':subject', $entity->getSubject(), \PDO::PARAM_STR);
            $query->bindValue(':message', $entity->getMessage(), \PDO::PARAM_STR);
            $query->bindValue(':processed_at', $entity->getProcessedAt(), \PDO::PARAM_STR);
            $query->bindValue(':status', $entity->getStatus(), \PDO::PARAM_STR);
            $query->bindValue(':additional_info', $entity->getAdditionalInfo(), \PDO::PARAM_STR);
            $query->bindValue(':updated_by', $entity->getUpdatedBy(), \PDO::PARAM_INT);
            $query->bindValue(':updated_at', $entity->getUpdatedAt(), \PDO::PARAM_STR);
            $query->execute();
            
        } catch (\PDOException $e) {
            return $e;
        }

        return $entity;
    }

    public function delete(int $id): bool | \PDOException {
        try {
            $query = $this->db()->prepare('delete from ' . $this->table . ' where id = :id');
            $query->bindValue(':id', $id, \PDO::PARAM_INT);
            $query->execute();
        } catch (\PDOException $e) {
            return false;
        }

        return true;
    }
}