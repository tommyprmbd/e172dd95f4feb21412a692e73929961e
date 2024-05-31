<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 22:28:32
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 02:15:17
 * @ Description:
 */

namespace App\Infrastructure\Controllers;

use App\Domain\Controllers\UserControllerInterface;
use App\Infrastructure\Repository\UserRepository;
use App\UseCase\User\UserFindAllUseCase;

class UserController implements UserControllerInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;    
    }

    public function findAll() {
        $result = (new UserFindAllUseCase($this->userRepository))->execute();
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        return $result;
    }
    
    public function findById(int $id) {
        
    }

    public function create(array $data) {
        
    }

    public function update(array $data) {

    }

    public function delete(int $id) {
    
    }
}