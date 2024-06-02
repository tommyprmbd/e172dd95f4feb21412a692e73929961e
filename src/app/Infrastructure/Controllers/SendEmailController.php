<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 01:59:38
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 19:10:38
 * @ Description:
 */

namespace App\Infrastructure\Controllers;

use App\Domain\Controllers\SendEmailControllerInterface;
use App\Infrastructure\Dto\EmailQueue\CreateEmailQueueDto;
use App\Infrastructure\Presenter\BasePresenter;
use App\Infrastructure\Repository\EmailQueueRepository;
use App\Infrastructure\Response\HttpStatus;
use App\Infrastructure\Response\StatusResponse;
use App\Infrastructure\Services\MailerService;
use App\UseCase\EmailQueue\EmailQueueCreateUseCase;
use App\UseCase\EmailQueue\EmailQueueHandlerUseCase;

class SendEmailController implements SendEmailControllerInterface
{
    private EmailQueueRepository $emailQueueRepository;

    public function __construct(EmailQueueRepository $emailQueueRepository) {
        $this->emailQueueRepository = $emailQueueRepository;
    }

    public function addQueue(?array $data) {
        $validation = (new CreateEmailQueueDto($data))->validate();
        if ($validation->fails()) {
            return new BasePresenter(
                $validation->getErrors(), 
                new StatusResponse(HttpStatus::BAD_REQUEST["code"], HttpStatus::BAD_REQUEST["message"]),
            );
        }

        return new BasePresenter((new EmailQueueCreateUseCase($this->emailQueueRepository))->handle($validation->getData()),);
    }

    public function handler() {
        $mailer = new MailerService();
        $response = (new EmailQueueHandlerUseCase($this->emailQueueRepository, $mailer))->handle();
        return new BasePresenter($response);
    }
}