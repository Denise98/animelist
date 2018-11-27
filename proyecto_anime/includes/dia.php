<?php
$rng= rand(1,10825);

//hacemos la peticion para generar un anime aleatorio
function getContent($id){
	if (!@file_get_contents("https://api.jikan.moe/v3/anime/$id")) {
		$rng= rand(1,10825);
		return getContent($rng);

	}
	$content = file_get_contents("https://api.jikan.moe/v3/anime/$id");
	$content_data=json_decode($content, true);
	checkContent($content_data);
}

//comprobamos que no sea contenido para adultos y si lo es generamos uno nuevo hasta que no lo sea
function checkContent($content){
	$haveHentai= false;
	foreach ($content['genres'] as $key => $value) {
		if ($value['mal_id']==12) {
			$haveHentai=true;
		}
	}
	if ($haveHentai) {
		$rng= rand(1,10825);
		getContent($rng);
	} else { ?>

		<aside class="col-md-4">
			<div class="side-bar">
				<h3 class="bdr-title text-center">Anime destacado</h3>
				<div class="content-side">
					<div class="side-day">

						<h5 align="center"><a href="http://localhost:8002/proyecto_anime/serie.php?id=<?php echo $content['mal_id']; ?>"><?php echo $content['title']; ?></a></h5>
						<div class="text-center-important">
							<img src="<?php echo $content['image_url']; ?>" class="">
						</div>
						<div class="sinopsis container">
							<p class="text-justify"><?php echo $content['synopsis']; ?></p>
						</div>
					</div>
				</div>

			</aside>
		<?php
 	}
}
	getContent($rng);
	?>
