<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 02:00:19
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 15:52:34
 * @ Description:
 */

namespace App\Domain\Controllers;

interface SendEmailControllerInterface
{
    public function addQueue(?array $data);

    public function handler();
}