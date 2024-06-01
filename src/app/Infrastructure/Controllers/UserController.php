<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 22:28:32
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 23:27:57
 * @ Description:
 */

namespace App\Infrastructure\Controllers;

use App\Domain\Controllers\UserControllerInterface;
use App\Infrastructure\Dto\CreateUserDto;
use App\Infrastructure\Mapper\UserMapper;
use App\Infrastructure\Presenter\BasePresenter;
use App\Infrastructure\Repository\UserRepository;
use App\Infrastructure\Response\HttpStatus;
use App\Infrastructure\Response\StatusResponse;
use App\UseCase\User\UserCreateUseCase;
use App\UseCase\User\UserDeleteUseCase;
use App\UseCase\User\UserFindAllUseCase;
use App\UseCase\User\UserFindByIdUseCase;
use App\UseCase\User\UserUpdateUseCase;

class UserController
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;    
    }

    public function findAll() {
        return new BasePresenter((new UserFindAllUseCase($this->userRepository))->handle());
    }
    
    public function findById(int $id) {
        $user = (new UserFindByIdUseCase($this->userRepository))->handle($id);
        if ($user === null) {
            return new BasePresenter(
                null, 
                new StatusResponse(HttpStatus::NOT_FOUND["code"], HttpStatus::NOT_FOUND["message"]),
            );
        }

        return new BasePresenter((new UserFindByIdUseCase($this->userRepository))->handle($id));
    }

    public function create(?array $data) {
        $validation = (new CreateUserDto($data))->validate();
        if ($validation->fails()) {
            return new BasePresenter(
                $validation->getErrors(), 
                new StatusResponse(HttpStatus::BAD_REQUEST["code"], HttpStatus::BAD_REQUEST["message"]),
            );
        }

        return new BasePresenter(
            (new UserCreateUseCase($this->userRepository))->handle($validation->getData()),
            new StatusResponse(HttpStatus::CREATED["code"], HttpStatus::CREATED["message"]),
        );
    }

    public function update(array $data) {
        return new BasePresenter((new UserUpdateUseCase($this->userRepository))->handle(UserMapper::toModel($data)));
    }

    public function delete(int $id) {
        return new BasePresenter((new UserDeleteUseCase($this->userRepository))->handle($id));
    }
}