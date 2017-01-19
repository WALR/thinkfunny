$( document ).ready(function() {
	var colores = {};
	var preguntas = {};

  $.ajax({
      url: "api/colores",
      async: false,
      dataType: 'json',
      success: function(data) {
          colores = data;
      }
  });
  $.ajax({
      url: "api/preguntas",
      async: false,
      dataType: 'json',
      success: function(data) {
          preguntas = data;
      }
  });

  // console.log(colores['data'].length);

	// $.getJSON( "api/preguntas", function( data ) {
	//   preguntas = data;
	//   console.log(preguntas);
	// });

	if (typeof colores != 'undefined' && typeof preguntas != 'undefined'){
	}


	// function initgame(){
				
	// 	var pregunta = get_pregunta();
	// 	console.log(pregunta);
	// 	$("#btn_iniciar").hide();
	// 	$("#init_juego").slide('slow');

	// }


	$('#btn_init').click(function(evt) {
      evt.preventDefault();
      var pregunta = get_pregunta();
			console.log(pregunta.pregunta);

			$("#pregunta_color").text(pregunta.pregunta);
			var resp_colores = get_colores(pregunta);
			$("#panel_iniciar").hide();
			$("#init_juego").slideDown();

   });


	function get_pregunta(){
		return preguntas['data'][getRandom(0, preguntas['data'].length - 1)];
	}

	function get_colores(pregunta){
		var a_color = [];
		var p_color = pregunta.respuesta;
		var temp_color;


		// console.log(temp_color);
		// console.log(p_color);
		while(a_color.length < 2){
			temp_color = colores['data'][getRandom(0, colores['data'].length - 1)];
			if (p_color != temp_color.color) {
				var in_color = true;
				for (var i = a_color.length - 1; i >= 0; i--) {
					a_color[i]
					if (a_color[i]==temp_color.color) {
						in_color = false;
					}
				}

				if (in_color) {
					a_color.push(temp_color.color);
				}

			}
		}

		a_color.push(p_color);

		console.log(a_color);

		return a_color;

		// color.push(colores[data][getRandom(0, colores['data'].length - 1)])
	}

	// function setDate(data){
	// 	colores = data;
	// 	// console.log(colores);
	// }

	// console.log(colores);




	function getRandom(min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
	}

});