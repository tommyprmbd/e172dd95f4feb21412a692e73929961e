<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 18:33:31
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 19:18:21
 * @ Description:
 */

namespace App\Infrastructure\Response;

use App\Domain\Response\QueueHandlerResponseInterface;

class QueueHandlerResponse implements QueueHandlerResponseInterface
{
    private int $total;
    private int $success;
    private int $failed;
    private array $result;

    public function __construct(int $total, int $success, int $failed, array $result) {
        $this->total = $total;
        $this->success = $success;
        $this->failed = $failed;
        $this->result = $result;
    }

    public function getTotal() : int {
        return $this->total;
    }

    public function getSuccess() : int {
        return $this->success;
    }

    public function getFailed() : int {
        return $this->failed;
    }

    public function getResult() : array {
        return $this->result;
    }

    public function toArray() {
        return [
            "total" => $this->getTotal(),
            "success"=> $this->getSuccess(),
            "failed"=> $this->getFailed(),
            "result" => $this->getResult()
        ];
    }
}