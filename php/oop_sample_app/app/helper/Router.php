<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 25/6/19
 * Time: 3:28 PM
 */

class Router
{
    /**
     * @var array
     */
    protected static $routes = [];

    /**
     * @return array
     */
    public static function getRoutes()
    {
        return self::$routes;
    }

    /**
     * @param string $url
     * @param Closure $callback -> return string
     */
    public static function route($url = '', Closure $callback)
    {
        /*---remove slash in url---*/
        $url = trim($url, URL_SEPARATOR);
        self::$routes[$url] = $callback;
    }

    /**
     * @param $url
     * @param $params
     */
    public static function dispatch($url, $params)
    {
        /*---remove query string in url---*/
        if (($str_pos = strpos($url, '?')) !== false) {
            $url = substr($url, 0, $str_pos);
        }

        /*---remove slash in url---*/
        $url = trim($url, URL_SEPARATOR);

        /*---getting callback from route mapping by url---*/
        $callback = null;
        if (isset(self::$routes[$url])) {
            $callback = self::$routes[$url];
        }

        /*---render view by callback and params---*/
        self::view($callback, $params);
    }

    /**
     * @param string $callback
     * @param null $params
     */
    public static function view($callback, $params = null)
    {
        if (is_callable($callback)) {
            echo call_user_func($callback, $params);
        } else {
            echo "<h1>404 Not found.</h1>";
        }
    }
}