<?php

//Inicio de sesion
session_start();
require('bin/core/config.php');


//Si no estas logeado te reenvia al index
if (!isset($_SESSION['loggedin'] )) {
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  //Datos de post
  $id_anime = $_POST['id_anime'];
  
  //Comprueba si esta vacio

    try {
      $conexion = new PDO("mysql:host=$db_host; dbname=$db_name", $db_username, $db_pass);
    } catch (PDOException $e) {
      echo "Error:" . $e->getMessage();;
    }


}
else {
  $errores .= 'Datos Vacios';
}
}



?>
