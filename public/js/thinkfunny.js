// SERVICE WORKER
if ('serviceWorker' in navigator) {

  navigator.serviceWorker
    .register('./sw.js', { insecure: true, scope: './' })
    .then(function(registration) {
      console.log("Service Worker Registrado");
    })
    .catch(function(err) {
      console.log("Service Worker Fallo Registro", err);
    })

}


// GAME

// Function to perform HTTP request
var get = function(url) {
  return new Promise(function(resolve, reject) {

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var result = xhr.responseText
                result = JSON.parse(result);
                resolve(result);
            } else {
                reject(xhr);
            }
        }
    };
    
    xhr.open("GET", url, true);
    xhr.send();

  }); 
};


var pregunta;

function initgame(){
	// getData();
	get('api/preguntas')
  .then(function(response) {
  	console.log(response);
  	preguntas = response;
	  pregunta = get_pregunta(preguntas);

		$("#pregunta_color").text(pregunta.pregunta);


		get('api/colores')
	  .then(function(response) {
	  	console.log(response);
	  	colores = response;

			get_colores(pregunta, colores);
			$("#panel_iniciar").hide();
			$("#panel_califica").hide();
			$("#init_juego").slideDown();
	  })
	  .catch(function(err) {
	    console.log("Error", err);
	  })
  })
  .catch(function(err) {
    console.log("Error", err);
  })
}


function get_pregunta(preguntas){
	return preguntas['data'][getRandom(0, preguntas['data'].length - 1)];
}

function get_colores(pregunta, colores){
	var a_color = [];
	var p_color = pregunta.respuesta;
	var temp_color;

	while(a_color.length < 2){
		temp_color = colores['data'][getRandom(0, colores['data'].length - 1)];
		if (p_color != temp_color.color) {
			var in_color = true;
			for (var i = a_color.length - 1; i >= 0; i--) {
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

	var rand_color = [];

	while(rand_color.length < 3){
		var rand = a_color[Math.floor(Math.random() * a_color.length)];
		var in_color = true;
		for (var i = rand_color.length - 1; i >= 0; i--) {
			if (rand_color[i]==rand) {
				in_color = false;
			}
		}
		if (in_color) {
			rand_color.push(rand);
		}
	}
	$('#respuesta_color').html("");
	for (var i = rand_color.length - 1; i >= 0; i--) {
		var cuadro_color = "<a onClick='compRespuesta(\""+rand_color[i]+"\");' class='btn' style='margin: 1em;padding: 4em; background-color: "+rand_color[i]+";'></a>";
		$('#respuesta_color').append(cuadro_color);
	}

}


function getRandom(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

function compRespuesta(res){
	$('#califaca').html('');
	$("#init_juego").hide();
	$("#panel_califica").show();
	if (res==pregunta.respuesta) {
		$('#califaca').html('<i style="font-size: 5em; color:#00bc00;" class="fa fa-check-circle"></i><br><b>Genial!!<br>Respuesta Correcta</b>');

	}else{
		$('#califaca').html('<i style="font-size: 5em; color:#ff3d3d;" class="fa fa-times-circle"></i><br><b>Ohh no!!<br>Respuesta Incorrecta, intentalo de nuevo!!</b>');
	}
}