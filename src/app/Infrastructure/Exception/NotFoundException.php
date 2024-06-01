<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 00:01:25
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 00:10:53
 * @ Description:
 */

namespace App\Infrastructure\Exception;

use App\Infrastructure\Presenter\BasePresenter;
use App\Infrastructure\Response\HttpStatus;
use App\Infrastructure\Response\StatusResponse;

class NotFoundException extends \Exception
{
    public function __construct(string $message = null) {
        parent::__construct($message);
    }

    public function message() {
        return new BasePresenter(null, 
            new StatusResponse(
                HttpStatus::NOT_FOUND['code'],
                $this->getMessage() === null ? HttpStatus::NOT_FOUND['message'] : $this->getMessage()
            ));
    }
}