<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:21:37
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 13:23:19
 * @ Description:
 */

namespace App\Infrastructure\Response;

final class StatusResponse
{
    public int $code;

    public string $message;

    public function __construct(int $code = 200, string $message = "Ok.") {
        $this->code = $code;
        $this->message = $message;
    }
}