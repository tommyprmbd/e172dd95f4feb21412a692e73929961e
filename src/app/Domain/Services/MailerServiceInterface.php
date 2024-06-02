<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 17:42:15
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 17:47:31
 * @ Description:
 */

namespace App\Domain\Services;

use App\Domain\Entity\EmailQueue;
use App\Domain\Response\StatusResponseInterface;

interface MailerServiceInterface
{
    public function send(EmailQueue $emailQueue, bool $isHtml = false): StatusResponseInterface;
}