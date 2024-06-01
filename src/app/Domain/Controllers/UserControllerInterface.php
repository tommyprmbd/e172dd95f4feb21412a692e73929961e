<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 22:30:24
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 16:05:18
 * @ Description:
 */

namespace App\Domain\Controllers;

interface UserControllerInterface
{
    public function findAll();

    public function findById(int $id);

    public function create();

    public function update(array $data);

    public function delete(int $id);
}