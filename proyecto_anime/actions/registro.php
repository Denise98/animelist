<?php  include('../bin/core/conexion.php');
session_start();
if (isset($_SESSION['usuario'])) {
	header('Location: ../index.php');
}

//comprobamos que los datos estan rellenos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$nombre = $_POST['nom'];
	$apellido = $_POST['ape'];
	$password = trim($_POST['password']);
	$password2 = trim($_POST['password2']);

	$errores = '';

	if (empty($usuario) or empty($password) or empty($password2)) {
		$errores .= '<li>Por favor rellena todos los datos correctamente</li>';
	} else {


		$statement = $conexion->prepare('SELECT * FROM usuario WHERE usuario = :usuario LIMIT 1');
		$statement->execute(array(':usuario' => $usuario));
		$resultado = $statement->fetch();

		if ($resultado != false) {
			$errores .= 'El nombre de usuario ya existe';
		}

		//comprobamos que las 2 contraseñas son iguales

		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		if ($password != $password2) {
			$errores .= 'Las contraseñas no son iguales';
		}
	}
	//creamos al usuario
	if ($errores == '') {
		$statement = $conexion->prepare('INSERT INTO usuario (idusuario, usuario, password, nombre, apellido) VALUES (null, :usuario, :pass, :nom, :ape)');
		$statement->execute(array(
			':usuario' => $usuario,
			':pass' => $password,
			':nom'=>$nombre,
			':ape'=>$apellido
		));

		header('Location: ../index.php');
	}
}


?>
