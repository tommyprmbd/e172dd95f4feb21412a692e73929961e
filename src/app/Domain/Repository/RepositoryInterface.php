<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 01:38:34
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 22:10:57
 * @ Description:
 */

namespace App\Domain\Repository;

use App\Domain\Entity\BaseEntity;
use App\Domain\Entity\BaseEntityInterface;
use App\Domain\Entity\EntityInterface;

interface RepositoryInterface 
{
    public function findAll();

    public function findById(int $id);

    public function create($entity);

    public function update($entity);

    public function delete(int $id);
}