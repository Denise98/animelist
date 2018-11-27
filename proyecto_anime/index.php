<!DOCTYPE html>
<html>
  <!-- Incluir la cabecera desde includes/head.php -->
  <?php require_once('includes/head.php') ?>
<body>
  <!-- Incluir la  barra principal desde includes/navbar.php -->
  <?php require_once('includes/navbar.php') ?>
  <div class="container clearfix">
    <div class="row">
      <section class="col-md-8">
        <article class="content clearfix" id="test">
          <h1 class="bdr-title">Ultimas Series o Peliculas</h1>
          <div class="row">
            <!--aqui va el contenido de sript.php-->
          </div>
        </article>
      </section>
      <?php require_once('includes/dia.php'); ?>
    </div>
  </div>

  <?php
  require_once('includes/login_modal.php');
  require_once('includes/footer.php'); ?>
</body>
</html>
