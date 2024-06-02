<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 02:58:35
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 03:00:28
 * @ Description:
 */

namespace App\Domain\Dto\EmailQueue;

use App\Domain\Response\ValidationResponseInterface;

interface UpdateEmailQueueDtoInterface 
{
    public function getEmail(): string;

    public function getSubject(): string;

    public function getMessage(): string;

    public function validate(): ValidationResponseInterface;
}