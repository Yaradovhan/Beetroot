<?php

include '../config.php';

function __autoload($file)
{
    if (file_exists('../controller/' . $file . '.php')) {
        require_once '../controller/' . $file . '.php';
    } elseif (file_exists('../model/' . $file . '.php')) {
        require_once '../model/' . $file . '.php';
    } elseif (file_exists('../model/TaskRepository/' . $file . '.php')) {
        require_once '../model/TaskRepository/' . $file . '.php';
    } elseif (file_exists('../model/UserRepository/' . $file . '.php')) {
        require_once '../model/UserRepository/' . $file . '.php';
    }
}

$init = new AdminEdit(new TaskRepository());

$res = $init->execute($_POST['task']);
?>

<a href="javascript:history .go(-1)">Task edited <br> go back to dashboard</a>
