
<!-- Inicio barra de navegacion -->
<nav class="navbar navbar-expand-xl navbar-dark bg-dark">
	<!-- Contenedor principal -->
	<div class="container">
		<a class="navbar-brand" href="#">AnimeList</a>
		<!-- Boton para version movil -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExample06">
			<ul class="navbar-nav ml-auto ">
				<li class=" <?php if(basename($_SERVER['PHP_SELF'])=="index.php"){  echo("active"); } ?> nav-item">
					<a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
				</li>


				<!--hacemos que el boton acceder solo aparezca cuando no estas logueado-->
				<li class="nav-item">
					<?php if (!isset($_SESSION['loggedin'] )) { ?>
						<a class="nav-link" href="#" data-toggle="modal" data-target="#login">Acceder</a>
					<!--hacemos que los botones mi cuenta, cerrar y mis animes solo aparezcan cuando estas logueado-->
				<?php } else{ ?>
					<a href="cuenta.php" class="nav-link">Mi Cuenta</a>



					</li>
						<li class="<?php if(basename($_SERVER['PHP_SELF'])=="peli.php"){  echo("active"); } ?> nav-item">
						<a class="nav-link" href="my_animes.php">Mis animes</a>
					</li>
					<li>
					<a class="nav-link" href="actions/logout.php">Cerrar</a>

				<?php } ?>
			</li>

			</ul>
			<form  class="margin-left-10"action="buscar.php" method="get" class="navbar-form">
			<input type="text" name="q"class="form-control" placeholder="Buscar" id="buscar">
			</form>
		</div>
	</div>
	<!-- Fin contenedor principal-->
</nav>
<!-- Fin barra de navegacion -->
<?php
require_once('includes/login_modal.php');
require_once('includes/registro_mode.php');
?>
