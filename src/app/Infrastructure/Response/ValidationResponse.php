<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 16:42:08
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 22:53:25
 * @ Description:
 */

namespace App\Infrastructure\Response;
use App\Domain\Response\ValidationResponseInterface;

final class ValidationResponse implements ValidationResponseInterface
{
    private bool $status;

    private $data;

    private $errors;

    public function __construct(bool $status = true, $data = null, $errors = null) {
        $this->status = $status;
        $this->data = $data;
        $this->errors = $errors;
    }

    public function getStatus(): bool {
        return $this->status;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getData() {
        return $this->data;
    }

    public function fails(): bool {
        return !$this->status ? true : false;
    }
}