<?php
/**
 * Сайт на MVC
 */

session_start(); // старт сессии

ini_set('display_errors', 1); // вкл отображение ошибок
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    $file_name = str_replace('\\', '/', $class) . '.php';
    if (file_exists($file_name)) {
//        echo $file_name." ";
        require_once($file_name);
    } else {
        echo $file_name." file does not exist!";
    }
});

// подключаем файл конфигураций
require_once 'config/config.php';

// подключаем файл первоначальной загрузки
require_once 'application/bootstrap.php';

