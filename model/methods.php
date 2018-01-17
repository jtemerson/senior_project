<?php

  //call database connection here

  function sign_up_user($name, $email, $password){
    global $db;
    $query = 'INSERT INTO users(name, username, password)
              VALUES(:name, :email, :password)';
     $statement = $db->prepare($query);
     $statement->bindValue(':name', $name);
     $statement->bindValue(':email', $email);
     $statement->bindValue(':password', $password);
     $statement->execute();
     $result = $statement->rowCount();
     $statement->closeCursor();
     return $result;
  }

?>
