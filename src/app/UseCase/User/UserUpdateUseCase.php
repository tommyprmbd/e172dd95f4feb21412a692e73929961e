<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 14:11:48
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 14:15:53
 * @ Description:
 */

namespace App\UseCase\User;

use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;

class UserUpdateUseCase
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;    
    }

    public function handle(User $user) {
        return $this->userRepositoryInterface->update($user);
    }
}