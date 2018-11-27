<?php

//Inicio de sesion
session_start();
require('../bin/core/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Datos de post
  $nombre = trim($_POST['nombre']);
  $userId = trim($_POST['userId']);

  try{
    $sql_query = "DELETE FROM user_anime_list WHERE id_usuario = '$userId' AND nombre = '$nombre'";
    $statement = $conexion->prepare($sql_query);
    $statement->execute();

  } catch(PDOException $e){
    print $e->getMessage();
  }
};



?>
