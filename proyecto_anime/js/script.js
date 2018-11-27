
//hacemos que se pueda enviar el formulario de busqueda con la tecla enter
if(document.querySelector('#buscar')) document.querySelector('#buscar').addEventListener('keypress', (ev) =>{ if(ev.keyCode == 13)  $('form').submit()} , false);


//mostramos en la pagina princial los animes que estan saliendo ahora
const url = 'https://api.jikan.moe/v3/top/anime/1/airing';
$.getJSON(url, function(data) {
    if(!$('#test')) return;
    const obj= data.top
    for(let elm in obj){
    $('#test .row').append(
        ` <div class='col-md-4' >
            <div class='card'><div class='title'>
              <a href='serie.php?id=${data.top[elm].mal_id}'>
                <h4>${data.top[elm].title}</h4>
              </a>
					    <div class= 'thumb text-center'>
                <img src='${data.top[elm].image_url}' class="">
		          </div>
            </div>
          </div>`
        );
   }
});


function remove(data){
  let tr = $(data).parent().parent().parent()[0];
  let nombre = $(tr)[0].querySelector('.name a').innerHTML;
  let userId = $($(tr)[0].querySelector('.punct')).data().id;
  if(confirm('Seguro que quieres borrar '+nombre+' de tu lista?')){
    $.post('actions/my_animes_delete.php', {nombre,userId} , (data)=>{
      location.reload();
    })
  }

}

function update(data){
  let tr = $(data).parent().parent().parent()[0];
  let nombre = $(tr)[0].querySelector('.name a').innerHTML;
  let puntuacion = $(tr)[0].querySelector('.punct').innerHTML;
  let userId = $($(tr)[0].querySelector('.punct')).data().id;
  $.post('actions/my_animes_update.php', {nombre,puntuacion,userId} , (data)=>{
    location.reload();
  })
}

function addToList(nombre,id,userId){
  $.post('actions/my_animes_add.php', {nombre,id,userId} , (data)=>{
    location.reload();
  })
}
