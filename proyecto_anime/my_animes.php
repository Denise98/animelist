<!DOCTYPE html>
<html lang="en">
<?php
require('bin/core/conexion.php');
require('includes/head.php');

$query = 'SELECT nombre, punct,id_anime FROM user_anime_list WHERE id_usuario = :id_usuario';
$statement = $conexion->prepare($query);

$statement->execute(array(
	':id_usuario' => $_SESSION['id_usuario']
));
$resultado = $statement->fetchAll();
?>
<body>
	<?php require('includes/navbar.php'); ?>

	<?php if(!isset($_SESSION['loggedin'])){ ?>

		<div class="text-center alert alert-danger">NO ESTAS LOGEADO</div>
	<?php }else{ ?>
		<section id="lista">
			<div class="container">


				<!-- Aqui va la tabla -->


				<?php
				if ($resultado == false) {
					?> <div class="alert alert-primary" role="alert">  No tienes ningun anime en tu lista! </div> <?php
				} else {
					?>
					<h3 class="text-center">Lista de animes guardados</h3>
					<table class="text-center table table-bordered">
						<thead>
							<tr>
								<th scope="col">Anime</th>
								<th scope="col">Puntuacion</th>
								<th scope="col">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach ($resultado as $row) { ?>
								<tr>
									<th class="name" scope="row" ><a href="serie.php?id=<?php echo $row['id_anime'] ?>"><?php echo $row['nombre'] ?></a></th>
									<td data-id="<?php echo $_SESSION['id_usuario'] ?>" class="punct"  contenteditable="true"><?php echo $row['punct'] ?></td>
									<td>
										<div><span class="red pointer" onclick="remove(this)"><ion-icon name="trash"></ion-icon></span><span class="green pointer" onclick="update(this)"><ion-icon name="arrow-up"></ion-icon></span></div>
									</td>
								</tr>
							<?php }
						}?>
					</tbody>
				</table>
			</div>

		</section>

	<?php } ?>

	<script src="https://unpkg.com/ionicons@4.4.7/dist/ionicons.js"></script>
	<?php require('includes/footer.php') ?>
</body>
</html>
