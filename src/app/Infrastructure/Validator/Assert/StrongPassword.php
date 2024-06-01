<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 17:12:31
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 22:44:13
 * @ Description:
 */

namespace App\Infrastructure\Validator\Assert;

use DevCoder\Validator\Assert\AbstractValidator;

final class StrongPassword extends AbstractValidator 
{
    private string $message = 'The password must be 8 to 30 characters, and include a number, a symbol, a lower and a upper case letter.';

    public function validate($value): bool
    {
        if (!preg_match("/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@()$%^&*=_{}[\]:;\"'|\\<>,.\/~`±§+-]).{8,30}$/", $value)) {
            $this->error($this->message, ['value' => $value]);
            return false;
        }

        return true;
    }
}