<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 22:35:17
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 14:13:36
 * @ Description:
 */

namespace App\UseCase\User;

use App\Domain\Repository\UserRepositoryInterface;

class UserFindAllUseCase
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;    
    }

    public function handle(): array {
        return $this->userRepositoryInterface->findAll();
    }
}