<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 02:55:47
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 14:31:05
 * @ Description:
 */

namespace App\UseCase\EmailQueue;

use App\Domain\Dto\EmailQueue\CreateEmailQueueDtoInterface;
use App\Domain\Entity\EmailQueue;
use App\Domain\Repository\EmailQueueRepositoryInterface;

class EmailQueueCreateUseCase
{
    private EmailQueueRepositoryInterface $emailQueueRepository;

    public function __construct(EmailQueueRepositoryInterface $emailQueueRepository) {
        $this->emailQueueRepository = $emailQueueRepository;
    }

    public function handle(CreateEmailQueueDtoInterface $dto) {
        $email = new EmailQueue();
        $email->setEmail($dto->getEmail());
        $email->setSubject($dto->getSubject());
        $email->setMessage($dto->getMessage());
        $email->setStatus($email::STATUS_WAITING);
        $email->setAdditionalInfo(null);
        $email->setCreatedBy(null);

        return $this->emailQueueRepository->create($email);
    }
}