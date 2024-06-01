<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:21:37
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 22:30:54
 * @ Description:
 */

namespace App\Infrastructure\Response;

final class StatusResponse
{
    public int $code;

    public string $message;

    public function __construct(int $code = HttpStatus::OK["code"], string $message = HttpStatus::OK["message"]) {
        $this->code = $code;
        $this->message = $message;
    }
}