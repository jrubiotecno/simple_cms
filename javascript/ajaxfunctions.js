function onMsjUpdate(mensaje,divActualizar){

	divResultDatos = $(divActualizar);
	divResultDatos.innerHTML = mensaje;
}

function onMsjAlert(mensaje){
	divResultDatos = $('resultDatos');
	divResultDatos.innerHTML = "";
	divMensaje = $('msjAccion');
	divMensaje.innerHTML = mensaje + " <img src='./imagenes/loading1.gif'>";
}

function offMsjAlert(){
	divMensaje = $('msjAccion');
	divMensaje.innerHTML = "";
}


//Funcion que permite traer los resultados de la paginacion de una tabla
//Implementada por: Andres Bravo.
function paginadorAjax(pagina,order_by,direction,mensaje,modulo,accion,p_id,p_option,p_option2) {

	var url = "index.php";

  	var param = {
		parameters:"Ajax=true&paginando=true&accion="+accion+"&pagina="+pagina+"&order_by="+order_by+"&order_direction="+direction+"&modulo="+modulo+"&id="+p_id+"&option="+p_option+"&option2="+p_option2,
		onLoading: onMsjUpdate(mensaje,'resultDataGrid')
	};

  	var peticion = new Ajax.Updater("resultDataGrid",url,param);

}

function procesoAjax(modulo,accion,id,option,option2,divActualizar,mensaje) {

 	var url = "index.php";

  	var param = {
				parameters:"Ajax=true&accion="+accion+"&modulo="+modulo+"&id="+id+"&option="+option+"&option2="+option2,
				onLoading: onMsjUpdate(mensaje, divActualizar)
			};

  	var peticion = new Ajax.Updater(divActualizar,url,param);

}

function procesoAjaxForm(forma,divActualizar,mensaje) {

 	var url = "index.php";

	//DETERMINAMOS SI SE DEBE SERIALIZAR UN FORMULARIO
	var datosSerializados = "";
	datosSerializados = $(forma).serialize();
  	var param = {
				parameters:"Ajax=true&"+datosSerializados,
				onLoading: onMsjUpdate(mensaje, divActualizar)
			};

  	var peticion = new Ajax.Updater(divActualizar,url,param);

}

function procesoAjaxDialog(modulo,accion,id,option,mensaje,ancho,alto,progreso,funcion1) {

	var ejecutaFuncion = true;
	if (typeof funcion1=='undefined')
		ejecutaFuncion = false;


 	var url = "index.php";

  	var param = {
	  				parameters:"Ajax=true&accion="+accion+"&modulo="+modulo+"&id="+id+"&option="+option,
	  				onLoading: openInfoDialog(mensaje, ancho, alto,progreso),
	  				onComplete: function(transport) {
						Dialog.setInfoMessage(transport.responseText)
						//setTimeout("closeDialog()", 2000)
						if (ejecutaFuncion)
							setTimeout(eval(funcion1), 1000);
					}

	  			};

  	var peticion = new Ajax.Request(url,param);

}

function procesoAjaxDialogForm(modulo,forma,mensaje,ancho,alto,progreso,funcion1) {

	var ejecutaFuncion = true;
	if (typeof funcion1=='undefined')
		ejecutaFuncion = false;

	//SERIALIZAMOS UN FORMULARIO
	datosSerializados = "&"+$(forma).serialize();

 	var url = "index.php";

  	var param = {
	  				parameters:"Ajax=true"+datosSerializados,
	  				onLoading: openInfoDialog(mensaje, ancho, alto,progreso),
	  				onComplete: function(transport) {
						Dialog.setInfoMessage(transport.responseText)
						setTimeout("closeDialog()", 1000)
						if (ejecutaFuncion)
							setTimeout(eval(funcion1), 1000);
					}

	  			};

  	var peticion = new Ajax.Request(url,param);

}


/****************************************************************/

//Funcion que permite traer los resultados de la paginacion de una tabla
//Implementada por: Andres Bravo.
function paginadorAjaxAdmin(pagina,order_by,direction,mensaje,archivo_control,modulo,accion,id,option,option2) {


 	var url = archivo_control + ".php";

  	var param = {
	  				parameters:"Ajax=true&paginando=true&modulo="+modulo+"&accion="+accion+"&id="+id+"&option="+option+"&option2="+option2+"&pagina="+pagina+"&order_by="+order_by+"&order_direction="+direction,
	  				onLoading: onMsjUpdate(mensaje, "resultDatos")
	  			};

  	var peticion = new Ajax.Updater("resultDatos",url,param);

}


