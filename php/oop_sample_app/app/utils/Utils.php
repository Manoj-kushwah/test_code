<?php

/**
 * Class Utils
 */
class Utils
{
    /**
     * @call get_basedir_name()
     * @return string basedir name.
     */
    public static function getBasedirName()
    {
        $arr_str = explode(DIRECTORY_SEPARATOR, trim(BASE_DIR_PATH, DIRECTORY_SEPARATOR));
        return $arr_str[sizeof($arr_str)-1];
    }

    /**
     * @call get_request_url()
     * @return string request url.
     */
    public static function getRequestUrl()
    {
        $arr_str = explode(self::getBasedirName(), $_SERVER["REQUEST_URI"]);
        return $arr_str[sizeof($arr_str)-1];
    }

    /**
     * @param $log_msg
     */
    public static function log($log_msg)
    {
        try {
            $log_filename = LOG_DIR_PATH;
            if (!file_exists($log_filename)) {
                // create directory/folder uploads.
                mkdir($log_filename, 0777, true);
            }

            /*ob_start();                 // start buffer capture
            var_dump( $log_msg );       // dump the values
            $log = ob_get_contents();   // put the buffer into a variable
            ob_end_clean();*/

            $log = "LOG Date: ". date('d.m.Y h:i:s') ." | ". print_r($log_msg, true);

            $log_file_data = $log_filename . DIRECTORY_SEPARATOR .'log-'. date('d-M-Y') .'.log';

            file_put_contents($log_file_data, $log . "\n", FILE_APPEND);

        } catch (Exception $e) {
        }
    }
}