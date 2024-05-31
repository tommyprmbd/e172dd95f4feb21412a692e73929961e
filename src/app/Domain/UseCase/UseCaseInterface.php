<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 22:38:45
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-05-31 23:01:58
 * @ Description:
 */

namespace App\Domain\UseCase;

interface UseCaseInterface
{
    public function execute(...$input = null);
}