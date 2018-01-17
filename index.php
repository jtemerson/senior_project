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

    $result = sign_up_user($name, $email, $password);

    if($result){
        $message = "$name, you are registered!";
    }else{
        $error = "Sorry $name, there was an error while trying to register you, please try again.";
    }

    include 'views/login.php';
    exit();

    break;

  case 'Login':

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    // $user = get_org_by_username($org_username);

    if (password_verify($password, $user['user'])){
      $_SESSION['logged_in'] = TRUE;
      $_SESSION['name'] = $user['name'];
      $_SESSION['email'] = $user['email'];
      $_SESSION['user_id'] = $user['user_id'];
    }else{
        $error = 'Login failed. Please try again.';
        include 'views/account.php';
        exit();
    }

    header('Location: .?action=account');

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
