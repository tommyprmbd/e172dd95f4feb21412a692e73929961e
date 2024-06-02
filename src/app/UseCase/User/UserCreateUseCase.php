<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 14:11:48
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 14:24:32
 * @ Description:
 */

namespace App\UseCase\User;

use App\Domain\Dto\User\CreateUserDtoInterface;
use App\Domain\Entity\User;
use App\Domain\Repository\UserRepositoryInterface;

class UserCreateUseCase
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;    
    }

    public function handle(CreateUserDtoInterface $dto) {
        $user = new User();
        $user->setEmail($dto->getEmail());
        $user->setFirstName($dto->getFirstName());
        $user->setLastName($dto->getLastName());
        $user->setPassword(password_hash($dto->getPassword(), PASSWORD_DEFAULT));
        
        return $this->userRepositoryInterface->create($user);
    }
}