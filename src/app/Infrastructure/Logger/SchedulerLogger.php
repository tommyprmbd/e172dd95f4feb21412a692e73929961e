<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 19:40:11
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 20:21:17
 * @ Description:
 */

namespace App\Infrastructure\Logger;

use Carbon\Carbon;

class SchedulerLogger
{
    public static function log(string $log) {
        $carbon = Carbon::now()->setTimezone('Asia/Jakarta');

        $filename = $carbon->format('Y-m-d') .'_SCHEDULER.log';
        $path = __DIR__ . "/../../../cron/logs";
        if (!file_exists($path)) {
            mkdir($path);
        }
        
        $filePath = __DIR__ . "/../../../cron/logs/{$filename}";
        if (!file_exists($filePath)) {
            
        }
        $file = fopen($filePath, "w");
        if ($file) { 
            $logTime = Carbon::now()->setTimezone('Asia/Jakarta')->format('Y-m-d H:i:s');
            $logText = "{$logTime}\t{$log}"; 
            fwrite($file, $logText . PHP_EOL);
            fclose($file);
        }
    }
}