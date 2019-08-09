<?php
function autoloadCore($className) {
    $filename = __DIR__."/core/" . $className . ".php";
    try {
        if (is_readable($filename)) {
//           echo "<script>console.log('$className :-> $filename');</script>";
            require $filename;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

function autoloadUtils($className) {
    $filename = __DIR__."/utils/" . $className . ".php";
    try {
        if (is_readable($filename)) {
//           echo "<script>console.log('$className :-> $filename');</script>";
            require $filename;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

function autoloadHelper($className) {
    $filename = __DIR__."/helper/" . $className . ".php";
    try {
        if (is_readable($filename)) {
//           echo "<script>console.log('$className :-> $filename');</script>";
            require $filename;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

function autoloadModel($className) {
    $filename = __DIR__."/models/" . $className . ".php";
    try {
        if (is_readable($filename)) {
//           echo "<script>console.log('$className :-> $filename');</script>";
           require $filename;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

function autoloadController($className) {
    $filename = __DIR__."/controller/" . $className . ".php";
    try {
        if (is_readable($filename)) {
//           echo "<script>console.log('$className :-> $filename');</script>";
           require $filename;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

function autoloadApp($className) {
    $filename = __DIR__."/" . $className . ".php";
    try {
        if (is_readable($filename)) {
//           echo "<script>console.log('$className :-> $filename');</script>";
            require $filename;
        }
    } catch (Exception $e) {
        echo $e;
    }
}

spl_autoload_register("autoloadCore");
spl_autoload_register("autoloadUtils");
spl_autoload_register("autoloadHelper");
spl_autoload_register("autoloadModel");
spl_autoload_register("autoloadController");
spl_autoload_register("autoloadApp");