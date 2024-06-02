<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 17:29:56
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 19:19:02
 * @ Description:
 */

namespace App\Infrastructure\Services;

use App\Domain\Entity\EmailQueue;
use App\Domain\Services\MailerServiceInterface;
use App\Infrastructure\Config\MailConfig;
use App\Infrastructure\Exception\InternalServerErrorException;
use App\Infrastructure\Response\StatusResponse;
use PHPMailer\PHPMailer\PHPMailer;

class MailerService implements MailerServiceInterface
{
    private PHPMailer $mailer;

    public function __construct() {
        $this->mailer = (new MailConfig())->mailer();    
    }

    public function send(EmailQueue $emailQueue, bool $isHtml = false): StatusResponse {
        $response = new StatusResponse(1, "Success");
        try {
            $this->mailer->addAddress($emailQueue->getEmail());
            $this->mailer->isHTML($isHtml);
            $this->mailer->Subject = $emailQueue->getSubject();
            $this->mailer->Body = $emailQueue->getMessage();
            if (!$this->mailer->send()) {
                throw new InternalServerErrorException($this->mailer->ErrorInfo);
            }
        } catch (\Exception $e) {
            $response = new StatusResponse(0, $e->getMessage());
        }
        return $response;
    }
}