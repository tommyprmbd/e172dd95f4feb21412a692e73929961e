<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 14:11:48
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 14:24:43
 * @ Description:
 */

namespace App\UseCase\User;

use App\Domain\Dto\User\UpdateUserDtoInterface;
use App\Domain\Repository\UserRepositoryInterface;
use App\Infrastructure\Exception\NotFoundException;

class UserUpdateUseCase
{
    private UserRepositoryInterface $userRepositoryInterface;

    public function __construct(UserRepositoryInterface $userRepositoryInterface) {
        $this->userRepositoryInterface = $userRepositoryInterface;    
    }

    public function handle(UpdateUserDtoInterface $dto, int $id) {
        // get user by id
        $user = $this->userRepositoryInterface->findById($id);
        if (!$user) {
            throw new NotFoundException("User ID not found.");
        }

        if (!isEmpty($dto->getPassword())) {
            $user->setPassword(password_hash($dto->getPassword(), PASSWORD_DEFAULT));
        }
        $user->setFirstName($dto->getFirstName());
        $user->setLastName($dto->getLastName());
        $user->setEmail($dto->getEmail());

        return $this->userRepositoryInterface->update($user);
    }
}