<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 17:46:53
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 18:02:48
 * @ Description:
 */

namespace App\Domain\Response;

interface StatusResponseInterface {
    public function getCode(): int;

    public function getMessage(): string;
}