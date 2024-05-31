<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 15:22:06
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 22:21:21
 * @ Description:
 */

namespace App\Infrastructure\Repository;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\Mapper\UserMapper;
use PDO;

class UserRepository extends BaseRepository implements UserRepositoryInterface 
{
    private string $table = "users";

    public function findAll()
    {
        $query = $this->db()->query('select * from ' . $this->table);
        $rows = $query->fetch(PDO::FETCH_ASSOC);
        return UserMapper::toList($rows);
    }

    public function findById(int $id)
    {
        $query = $this->db()->prepare('select * from ' . $this->table . ' where id = :id');
        $query->bindValue('id', $id, PDO::PARAM_INT);
        $query->execute();

        $row = $query->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return UserMapper::toModel($row);
        }

        return null;
    }

    /**
     * @param User $user
     */
    public function create($user)
    {
        if (!$user instanceof User) {
            throw new \InvalidArgumentException('Expected User entity object as parameter.');
        }

        $query = $this->db()->prepare('insert into '. $this->table . ' (email, password, first_name, last_name) values (:email, :password, :first_name, :last_name)');
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':first_name', $user->getFirstName(), PDO::PARAM_STR);
        $query->bindValue(':last_name', $user->getLastName(), PDO::PARAM_STR);
        $query->execute();
        $user->setId($this->db()->lastInsertId());

        return $user;
    }

    /**
     * @param User $user
     */
    public function update($user) {
        if (!$user instanceof User) {
            throw new \InvalidArgumentException('Expected User entity object as parameter.');
        }

        $query = $this->db()->prepare('update '. $this->table . ' set 
            email = :email,
            password = :password,
            first_name = :first_name,
            last_name = :last_name
        where 
            id = :id');
        $query->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
        $query->bindValue(':password', $user->getPassword(), PDO::PARAM_STR);
        $query->bindValue(':first_name', $user->getFirstName(), PDO::PARAM_STR);
        $query->bindValue(':last_name', $user->getLastName(), PDO::PARAM_STR);
        $query->bindValue(':id', $user->getId(), PDO::PARAM_INT);
        $query->execute();

        return $user;
    }

    public function delete(int $id) {
        $query = $this->db()->prepare('delete from ' . $this->table . ' where id = :id');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}