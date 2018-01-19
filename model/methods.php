<?php
  session_start();

  //Call database connection
  require('db.php');

  function sign_up_user($name, $email, $password){
    global $db;
    $query = 'INSERT INTO users(name, email, password) VALUES(:name, :email, :password)';
     $statement = $db->prepare($query);
     $statement->bindValue(':name', $name, PDO::PARAM_STR);
     $statement->bindValue(':email', $email, PDO::PARAM_STR);
     $statement->bindValue(':password', $password, PDO::PARAM_STR);
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

?>
