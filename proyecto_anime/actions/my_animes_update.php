<?php

//Inicio de sesion
session_start();
require('../bin/core/conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Datos de post
  $nombre = trim($_POST['nombre']);
  $puntuacion = trim($_POST['puntuacion']);
  $userId = trim($_POST['userId']);

  try{
    $sql_query = "UPDATE user_anime_list set  punct= '$puntuacion' WHERE id_usuario = '$userId' AND nombre = '$nombre'";
    $statement = $conexion->prepare($sql_query);
    $statement->execute();
    echo('1');
  } catch(PDOException $e){
    print $e->getMessage();
  }
};

?>
