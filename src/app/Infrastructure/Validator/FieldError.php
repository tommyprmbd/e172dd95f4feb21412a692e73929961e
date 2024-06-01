<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 22:46:31
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 22:47:45
 * @ Description:
 */

namespace App\Infrastructure\Validator;

class FieldError
{
    private $error;

    public function __construct(array $error) {
        $this->error = $error;
    }

    public function getError() {
        return $this->error;
    }
}