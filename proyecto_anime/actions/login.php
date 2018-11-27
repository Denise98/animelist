<?php
  include('bin/core/conexion.php');

  function login($conexion){

  	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
  	$password = trim($_POST['password']);
  	$password = hash('sha512', $password);
  	$errores = '';


  	//comprueba que el usuario y la cotraseña coinciden
  	$statement = $conexion->prepare('
  		SELECT * FROM usuario WHERE usuario = :usuario AND password = :password'
  	);
  	$statement->execute(array(
  		':usuario' => $usuario,
  		':password' => $password
  	));

  	$resultado = $statement->fetch();
  	if ($resultado !== false) {
  		//session_register($usuario);
  		$_SESSION['id_usuario']= $resultado['idusuario'];
  		$_SESSION['usuario'] = $usuario;
  		$_SESSION['loggedin'] = true;

  	} else {
  		$errores .= 'Datos Incorrectos';

  	}

  	//metemos en la base de datos los datos de la sesion del usuario
  	$date = new DateTime();
  	$d = $date->format('Y-m-d H:i:s');
  	$statement = $conexion->prepare('INSERT INTO login_attempts (fecha, success, usuario, ipusuario) VALUES (:fecha, :success, :user, :ip)');
  		$statement->execute(array(
  			':fecha' => $d,
  			':success' => $resultado !== false,
  			':user'=>$usuario,
  			':ip'=>$_SERVER['REMOTE_ADDR']
  		));
  	return $errores;
  }

?>
