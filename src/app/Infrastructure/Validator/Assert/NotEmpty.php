<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 17:12:31
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 23:13:28
 * @ Description:
 */

namespace App\Infrastructure\Validator\Assert;

use DevCoder\Validator\Assert\AbstractValidator;

final class NotEmpty extends AbstractValidator 
{
    public string $message = 'This value should not empty.';

    public function validate($value): bool
    {
        if ($value === '' || $value === null) {
            $this->error($this->message, ['value' => $value]);
            return false;
        }

        return true;
    }
}