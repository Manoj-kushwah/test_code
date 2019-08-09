<?php

/**
 * Application directory.
 * @return string
 */
const APP_DIR_PATH = __DIR__;

/**
 * Log file directory.
 * @default /app || /log parlor to app directory.
 * @return string
 */
const LOG_DIR_PATH = "..".DIRECTORY_SEPARATOR."log";

/**
 * Application directory.
 * @return string
 */
const URL_SEPARATOR = "/";

/**
 * Database connection configuration.
 * @return array
 */
const DATABASE_CON = array(
    /**
     * Database hostname
     * @value string
     * @example localhost
     * */
    "host" => "localhost",
    /**
     * Database port
     * @value number
     * @example 3306 (localhost:3306)
     * */
    "port" => 3306,
    /**
     * Database user name
     * @value string
     * @example 'root' ('root'@'localhost')
     * */
    "user" => "id5539557_student",
    /**
     * Database user password
     * @value string
     * @example 'root'
     * */
    "password" => "student",
    /**
     * Database name
     * @value string
     * @example 'my_db'
     * */
    "database" => "id5539557_student",
);

/**
 * Load all application classes.
 * @load classes
 */
require_once "autoload.php";


/**
 * Load all application classes.
 * @load routes
 */
require_once "routes.php";

/**
 * @call Router dispatch by request url
 * @return void
 */
Router::dispatch(Utils::getRequestUrl(), $_REQUEST);