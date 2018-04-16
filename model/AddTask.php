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
    } elseif (file_exists('../API/' . $file . '.php')) {
        require_once '../API/' . $file . '.php';
    }
}

function died($error)
{
    // your error code can go here
    echo "We are very sorry, but there were error(s) found with the form you submitted. ";
    echo "These errors appear below.<br /><br />";
    echo $error . "<br /><br />";
    echo "Please go back and fix these errors.<br /><br />";
    die();
}

if (isset($_FILES['img'])) {

    if (in_array(ConfigApp::getFileExt(), ConfigApp::Expansion) === false) {
        $errors[] = "extension not allowed, please choose a JPEG or JPG or PNG file.";
    }
    if (ConfigApp::getFileSize() > 2097152) {
        $errors[] = 'File size must be excately 2 MB';
    }
    if (empty($errors) == true) {
        move_uploaded_file(ConfigApp::getFileTmp(), ConfigApp::imgPathToFile().ConfigApp::getFileName());
    } else {
        print_r($errors);
    }
}

if (isset($_POST['user']) && isset($_POST['task'])) {

    $userRepo = new UserRepository();
    $taskRepo = new TaskRepository();
    $arrayUser = [
        'name' => $_POST['user']['name'],
        'email' => $_POST['user']['email']
    ];
    $arrayTask = [
        'text' => $_POST['task']['text'],
        'img' => $_FILES['img']['name']
    ];

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $arrayUser['email'])) {
        $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $arrayUser['name'])) {
        $error_message .= 'The Name you entered does not appear to be valid.<br />';
    }

    if (!preg_match($string_exp, $arrayTask['text'])) {
        $error_message .= 'The Task text you entered does not appear to be valid.<br />';
    }

    if (strlen($error_message) > 0) {
        died($error_message);
    }

    $user = new User();
    $user->setUser($arrayUser);
    $task = new Task();
    $task->setTask($arrayTask);
    $taskRepo->save($task, $user);
    $userRepo->save($task, $user);
}

?>

<a href="javascript:history .go(-1)">Task added <br> go back to dashboard</a>


