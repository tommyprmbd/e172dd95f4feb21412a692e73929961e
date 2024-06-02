<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 16:21:14
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 02:57:23
 * @ Description:
 */

namespace App\Domain\Dto\User;

use App\Domain\Response\ValidationResponseInterface;

interface UpdateUserDtoInterface
{
    public function getEmail(): string; 

    public function getFirstName(): string; 

    public function getLastName(): string;

    public function getPassword(): string;

    public function validate(): ValidationResponseInterface;
}