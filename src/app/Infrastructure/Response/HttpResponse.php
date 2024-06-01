<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 17:51:58
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 23:59:32
 * @ Description:
 */

namespace App\Infrastructure\Response;

use App\Infrastructure\Response\HttpStatus;

final class HttpResponse
{
    public function setHeader() {
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    }

    public function setHeaderStatusCode(int $code): void {
        $message = HttpStatus::OK["message"];
        switch ($code) {
            case HttpStatus::BAD_REQUEST["code"]: 
                $message = HttpStatus::BAD_REQUEST["message"];
                break;

            case HttpStatus::METHOD_NOT_ALLOWED["code"]: 
                $message = HttpStatus::METHOD_NOT_ALLOWED["message"];
                break;

            case HttpStatus::UNAUTHORIZED["code"]: 
                $message = HttpStatus::UNAUTHORIZED["message"];
                break;

            case HttpStatus::NOT_FOUND["code"]: 
                $message = HttpStatus::NOT_FOUND["message"];
                break;

            case HttpStatus::FORBIDDEN["code"]: 
                $message = HttpStatus::FORBIDDEN["message"];
                break;

            case HttpStatus::CREATED["code"]: 
                $message = HttpStatus::CREATED["message"];
                break;
        }
        
        header("HTTP/1.0 {$code} {$message}");
    }
}