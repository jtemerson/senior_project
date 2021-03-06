<?php
  session_start();

  //Call database connection
  require('db.php');

  function sign_up_user($name, $email, $password){
    global $db;
    $query = 'INSERT INTO users(name, email, password) VALUES(:name, :email, :password)';
     $statement = $db->prepare($query);
     $statement->bindValue(':name', $name);
     $statement->bindValue(':email', $email);
     $statement->bindValue(':password', $password);
     $statement->execute();
     $result = $statement->rowCount();
     $statement->closeCursor();
     return $result;
   }

   function get_user($email){
     global $db;
     $query = 'SELECT * FROM users
               WHERE email = :email';
     $statement = $db->prepare($query);
     $statement->bindValue(':email', $email);
     $statement->execute();
     $user = $statement->fetch();
     $statement->closeCursor();
     return $user;
   }

   function get_pantries($user_id){
     global $db;
     $query = 'SELECT * FROM pantries
               WHERE user_id = :id';
     $statement = $db->prepare($query);
     $statement->bindValue(':id', $user_id);
     $statement->execute();
     $pantries = $statement->fetchAll();
     $statement->closeCursor();
     return $pantries;
   }

   function get_items($pantry_id){
     global $db;
     $query = 'SELECT * FROM items
               WHERE pantry_id = :id';
     $statement = $db->prepare($query);
     $statement->bindValue(':id', $pantry_id);
     $statement->execute();
     $items = $statement->fetchAll();
     $statement->closeCursor();
     return $items;
   }

   function add_pantry($user_id, $name){
     global $db;
     $query = 'INSERT INTO pantries(user_id, name) VALUES(:user_id, :name)';
      $statement = $db->prepare($query);
      $statement->bindValue(':user_id', $user_id);
      $statement->bindValue(':name', $name);
      $statement->execute();
      $result = $statement->rowCount();
      $statement->closeCursor();
      return $result;
   }

   function add_item($pantry_id, $name, $quantity, $brand, $expiration, $shopping_list, $shopping_list_quantity){
     global $db;
     $query = 'INSERT INTO items(pantry_id, name, quantity, brand, expiration, shopping_list, shopping_list_quantity)
                VALUES(:pantry_id, :name, :quantity, :brand, :expiration, :shopping_list, :shopping_list_quantity)';
      $statement = $db->prepare($query);
      $statement->bindValue(':pantry_id', $pantry_id);
      $statement->bindValue(':name', $name);
      $statement->bindValue(':quantity', $quantity);
      $statement->bindValue(':brand', $brand);
      $statement->bindValue(':expiration', $expiration);
      $statement->bindValue(':shopping_list', $shopping_list);
      $statement->bindValue(':shopping_list_quantity', $shopping_list_quantity);
      $statement->execute();
      $result = $statement->rowCount();
      $statement->closeCursor();
      return $result;
   }

   function get_item($item_id){
     global $db;
     $query = 'SELECT * FROM items
               WHERE id = :id';
     $statement = $db->prepare($query);
     $statement->bindValue(':id', $item_id);
     $statement->execute();
     $user = $statement->fetch();
     $statement->closeCursor();
     return $user;
   }

   function edit_item($item_id, $name, $quantity, $brand, $expiration, $shopping_list, $shopping_list_quantity){
     global $db;
    $query = 'UPDATE items
                SET name = :name, quantity = :quantity, brand = :brand, expiration = :expiration, shopping_list = :shopping_list, shopping_list_quantity = :shopping_list_quantity
                WHERE id = :item_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':brand', $brand);
    $statement->bindValue(':expiration', $expiration);
    $statement->bindValue(':shopping_list', $shopping_list);
    $statement->bindValue(':shopping_list_quantity', $shopping_list_quantity);
    $statement->bindValue(':item_id', $item_id);
    $statement->execute();
    $statement->closeCursor();
   }

   function get_shopping_list_items($pantry_id){
     global $db;
     $query = 'SELECT * FROM items
               WHERE pantry_id = :id AND shopping_list = 1' ;
     $statement = $db->prepare($query);
     $statement->bindValue(':id', $pantry_id);
     $statement->execute();
     $shopping_list_items = $statement->fetchAll();
     $statement->closeCursor();
     return $shopping_list_items;
   }

?>
