<?php
header ('Content-type: text/html; charset=ISO-8859-1');
//declare(encoding='ISO-8859-1');
session_start();
require 'config.php';
require 'functions.php';
spl_autoload_register(function ($class) {
    if (strpos($class, 'Controller') > -1) { //Verifica se há a string 'Controller'
        if (file_exists('controllers/' . $class . '.php')) {
            require_once 'controllers/' . $class . '.php';
        }
    } else if (file_exists('models/' . $class . '.php')) {
        require_once 'models/' . $class . '.php';
    } else {
        require_once 'core/' . $class . '.php';
    }
});

$core = new Core();
$core->run();
