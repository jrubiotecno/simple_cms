function loguear(){

	var id = $("usuario").value;
	var option = $("clave").value;

	if (!$('contentErrorLogueo').visible())
		Effect.BlindDown('contentErrorLogueo');


	procesoAjax('usuarios','loginDo',id,option,'','msjErrorLogueo','Procesando...');

	new PeriodicalExecuter(function(pe) {

		//VALIDAMOS ESTE OBJETO PARA HACER REDIRECCION
		if ($('logueado')!=null){
			if ($('logueado').innerHTML=="true")
				location.href='index.php?login';
			pe.stop();
		}

	}, 1.5);

}

function logout(){

	procesoAjax('usuarios','logout','','','','msjErrorLogueo','');

	new PeriodicalExecuter(function(pe) {

		//VALIDAMOS ESTE OBJETO PARA HACER REDIRECCION
		if ($('logout')!=null){
			location.href='index.php?logout';
			pe.stop();
		}

	}, 1.5);

}

function recordarClave(){

	var email = $("email").value;
	procesoAjax('usuarios','recordarClaveDo',email,'','','msjError','Procesando...');

}

function formRecordarClave(){
	document.getElementById('fade').style.display='block';
	$("msjError").innerHTML = "";
	Effect.BlindDown('ligthbox');
	return false;
}

function enviarContactenos(){

	var forma = document.formaContactenos;

	if (validarForma(forma))
		forma.submit();

}

function verFAQ(idPregunta, indice){

	var divFAQ = "faq_" + indice;

	//TOMO EL TOTAL DE FAQS PARA OCULTAR SUS DIVS.
	var total = $("totalPreguntas").value

	for (var i=1;i<=total;i++){
		$("faq_" + i).hide();
	}

	$(divFAQ).show();
	procesoAjax('faq','verFAQ',idPregunta,'','',divFAQ,'');

}

function buscarTexto(){

	var forma = $("formaBuscador");

	if ($("textBuscador").value=="")
		alert("El campo del buscador es obligatorio.");
	else
		forma.submit();
}

function mostrarDivCampeonato(div){

	$("grupos").hide();
	$("calendario").hide();
	$("posiciones").hide();
	$("estadisticas").hide();

	$(div).show();
}

function verGrupo(indice){

	var totalGrupos = $("totalGrupos").value;

	for (i=1;i<=totalGrupos;i++){
		$("grupo_" + i).hide();
	}

	$("grupo_" + indice).show();

}

function mostrarDivEstadisticas(div){

	$("goleadores").hide();
	$("equipos").hide();
	$("tarjetas").hide();

	$(div).show();

}

function mostrarDivEstadisticasEquipos(div){

	$("equipos_tarjetas").hide();
	$("equipos_goles").hide();

	$(div).show();

}

function mostrarDivCalendario(div){

	$("calendario_programacion").hide();
	$("calendario_tarjetas").hide();

	$(div).show();

}

function enviarEncuesta(){

	var forma = $('formEncuesta');
	var radio = forma.elements["respuesta"];
	var respondida = false;

	for (var i=0; i<radio.length; i++){
		if (radio[i].checked)
			respondida = true;
	}

	if (respondida)
		forma.submit();
	else
		alert("Por favor seleccione una opcion de respuesta.");

}