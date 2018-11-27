<?php

//Inicio de sesion
session_start();
require('../bin/core/conexion.php');


//Si no estas logeado te reenvia al index
if (!isset($_SESSION['loggedin'] )) {
  header('Location: ../index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  
  //Datos de post
  $usuario=$_SESSION['usuario'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $newpassword = hash('sha512', trim($_POST['newpassword']));
  $oldpassword = hash('sha512',trim($_POST['oldpassword']));
  
  //Comprueba si esta vacio
  if (CheckIt($nombre)&&CheckIt($apellido)) {
    
    
    //Si la contraseña cambia:
    if(CheckIt($newpassword)&&CheckIt($oldpassword)){
      
      $query = 'SELECT password FROM usuario WHERE usuario = :usuario AND password = :password';
      $statement = $conexion->prepare($query);
      $statement->execute(array(
        ':usuario' => $usuario,
        ':password' => $oldpassword
      ));
      
      $resultado = $statement->fetch();
      if ($resultado !== false) {
        try{
          $usuario=$_SESSION['usuario'];
          $sql_query = "UPDATE usuario set nombre= '$nombre', apellido= '$apellido', password= '$newpassword' WHERE usuario = '$usuario'";
          $statement = $conexion->prepare($sql_query);
          $statement->execute();
        } catch(PDOException $e){
          displayError($e->getMessage());
        }
        print_r( $statement->debugDumpParams());
      } else {
        header('Location: ../cuenta.php?err=La contraseña no coincide');
      }

      //Si no se cambia la contraseña
    }else{
      try {
        $usuario=$_SESSION['usuario'];
        $sql_query = "UPDATE usuario SET nombre='$nombre', apellido='$apellido' WHERE usuario='$usuario'";
        $statement = $conexion->prepare($sql_query);
        $statement->execute();
      }
      catch(PDOException $e)
      {
        displayError($e->getMessage());
      }
    }
    
    } else {
      $errores .= 'Datos Vacios';
      //header('Location: ../cuenta.php?err='.$errores);
      echo 'mala cosa';
    }
  //header('Location: ../cuenta.php');
  }



//funcion que comprueba que no esta enviando datos vacios
function CheckIt($a){
  return !(empty(trim($a))||trim($a)=='');
}



?>
