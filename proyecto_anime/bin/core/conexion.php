<?php

  //Inlcude database connection information.
  include_once('config.php');

  //Try to connect to the database.
  try{
    $conexion = new PDO("mysql:host=$db_host; dbname=$db_name", $db_username, $db_pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->exec("SET CHARACTER SET utf8");
  } catch(PDOException $e){
    //If the connection fails, print the main error.
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
  }

?>
