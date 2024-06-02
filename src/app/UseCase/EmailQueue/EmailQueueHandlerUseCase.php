<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 15:53:05
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 19:57:42
 * @ Description:
 */

namespace App\UseCase\EmailQueue;

use App\Domain\Entity\EmailQueue;
use App\Domain\Repository\EmailQueueRepositoryInterface;
use App\Domain\Response\StatusResponseInterface;
use App\Domain\Services\MailerServiceInterface;
use App\Infrastructure\Exception\NotFoundException;
use App\Infrastructure\Logger\SchedulerLogger;
use App\Infrastructure\Response\QueueHandlerResponse;
use Carbon\Carbon;

class EmailQueueHandlerUseCase 
{
    private EmailQueueRepositoryInterface $emailQueueRepository;
    
    private MailerServiceInterface $mailerServiceInterface;

    public function __construct(
        EmailQueueRepositoryInterface $emailQueueRepository,
        MailerServiceInterface $mailerServiceInterface,
    ) {
        $this->emailQueueRepository = $emailQueueRepository;
        $this->mailerServiceInterface = $mailerServiceInterface;
    }

    /**
     * @var StatusResponseInterface $response
     */
    public function handle() {
        // check if there are not processed email
        $unprocessed = $this->emailQueueRepository->findUnprocessedEmailQueue();
        if (isEmpty($unprocessed)) {
            throw new NotFoundException("Unprocessed email is not found.");
        }

        $total = count($unprocessed);
        $success = 0;
        $failed = 0;
        $result = [];

        foreach ($unprocessed as $queue) {
            $response = $this->mailerServiceInterface->send($queue);
            // update status email queue
            $result[] = [
                "id" => $queue->getId(),
                "recipient" => $queue->getEmail(),
                "result" => $response->getMessage()
            ];

            if ($response->getCode() === 1) {
                $success++;
                $queue->setStatus(EmailQueue::STATUS_SENT);
            } else {
                $failed++;
                $queue->setStatus(EmailQueue::STATUS_FAILED);
                $queue->setAdditionalInfo($response->getMessage());
            }
            $queue->setProcessedAt(Carbon::now()->setTimezone('Asia/Jakarta'));
            $this->emailQueueRepository->update($queue);
            sleep(2);
        }

        $response = new QueueHandlerResponse($total, $success, $failed, $result);
        $log = $response->toArray();
        unset($log['result']);
        SchedulerLogger::log(http_build_query($log,'',', '));
        return $response;
    }
}