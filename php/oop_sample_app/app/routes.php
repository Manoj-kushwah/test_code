<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 25/6/19
 * Time: 3:28 PM
 */

Router::route('/', function ($arr) {
    Log::debug($arr);
    $con = DBConnection::getInstance();
//    $con->connect();
//    if ($con->getDb()->connect_errno) {
//        return $con->getDb()->connect_error;
//    }

    $con->close();
    return "<h1>Database.</h1>";

//    $temp = new DBField();
//    $temp->Incremental()
//        ->Name("id")
//        ->NullAble()
//        ->DefaultValue(1)
//        ->Index(DBField::INDEX_PRIMARY)
//        ->Length(10)
//        ->Type(DBField::TYPE_VARCHAR);
//    var_dump($temp);
//    Log::debug($temp);
//    return $temp."<h1>Hello world.</h1>";
});

Router::route('/user', function ($arr) {
    $user = new UserController();
    Log::debug($arr);
    Log::debug($user);
    return $user->index();
});

Router::route('/user/data', function ($arr) {
    $user = new UserController();
    Log::debug($arr);
    Log::debug($user->data());
    return $user->data();
});

Router::route('/database', function ($arr) {
    Log::debug($arr);
    $con = new DBConnection();
//    Log::debug($con);
//    $con->connect();
//    Log::debug($con);
//    if ($con->getDb()->connect_errno) {
//        return $con->getDb()->connect_error;
//    }
    return "<h1>Database.</h1>";
});