function procesoAjaxAdmin(archivo_control, modulo,accion,id,option,option2,divActualizar,mensaje) {

 	var url = archivo_control + ".php";

  	var param = {
				parameters:"Ajax=true&accion="+accion+"&modulo="+modulo+"&id="+id+"&option="+option+"&option2="+option2,
				onLoading: onMsjUpdate(mensaje, divActualizar)
			};

  	var peticion = new Ajax.Updater(divActualizar,url,param);

}

//Funcion que permite borrar un registro de la base de datos
//Implementada por: Andres Bravo.
function deleteRegisterAjax(tabla,id,campo,indice) {

	//ENVIA MENSAJE DE CONFIRMACION DE LA ELIMINACION
	if (confirm('Usted va a eliminar el registro, Esta seguro?')){

		var url = "control_procesos.php";

  		var param = {
	  				parameters:"Ajax=true&accion=delete&tabla="+tabla+"&id="+id+"&campo="+campo,
	  				onComplete: paginadorAjaxAdmin(1,'','','Deleting','resultados_tablaXML','')
	  				};

  		var eliminacion = new Ajax.Request(url,param);

	}
}

//Funcion que permite cambiar nombre o crear un perfil de usuario
//Implementada por: Andres Bravo.
function editPerfil(is_new) {

	var nombreNuevo;

	nombreNuevo = prompt("Ingrese el nombre para el Perfil:","");

	if (nombreNuevo != null){
		
		http = getHttpRequestx();
	    http.onreadystatechange = ProcessServerResponse; //Sin los parentesis

		
		if (nombreNuevo.length < 1)
			alert("No se ingrese un nombre de perfil valido");
		else{

			var id = "";
			if (!is_new){
				if (typeof(document.getElementById('id_perfil'))=='object')
					id = document.getElementById('id_perfil').value;
			}

			//LLAMA LA PAGINA DONDE SE HACE LA CONSULTA
			http.open("POST","./control_perfiles.php", true);
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
			http.send("Ajax=true&accion=cambiar_nombre&nombre="+nombreNuevo+"&id="+id);

			//DETERMINA SI ESTA ACTUALIZANO O INSERTANTO UN PERFIL
			if (id!="")
				document.getElementById('nombrePerfil').innerHTML = nombreNuevo;
			else
				window.setTimeout("details('control_perfiles','','','');",1000);

		}
	}


}

function getHttpRequestx()
{
    var httpreq;
    //si es Mozilla, Opera, ...
    if (window.XMLHttpRequest)
    {
        httpreq = new XMLHttpRequest();
    }
    else //Internet Explorer
    {
        httpreq = new ActiveXObject('Microsoft.XMLHTTP');
    }
    return httpreq;
}

function ProcessServerResponse()
{
    if (http.readyState==4) //4: Completado
    {
        if (http.status == 200) //200: OK
        {
            res = http.responseText; //o responseXML
            //ProcesarRespuesta(res);
        }
        else //Se produjo un error
        {
            alert('No se pudo recuperar la informacion : '+http.statusText);
        }
    }
}

/*************** ESTAS FUNCIONES SI EXISTEN SIEMPRE **************************/
function validarUsuario(){

	var forma = $('logueo');
	var usuario = forma.usuario.value;
	var pass = forma.clave.value;

	if (validarForma(forma)){

		var accion = "validarUsuario";
		var modulo = "admin";
		var mensaje = "Revisando Usuarios...";
		var divActualizar = "msjLogueo";

		var url = "./templates/index.php";

		var param = {
					parameters:"Ajax=true&accion="+accion+"&modulo="+modulo+"&usuario="+usuario+"&pass="+pass,
					onLoading: onMsjUpdate(mensaje, divActualizar),
					onComplete: function(transport) {
						if (transport.responseText=='logueado'){
							location.href=url;
						}
					}
				};

		var peticion = new Ajax.Updater(divActualizar,url,param);


	}

}

function resethoraini(chk){
	if (chk==true) {
		document.getElementById("hora_ini").selectedIndex=0;
		document.getElementById("minuto_ini").selectedIndex=0;
		document.getElementById("tipofinal").selectedIndex=1;
		document.getElementById("tipofinal").style.border="2px red solid";
	} else{
		document.getElementById("tipofinal").selectedIndex=0;
		document.getElementById("tipofinal").style.border="";
	}
}

function resethorafin(chk){
	if (chk==true) {
		document.getElementById("hora_fin").selectedIndex=0;
		document.getElementById("minuto_fin").selectedIndex=0;
		document.getElementById("kilometrosadicionales").value="";
	} else{
	}
}

