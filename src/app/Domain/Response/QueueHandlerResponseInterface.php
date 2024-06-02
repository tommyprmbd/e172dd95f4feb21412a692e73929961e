<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 18:33:31
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 18:35:56
 * @ Description:
 */

namespace App\Domain\Response;

interface QueueHandlerResponseInterface 
{
    public function getTotal() : int;

    public function getSuccess() : int;
    
    public function getFailed() : int;

    public function getResult() : array;
}