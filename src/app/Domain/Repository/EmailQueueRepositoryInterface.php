<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-05-31 15:22:49
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 16:01:19
 * @ Description:
 */

namespace App\Domain\Repository;

use App\Domain\Entity\EmailQueue;

interface EmailQueueRepositoryInterface extends RepositoryInterface 
{
    /**
     * @return EmailQueue[]
     */
    public function findUnprocessedEmailQueue() : array;
}