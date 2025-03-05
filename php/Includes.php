<?php

/**
 *  script ecargado de gestionar los includes
 */

// include de scripts sin clase
include_once "php/Iconos.php";
include_once "php/Sonidos.php";
include_once "php/URLs.php";
include_once "php/URLs.php";


// class autoloader
spl_autoload_register(function ($class_name) {
    $file = "php/" . $class_name . '.php';
    if ($file != "php/mysqli.php") {
        include_once $file;
    }

});
?>