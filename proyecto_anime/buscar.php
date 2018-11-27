<?php
//realizamos la busqueda dentro de la api
if (isset($_GET['q'])) {
  $search=$_GET['q'];
  $content = file_get_contents("https://api.jikan.moe/v3/search/anime?q=$search&limit=28");
  $data=json_decode($content, true);
}


?>
<!DOCTYPE html>
<html>
<?php require_once('includes/head.php') ?>
<body>
  <?php require_once('includes/navbar.php') ?>
  

<div class="container clearfix">
  <div class="row">
    <section class="col-md-8">
      <?php if (!isset($search)) { ?>
        <p>No se han encontrado resultados</p>
      <?php }else{
        ?> <h1 class="bdr-title">Mostrando <?php sizeof($data['results']) ?> Resultados de <?php echo $search?></h1>
        <ul class="list-group">

        <?php
        foreach ($data['results'] as $key => $value) { ?>
          <li class="list-group-item">
              <div class="row">
                <div class="col-md-3">
                  <img src='<?php echo $value['image_url'] ?>' class="img-fluid search-img">
                </div>
                <div class="col-md-9">
                  <h6><a href="serie.php?id=<?php echo $value["mal_id"] ?>"><?php echo $value['title'] ?></a></h6>
                  <hr />
                  <p class="small">
                    <?php echo $value["synopsis"] ?>
                  </p>
                </div>
              </div>

          </li>

        <?php } } ?>

        </ul>
      </section>
      <?php require_once('includes/dia.php'); ?>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <h5>Creado por<span class="nm-footer"> Denise Burgos</span>.</h5>
    </div>
  </footer>
</body>
</html>