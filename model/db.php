<?php
  //connect to the database
  $dbUser = 'postgres';
  $dbPassword = 'postgres';
  $dbName = 'smart_pantry';
  $dbHost = 'localhost';
  $dbPort = '5432';
  try{
  	// Create the PDO connection
  	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
  	// $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  }catch (PDOException $ex){
  	echo "Error connecting to DB. Details: $ex";
  	die();
  }
 ?>
