<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:21:37
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 13:25:41
 * @ Description:
 */

namespace App\Infrastructure\Response;

use Carbon\Carbon;

final class MetaResponse
{
    public $timestamp;

    public function __construct() {
        $this->timestamp = Carbon::now()->timestamp;
    }
}