jQuery(document).foundation();

jQuery(document).ready(($)=>{
    $('#platillos > div').not(':first').hide();
  jQuery('#filtrar .menu li:first-child').addClass('active');

  $('#filtrar .menu a').on('click', function() {
      jQuery('#filtrar .menu li').removeClass('active');
      jQuery(this).parent().addClass('active');

      var enlace = $(this).attr('href');

      $('#platillos > div').hide();
      $(enlace).fadeIn();
      return false;
  });

  var fecha = new Date();
  var hora = fecha.getHours()
  var comida = "";

  if(hora <= 10){
    comida = "desayunar";
  }else if(hora >= 11 && hora <= 17){
    comida = "comer";
  }else{
    comida = "cenar"
  }

  jQuery.ajax({
	url : admin_url.ajax_url,
	type : 'post',
	data : {
		action : `recetas_${comida}`
	}
}).done((response)=> {
  $('#hora').append('<em>'+comida+'</em>');
  $.each(response, function(index, object) {
    var plato_hora = '<li class="medium-4 small-12 columns">' +
                      object.imagen +
                      '<div class="contenido">'+
                      '<h3 class="text-center">'+
                      '<a href="'+object.link+'">' +
                        object.nombre +'</h3>' +
                      '</a>'+
                      '</div>'+
                     '</li>';
  
    $('#por-hora').append(plato_hora);
  });
});
});