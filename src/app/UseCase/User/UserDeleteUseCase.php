<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 14:11:48
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 14:16:29
 * @ Description:
 */

namespace App\UseCase\User;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;

class UserDeleteUseCase
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;    
    }

    public function handle(int $id) {
        return $this->userRepositoryInterface->delete($id);
    }
}