<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 17:40:10
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 23:28:14
 * @ Description:
 */

namespace App\Infrastructure\Response;

class HttpStatus 
{
    public const NOT_FOUND = [
        "code" => 404, 
        "message" => "Not Found."
    ];

    public const METHOD_NOT_ALLOWED = [
        "code" => 405, 
        "message" => "Method Not Allowed."
    ];

    public const BAD_REQUEST = [
        "code" => 400, 
        "message" => "Bad Request."
    ];

    public const UNAUTHORIZED = [
        "code" => 401, 
        "message" => "Unauthorized."
    ];

    public const FORBIDDEN = [
        "code" => 403, 
        "message" => "Forbidden."
    ];

    public const OK = [
        "code" => 200, 
        "message" => "Ok."
    ];

    public const CREATED = [
        "code" => 201, 
        "message" => "Created."
    ];
}