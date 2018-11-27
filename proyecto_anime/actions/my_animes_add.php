<?php

//Inicio de sesion
session_start();
require('../bin/core/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Datos de post
  $nombre = trim($_POST['nombre']);
  $id = trim($_POST['id']);
  $userId = trim($_POST['userId']);

  try{
    $sql_query = "INSERT INTO user_anime_list (nombre,id_usuario,id_anime)  VALUES('$nombre','$userId','$id')";
    $statement = $conexion->prepare($sql_query);
    $statement->execute();
  } catch(PDOException $e){
    print $e->getMessage();
  }
};

?>
