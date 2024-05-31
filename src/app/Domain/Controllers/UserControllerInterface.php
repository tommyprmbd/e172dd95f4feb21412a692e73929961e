<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 22:30:24
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 22:32:41
 * @ Description:
 */

namespace App\Domain\Controllers;

interface UserControllerInterface
{
    public function findAll();

    public function findById(int $id);

    public function create(array $data);

    public function update(array $data);

    public function delete(int $id);
}