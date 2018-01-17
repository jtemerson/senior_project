<?php
session_start();

require_once 'model/methods.php';

if (filter_input(INPUT_POST, 'action')){
    $action = filter_input(INPUT_POST, 'action');
}else{
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

  case 'Sign Up':

    $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING));
    $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING));
    $password = filter_input(INPUT_POST, 'passowrd');

    //validate the inputs
    if(empty($name) || empty($email) || empty($password)){
        $error = 'Some required fields are empty.';
        include 'views/register.php';
        exit();
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = register_user($name, $email, $password);

    if($result){
        $message = "$name, you are registered!";
    }else{
        $error = "Sorry $name, there was an error while trying to register you, please try again.";
    }

    include 'views/login.php';
    exit();

    break;

  default:

    if(!$_SESSION['logged_in']){
      include_once 'views/account.php';
    }
    else{
      include_once 'views/pantry.php';
    }

    break;
}

?>
