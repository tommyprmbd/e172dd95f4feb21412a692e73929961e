<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 22:35:17
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 01:48:25
 * @ Description:
 */

namespace App\UseCase\User;

use App\Domain\Repository\UserRepositoryInterface;
use App\Domain\UseCase\UseCaseInterface;
use App\Infrastructure\Repository\UserRepository;

class UserFindAllUseCase
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;    
    }

    public function execute()
    {
        return $this->userRepositoryInterface->findAll();
    }
}