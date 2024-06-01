<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-01 13:05:24
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-01 13:08:35
 * @ Description:
 */

namespace App\Infrastructure\Helpers;

use Carbon\Carbon;

class DateHelper
{
    private $date;

    public function __construct($date) {
        $this->date = Carbon::createFromDate($date);
    } 

    public function createdAt() {
        return $this->date->toDateTimeString();
    }
}