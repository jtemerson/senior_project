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
        include 'views/login.php';
        exit();
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $result = sign_up_user($name, $email, $password);

    if($result){
        $message = "$name, you are registered! Please Login";
    }else{
        $error = "Sorry $name, there was an error while trying to register you, please try again.";
    }

    include 'views/login.php';
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
      $_SESSION['user_id'] = $user['id'];

      header('Location: .?action=account');
      exit();
    }else{
        $error = 'Login failed. Please try again.';
        include 'views/login.php';
        exit();
    }

    break;

  case 'pantry':

    $user_id = $_SESSION['user_id'];

    $pantries = get_pantries($user_id);

    include 'views/pantries.php';

    break;

  case 'add_pantry':

    $user_id = $_SESSION['user_id'];
    $name = filter_input(INPUT_POST, 'name');

    if(!$name){
      $error = "If you would like to add a pantry, please enter a name.";
      include 'views/pantries.php';
      exit();
    }

    $result = add_pantry($user_id, $name);

    if($result){

    }else{
        $error = "Sorry, $name could not be created";
    }

    header('Location: .?action=pantry');
    exit();

    break;

  case 'items':

    $pantry_id = filter_input(INPUT_GET, 'pantry_id', FILTER_VALIDATE_INT);
    $pantry_name = filter_input(INPUT_GET, 'pantry_name');

    $items = get_items($pantry_id);

    include 'views/items.php';

    break;

  case 'add_item_page':

    $pantry_id = filter_input(INPUT_POST, 'pantry_id', FILTER_VALIDATE_INT);
    $pantry_name = filter_input(INPUT_POST, 'pantry_name');

    include 'views/add_item.php';

    break;

  case 'add_item':

    $pantry_id = filter_input(INPUT_POST, 'pantry_id', FILTER_VALIDATE_INT);
    $pantry_name = filter_input(INPUT_POST, 'pantry_name');
    $name = filter_input(INPUT_POST, 'name');
    $quantity = filter_input(INPUT_POST, 'quantity');
    $brand = filter_input(INPUT_POST, 'brand');
    $expiration = filter_input(INPUT_POST, 'expiration');
    if(filter_input(INPUT_POST, 'shopping_list') == "yes"){
      $shopping_list = 1;
    }
    else{
      $shopping_list = 0;
    }
    $shopping_list_quantity = filter_input(INPUT_POST, 'shopping_list_quantity');

    if(!$name){
      $error = "If you would like to add an item, please enter a name.";
      include 'views/add_item.php';
      exit();
    }

    // echo $pantry_id . ', ' . $name . ', ' . $quantity . ', ' . $brand . ', ' . $barcode . ', ' . $expiration . ', ' . $shopping_list . ', ' . $shopping_list_quantity;
    // exit;

    $result = add_item($pantry_id, $name, $quantity, $brand, $expiration, $shopping_list, $shopping_list_quantity);

    if($result){

    }else{
        $error = "Sorry, $name could not be created";
        include 'views/add_item.php';
        exit;
    }

    $items = get_items($pantry_id);

    include 'views/items.php';
    exit();

    break;

  default:

    if(!$_SESSION['logged_in']){
      include_once 'views/login.php';
    }
    else{
      header('Location: .?action=pantry');
    }

    break;
}

?>
