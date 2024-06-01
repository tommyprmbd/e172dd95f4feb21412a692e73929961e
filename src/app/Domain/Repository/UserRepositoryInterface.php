<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 15:22:49
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 21:58:30
 * @ Description:
 */

namespace App\Domain\Repository;

use App\Domain\Entity\User;

interface UserRepositoryInterface extends RepositoryInterface {
    public function findByEmail(string $email): ?User;
}