<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 26/6/19
 * Time: 9:35 PM
 */

class Log
{
    protected static $log_filename = "log";

    public static function setLogFile($log_filename){
        self::$log_filename = $log_filename;
    }

    public static function debug($msg)
    {
        self::print_log("DEBUG", $msg);
    }

    public static function error($msg)
    {
        self::print_log("ERROR", $msg);
    }

    protected static function print_log($type, $msg)
    {
        try {
            $log_filename = self::$log_filename;
            if (!file_exists($log_filename)) {
                // create directory/folder uploads.
                mkdir($log_filename, 0777, true);
            }
            // Log line format (DEBUG Date: ..............).
            $log = $type." Date: ". date('d.m.Y h:i:s') ." | ". print_r($msg, true);
            // Log file name and path (log-01-01-2001.log).
            $log_file_data = $log_filename . DIRECTORY_SEPARATOR .'log-'. date('d-M-Y') .'.log';

            file_put_contents($log_file_data, $log . "\n", FILE_APPEND);
        } catch (Exception $e) {
//            self::error($e->getMessage());
        }
    }
}

if (defined('LOG_DIR_PATH')) {
    Log::setLogFile(LOG_DIR_PATH);
}