<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 22:37:24
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 22:53:22
 * @ Description:
 */

namespace App\Domain\Response;

interface ValidationResponseInterface
{
    public function getStatus(): bool;

    public function getErrors();

    public function getData();

    public function fails() : bool;
}