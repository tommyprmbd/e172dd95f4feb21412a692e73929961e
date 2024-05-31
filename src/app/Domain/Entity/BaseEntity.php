<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 21:15:12
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 21:53:29
 * @ Description:
 */

namespace App\Domain\Entity;

use DateTime;

abstract class BaseEntity implements BaseEntityInterface 
{
    protected int $id;

    private DateTime $createdAt;
    
    public function getId() {
        return $this->id;
    }

    public function setId(int $id) {
        $this->id = $id;
    }

    public function getCreatedAt(): DateTime {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt) {
        $this->createdAt = $createdAt;
    }
}