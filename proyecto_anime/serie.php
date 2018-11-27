<?php if (isset($_GET['id'])) {
	$id=$_GET['id'];
	$content = file_get_contents("https://api.jikan.moe/v3/anime/$id");
	$episodes = @file_get_contents("https://api.jikan.moe/v3/anime/$id/episodes");
	$content_data=json_decode($content, true);
	$episodes_data=json_decode($episodes, true);


}else{
	header('Location: index.php');
} ?>
<!DOCTYPE html>
<html>
<?php require_once('includes/head.php');

require('bin/core/conexion.php');
$query = 'SELECT nombre FROM user_anime_list WHERE id_usuario = :id_usuario AND id_anime = :id_anime';
$statement = $conexion->prepare($query);

$statement->execute(array(
	':id_usuario' => $_SESSION['id_usuario'],
	':id_anime' => $id
));
$resultado = $statement->fetch();

?>
<body>
	<?php require_once('includes/navbar.php') ?>

	<!--recogemos los datos del anime seleccionado-->


	<div id="series" class="container">
		<div class="row">
			<div class="col-md-8">

				<div class="content">
					<div class="contenido clearfix">
						<!--mostramos dichos datos en un perfil de cada uno-->
						<h3><?php echo $content_data['title']; ?></h3>
						<hr />
						<div class="row">
							<div class="col-md-4 border-right">
								<div>
									<img src="<?php echo $content_data['image_url']; ?>" class="img-fluid" alt="imagen no encontrada">
								</div>
								<?php if($resultado == false){  ?> <button onclick='addToList("<?php echo $content_data['title'] .'","'.$id .'","'. $_SESSION['id_usuario']; ?>")' type="button" class="btn btn-primary btn-lg btn-block">Añadir a mi lista</button> <?php } ?>

							</div>
							<div class="col-md-8">
								<table class="text-center table table-bordered">
									<tr>
										<td>
												<span class="block">Puntuacion</span>
											<?php echo $content_data['score']; ?>
										</td>
										<td>
												<span class="block">Duracion</span>
											<?php echo $content_data['duration']; ?>
										</td>
									</tr>
								</table>
								<p class="text-justify synopsis-serie"><?php echo $content_data['synopsis']; ?></p>
							</div>
						</div>



					</div>
				</div>
				<?php if (isset($episodes_data['episodes'])) { ?>
					<hr />
					<div class="panel panel-default">
						<div class="panel-heading text-center padding-5"><h3>Lista de Capitulos</h3></div>
						<ul class="list-group list-group-flush ov-300">

							<?php foreach ($episodes_data['episodes'] as $key => $value) {?>
								<li class="list-group-item">
									<span class="ep-spacer"><?php echo $value['episode_id'] ?></span><a href="<?php echo $value['video_url'] ?>"><?php echo $value['title'] ?></a>
								</li>
							<?php } ?>
						</ul>
					</div>
				<?php } ?>
			</div>
			<?php require_once('includes/dia.php'); ?>
		</div>
	</div>
	<?php
	require_once('includes/footer.php'); ?>
</body>
</html>
