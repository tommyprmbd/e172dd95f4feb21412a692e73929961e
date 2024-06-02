<?php
/**
 * @ Author: Tommyprmbd
 * @ Create Time: 2024-06-02 00:39:52
 * @ Modified by: Tommyprmbd
 * @ Modified time: 2024-06-02 16:05:25
 * @ Description:
 */

if (!function_exists("isEmpty")) {
    function isEmpty($var) {
        if (is_array($var)) {
            return count($var) > 0 ? false : true;
        }

        return $var === null || $var === '';
    }
}

if (!function_exists("debug")) {
    function debug($var) {
        echo "<pre>";
        print_r($var);
        echo "</pre>";
    }
}