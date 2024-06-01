<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 16:22:25
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 23:26:21
 * @ Description:
 */

namespace App\Infrastructure\Dto;

use App\Domain\Dto\CreateUserDtoInterface;
use App\Infrastructure\Response\ValidationResponse;
use App\Infrastructure\Validator\Assert\NotEmpty;
use App\Infrastructure\Validator\Assert\StrongPassword;
use App\Infrastructure\Validator\Validation;
use DevCoder\Validator\Assert\Email;
use DevCoder\Validator\Assert\StringLength;

class CreateUserDto implements CreateUserDtoInterface
{
    private $body;

    private $firstName;

    private $lastName;

    private $email;

    private $password;

    public function __construct(array $body) {
        $this->body = $body;

        $this->firstName = $body["first_name"];
        $this->lastName = $body["last_name"];
        $this->email = $body["email"];
        $this->password = $body["password"];
    }

    public function getFirstName(): string { return $this->firstName; }

    public function getLastName(): string { return $this->lastName; }

    public function getEmail(): string { return $this->email; }

    public function getPassword(): string { return $this->password; }

    public function validate(): ValidationResponse {
        $validation = new Validation([
            "first_name"=> [new NotEmpty(), (new StringLength())->max(50)],
            "last_name"=> [],
            "email" => [new NotEmpty(), new Email()],
            "password" => [new NotEmpty(), new StrongPassword()]
        ]);

        if ($validation->validateArray($this->body) === false) {
            return new ValidationResponse(false, [], $validation->getErrors());
        }

        return new ValidationResponse(true, $this);
    }
}