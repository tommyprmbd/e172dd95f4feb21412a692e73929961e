<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 21:15:12
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 12:54:59
 * @ Description:
 */

namespace App\Domain\Entity;

use DateTime;

abstract class BaseEntity implements BaseEntityInterface 
{
    protected int $id;

    private $createdAt;
    
    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }

    abstract public function toArray();
}