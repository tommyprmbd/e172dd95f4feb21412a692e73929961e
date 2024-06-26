<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 23:41:00
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 00:04:10
 * @ Description:
 */

namespace App\Infrastructure\Exception;

use App\Infrastructure\Presenter\BasePresenter;
use App\Infrastructure\Response\HttpStatus;
use App\Infrastructure\Response\StatusResponse;

class InvalidJsonException extends \Exception 
{
    public function __construct() {
        parent::__construct();
    }

    public function message()
    {
        return new BasePresenter(null, 
            new StatusResponse(
                HttpStatus::BAD_REQUEST['code'],
                "Invalid JSON in request body"
            ));
    }
}