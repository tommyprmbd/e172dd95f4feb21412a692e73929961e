<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 00:01:25
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 00:04:14
 * @ Description:
 */

namespace App\Infrastructure\Exception;

use App\Infrastructure\Presenter\BasePresenter;
use App\Infrastructure\Response\HttpStatus;
use App\Infrastructure\Response\StatusResponse;

class MethodNotAllowedException extends \Exception
{
    public function __construct() {
        parent::__construct();
    }

    public function message() {
        return new BasePresenter(null, 
            new StatusResponse(
                HttpStatus::METHOD_NOT_ALLOWED['code'],
                HttpStatus::METHOD_NOT_ALLOWED['message']
            ));
    }
}