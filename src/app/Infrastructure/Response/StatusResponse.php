<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:21:37
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 18:03:26
 * @ Description:
 */

namespace App\Infrastructure\Response;

use App\Domain\Response\StatusResponseInterface;

final class StatusResponse implements StatusResponseInterface
{
    public int $code;

    public string $message;

    public function __construct(int $code = HttpStatus::OK["code"], string $message = HttpStatus::OK["message"]) {
        $this->code = $code;
        $this->message = $message;
    }

    public function getCode(): int { return $this->code; }
    
    public function getMessage(): string { return $this->message; }
}