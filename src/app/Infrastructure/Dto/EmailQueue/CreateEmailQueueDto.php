<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 03:01:27
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 14:20:16
 * @ Description:
 */

namespace App\Infrastructure\Dto\EmailQueue;

use App\Domain\Dto\EmailQueue\CreateEmailQueueDtoInterface;
use App\Infrastructure\Response\ValidationResponse;
use App\Infrastructure\Validator\Assert\NotEmpty;
use App\Infrastructure\Validator\Validation;
use DevCoder\Validator\Assert\Email;
use DevCoder\Validator\Assert\StringLength;

class CreateEmailQueueDto implements CreateEmailQueueDtoInterface
{
    private string $email;

    private string $subject;

    private string $message;

    private array $body;

    public function __construct(array $body) {
        $this->email = $body["email"];
        $this->subject = $body["subject"];
        $this->message = $body["message"];

        $this->body = $body;
    }

    public function getEmail(): string { return $this->email; } 

    public function getSubject(): string { return $this->subject; } 

    public function getMessage(): string { return $this->message; } 

    public function getBody(): array { return $this->body; }

    public function validate(): ValidationResponse {
        $validation = new Validation([
            "email" => [new NotEmpty(), new Email()],
            "subject" => [new NotEmpty(), (new StringLength())->max(255)],
            "message"=> [new NotEmpty()],
        ]);

        if ($validation->validateArray($this->body) === false) {
            return new ValidationResponse(false, [], $validation->getErrors());
        }

        return new ValidationResponse(true, $this);
    }
}