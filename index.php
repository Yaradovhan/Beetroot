<?php

//echo "<pre>";
//var_dump($_SERVER);

include 'config.php';

function __autoload($file)
{
    if (file_exists('controller/' . $file . '.php')) {
        require_once 'controller/' . $file . '.php';
    } elseif (file_exists('model/' . $file . '.php')) {
        require_once 'model/' . $file . '.php';
    } elseif (file_exists('model/TaskRepository/' . $file . '.php')) {
        require_once 'model/TaskRepository/' . $file . '.php';
    } elseif (file_exists('model/UserRepository/' . $file . '.php')) {
        require_once 'model/UserRepository/' . $file . '.php';
    } elseif (file_exists('API/' . $file . '.php')) {
        require_once 'API/' . $file . '.php';
    }
}

if (isset($_GET['add'])) {
    $init = new Add();
} else {
    $init = new Index();
}

echo $init->execute();
