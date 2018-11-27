<div class="modal fade" id="registro" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle">Registrate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="modal-content" action="actions/registro.php" method="post">


        <div class="container">
          <label for="usuario"><b>Nombre de usuario</b></label>
          <input type="text" placeholder="Usuario" name="usuario" required>
          <label for="nom"><b>Nombre</b></label>
          <input type="text" placeholder="Nombre" name="nom" required>
          <label for="ape"><b>Apellidos</b></label>
          <input type="text" placeholder="Apellidos" name="ape" required>

          <label for="password"><b>Contraseña</b></label>
          <input type="password" placeholder="Contraseña" name="password" required>
          <label for="password2"><b>Repetir Contraseña</b></label>
          <input type="password" placeholder="Repetir Contraseña" name="password2" required>
          <!--si hay errores los muestra-->
			<?php if(isset($errores)&&!($errores=='')){ ?>
          	<div class="alert alert-danger" role="alert">
 			<?php echo $errores ?>
			</div>
          <?php } ?>
          <span class="register"><a href="" data-dismiss="modal" data-target="#login">Acceder</a></span>
          <button type="submit" class="btn-login">Registrarse</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>
