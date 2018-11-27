<!DOCTYPE html>
<html lang="en">
<?php
require('bin/core/config.php');

require('includes/head.php');

//comprobamos que el usuario esta logueado
if (!isset($_SESSION['loggedin'] )) {
  	header('Location: index.php');}

try{
		$conexion = new PDO("mysql:host=$db_host; dbname=$db_name", $db_username, $db_pass);
	$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$conexion->exec("SET CHARACTER SET utf8");
	}
	catch(Exception $err){

	}

	//recogemos el nombre y apellidos
	$statement = $conexion->prepare('
		SELECT nombre, apellido FROM usuario WHERE usuario = :usuario'
	);
	$statement->execute(array(
		':usuario' => $_SESSION['usuario']
	));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$nombre=$resultado['nombre'];
		$apellido=$resultado['apellido'];
	}

?>
<body>
<?php require('includes/navbar.php'); ?>


<section id="profile">
<div class="container">
	<div class="row">
		<div class="col-md-12 text-center">
		<h2 class="titulo text-center"><?php echo $_SESSION['usuario']?></h2>
			<form action="actions/update.php" method="post">
				<!--ponemos en los inputs el nombre y apellido actual como valor predefinido-->
				<label for="">Nombre</label>
				<input type="text" name="nombre" value="<?php echo $nombre ?>">
				<label for="">Apellido</label>
				<input type="text" name="apellido" value="<?php echo $apellido ?>">
        <div class="row">
          <div class="col-md-6">
            <label for="">Contraseña actual</label>
    				<input type="password" name="oldpassword">
          </div>
          <div class="col-md-6">
            <label for="">Nueva Contraseña</label>
    				<input type="password" name="newpassword">
          </div>

        </div>

				<input type="submit" value="Actualizar" class="btn btn-primary btn-block btn-lg">
			</form>
		</div>
	</div>
</div>
</section>

<?php require('includes/footer.php') ?>
</body>
</html>
