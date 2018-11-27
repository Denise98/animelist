<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalCenterTitle">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="modal-content" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  

        <div class="container">
          <label for="usuario"><b>Nombre de usuario</b></label>
          <input type="text" placeholder="Username" name="usuario" required>

          <label for="password"><b>Contraseña</b></label>
          <input type="password" placeholder="Contraseña" name="password" required>
          <!--si hay errore los muestra-->
          <?php if(isset($errores)&&!($errores=='')){ ?>
          	<div class="alert alert-danger" role="alert">
 			<?php echo $errores ?>
			</div>
          <?php } ?>
          <span class="register"><a href="" data-toggle="modal" data-dismiss="modal" data-target="#registro">Registrar</a></span>
          <button type="submit" class="btn-login">Login</button>
        </div>
      </form>
      </div>
    </div>
  </div>
</div>