<?php

/**
 * @var string base directory path.
 */
const BASE_DIR_PATH = __DIR__;

/**
 * @load app resource loading.
 */
require_once __DIR__ . '/app/app.php';

//	$dir = explode("/",__DIR__);
//	$dir_name = array_pop($dir);
//	var_dump($dir_name);
//	var_dump($_SERVER);
//	var_dump(__DIR__);
//	$req_url = explode($dir_name, $_SERVER["REQUEST_URI"])[1];
//	$req = $_REQUEST;
//	var_dump($req_url);
////	var_dump($req);
//	switch ($req_url) {
//        case "user/data/":
//            view("UserController", "data", $req);
//            /*if (hash_equals($req["user"], "data")) {
//                view("UserController", "data", $req);
//            } else {
//                view("UserController", "index", $req);
//            }*/
//            break;
//        case "user/":
//            view("UserController", "index", $req);
//            break;
//        default:
//            echo "Not found.";
//    }
//
//    function view($controller, $method, $params = null) {
//	    try {
////	        var_dump(get_class_methods($controller));
//	        if (get_class_methods($controller) != NULL) {
//                $ctr = new $controller;
////                var_dump(array_search($method, get_class_methods($controller)));
//                if (array_search($method, get_class_methods($controller))) {
//                    echo $ctr->{$method}($params);
//                } else {
//                    echo "Error :-> ".$method." method is not defined.";
//                }
//            } else {
//	            echo "Error :-> ".$controller." controller is not defined.";
//            }
//
////	        $ctr = null;
////            if (isset($controller)) {
////                $ctr = new $controller;
////                if ($ctr != null) {
////                    echo $ctr->{$method}($params);
////                } else {
////                    throw new Exception("Controller is defined.");
////                }
////            } else {
////                throw new Exception("Controller name not found.");
////            }
//        } catch (Exception $e) {
//	        echo $e->getMessage();
//        }
//    }
?>