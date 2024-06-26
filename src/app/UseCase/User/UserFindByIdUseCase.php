<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:09:50
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 14:13:39
 * @ Description:
 */

namespace App\UseCase\User;

use App\Domain\Repository\UserRepositoryInterface;

class UserFindByIdUseCase
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;    
    }

    public function handle(int $id)
    {
        return $this->userRepositoryInterface->findById($id);
    }
}