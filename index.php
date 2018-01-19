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
    $password = filter_input(INPUT_POST, 'password');

    //validate the inputs
    if(empty($name) || empty($email) || empty($password)){
        $error = 'Some required fields are empty.';
        include 'views/register.php';
        exit();
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = sign_up_user($name, $email, $password);

    if($result){
        $message = "$name, you are registered! Please Login";
    }else{
        $error = "Sorry $name, there was an error while trying to register you, please try again.";
    }

    include 'views/account.php';
    exit();

    break;

  case 'Login':

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    $user = get_user($email);

    if (password_verify($password, $user['password'])){

      $_SESSION['logged_in'] = TRUE;
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['user_id'] = $user['user_id'];
      
      header('Location: .?action=account');
      exit();
    }else{
        $error = 'Login failed. Please try again.';
        include 'views/account.php';
        exit();
    }

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
