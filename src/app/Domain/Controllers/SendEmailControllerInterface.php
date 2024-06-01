<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 02:00:19
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 02:01:27
 * @ Description:
 */

namespace App\Domain\Controllers;

interface SendEmailControllerInterface
{
    public function send(?array $data): void;
}