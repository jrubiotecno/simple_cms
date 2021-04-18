/**Funcion Anexada por Mauricio Rios*/
function ContarCaracteres(campo,valor)
{
	cantidad=campo.value.length;
	cadena=campo.value;
	if(cantidad>=valor)
	{
		alert("El n�mero m�ximo a ingresar es de "+valor+" de caracteres");
		campo.value=cadena.substring(0,valor);
	}

}

/**Fin de funcion Anexada por Mauricio Rios*/

function ValidarRangoFechas(fecha_inicio, fecha_fin)
{
  if(fecha_inicio.value != "" && fecha_fin.value != "")
  {
	 desde = fecha_inicio.value.split('-');
	 hasta = fecha_fin.value.split('-');
	 dia1 = parseInt(desde[2]);
	 mes1 = parseInt(desde[1]);
	 ano1 = parseInt(desde[0]);
	 dia2 = parseInt(hasta[2]);
	 mes2 = parseInt(hasta[1]);
	 ano2 = parseInt(hasta[0]);
	 if((ano1 > ano2) || (ano1 == ano2 && mes1 > mes2) || (ano1 == ano2 && mes1 == mes2 && dia1 > dia2))
		errores_extra = "La fecha desde no puede ser mayor que la fecha hasta\n";
	 else
		errores_extra = "";
  }
  else
	 errores_extra = "";
}

function ValidarFechasBusqueda(fecha_inicio, fecha_fin)
{
  if(fecha_inicio.value != "" && fecha_fin.value != "")
  {
	 desde = fecha_inicio.value.split('-');
	 hasta = fecha_fin.value.split('-');
	 dia1 = parseInt(desde[2]);
	 mes1 = parseInt(desde[1]);
	 ano1 = parseInt(desde[0]);
	 dia2 = parseInt(hasta[2]);
	 mes2 = parseInt(hasta[1]);
	 ano2 = parseInt(hasta[0]);

	 if((ano1 > ano2) || (ano1 == ano2 && mes1 > mes2) || (ano1 == ano2 && mes1 == mes2 && dia1 > dia2))
		errores_extra = "La fecha desde no puede ser mayor que la fecha hasta\n";
	 else
		errores_extra = "";
  }
  else
	 errores_extra = "";
  if(errores_extra != '') {
	alert(errores_extra);
	return false;
  } else {
	return true;
  }
}

/**
 * Funci�n que muestra el error cometido por el usuario en un control.
 * Adem�s maneja el foco para ponerlo sobre el control que contiene el error
 * @param error el error que introdujo el usuario
 * @param control el objeto que representa el control en la forma
 */
function advertencias(error, control)
{
  if(error.length != 0 && control.value!="")
  {
    if(controlFoco!=null)
    {
      if(controlFoco==control)
      {
        alert(error);
      }
      controlFoco.focus();
    }
    else
    {
      controlFoco=control;
      alert(error);
      controlFoco.focus();
    }
  }
  else
  {
    controlFoco=null;
  }
}

// email
function verificarEmail(control)
{
  var error = validarEmail(control);
  advertencias(error,control);
}

function validarEmail(control)
{
  var email = control.value;
  var error = "";
  var regEx = new RegExp("^[\\w\.=-]+@([\\w\-]+\\.)+[a-z]{2,4}$");
  if(!regEx.test(email))
    error+="En campo "+nombres_campos[control.name]+" debe digitar un email que sea v�lido.\n" ;

  return error;
}

// password - 6 o mas caracteres, 2 numericos, por lo menos 4 no num�ricos
function verificarPassword(control)
{
  var error = validarPassword(control);
  advertencias(error,control);
}

// password - 6 o mas caracteres, 2 numericos, por lo menos 4 no num�ricos
function validarPassword(control)
{
  var passwd = control.value;
  var error = "";

  if ((passwd.length < 6))
  {
    error += "La clave debe tener al menos seis (6) caracteres y dos (2) n�meros.\n";
  }
  var regExpDigits = new RegExp("\.*\\d\.*\\d\.*$");
  var regExpChars = new RegExp("\.*[^\\d ]\.*[^\\d ]\.*[^\\d ]\.*[^\\d ]\.*$");
  if (error == "" && !regExpDigits.test(passwd))
  {
    error += "La clave debe tener al menos seis (6) caracteres y dos (2) n�meros.\n";
  }
  if (error == "" && !regExpChars.test(passwd))
  {
    error += "La clave debe tener al menos seis (6) caracteres y dos (2) n�meros.\n";
  }
  return error;
}

function validarCamposIguales(control1, control2)
{
  var error = "";
  if(control1.value != control2.value)
  {
    error += "Las contrase�as de "+nombres_campos[control2.name]+" y de "+nombres_campos[control1.name]+" deben ser iguales.\n";
  }
  return error;
}

function verificarCamposIguales(control1, control2)
{
  var error = validarCamposIguales(control1, control2);
  if(error.length != 0)
  {
    control1.value="";
    if(controlFoco!=null)
    {
      if(controlFoco==control1)
      {
        alert(error);
        controlFoco=control2;
      }
      controlFoco.focus();
    }
    else
    {
      controlFoco=control2;
      alert(error);
      controlFoco.focus();
    }
  }
  else
  {
    controlFoco=null;
  }
}

function validarForma(forma)
{

  var elemento;
  var controlRevisado;
  var errores = "";
  var tmp_nombre = "";


  for(var i=0; i < forma.length; i++)
  {
    elemento = forma.elements[i];
    if(esControlGenerado(elemento.id))
    {
      if(esObligatorio(elemento.id) && elemento.name != controlRevisado)
      {
        controlRevisado = elemento.name;



		//tinyMCE.saveContent(elemento.id);

        if(elemento.value=='')
        {
          tmp_nombre = elemento.name;
          if(tmp_nombre.substring(tmp_nombre.length-2) == '[]') {
            tmp_nombre = tmp_nombre.substring(tmp_nombre.length-2,0);
          }
          errores += "El campo " + nombres_campos[tmp_nombre] + " es obligatorio.\n";
        }
        else
        {

          var tipoCtrl = tipoControl(elemento.id);
          switch(tipoCtrl)
          {
            case  1:  //alert(elemento.name + " es de tipo email.\n");
                      var temp = validarEmail(elemento);
                      if(temp!="")
                        errores += temp;
                      break;
            case  2:  //alert(elemento.name + " es de tipo password.\n");
                      var temp = validarPassword(elemento);
                      if(temp!="")
                        errores += temp;
                      break;
            case  3:  //alert(elemento.name + " es de tipo fecha.\n");
                      break;
            case  4:  //alert(elemento.name + " es de tipo lista.\n");
                      var temp = validarLista(forma.elements[elemento.name]);
                      if(temp!="")
                        errores += temp;
                      break;
            case  5:  //alert(elemento.name + " es de tipo numero real.\n");
                      break;
            case  6:  //alert(elemento.name + " es de tipo numero entero.\n");
                      break;
            case  7:  //alert(elemento.name + " es de tipo RadioList.\n");
                      var temp = validarRadioOCheck(forma.elements[elemento.name]);
                      if(temp!="")
                        errores += temp;
                      break;
            case  8:  //alert(elemento.name + " es de tipo CheckList.\n");
                      var temp = validarRadioOCheck(forma.elements[elemento.name]);
                      if(temp!="")
                        errores += temp;
                      break;
            case  9:  //alert(elemento.name + " es de tipo texto.\n");
                      break;
            case  10:  //alert(elemento.name + " es de tipo textarea.\n");
                      break;
            default:
                      break;
          }
        }
      }
    }
  }
  errores += errores_extra;
  if(errores!="")
  {
    alert(errores);
    return false;
  }
  else
    return true;
}

function esObligatorio(nombreControl)
{
  var regEx = /_O_/;
  return regEx.test(nombreControl);
}

function tipoControl(idControl)
{
  var regExText = new RegExp("__CText__");
  var regExTextArea = new RegExp("__CTextArea__");
  var regExEmail = new RegExp("__CEmail__");
  var regExPassword = new RegExp("__CPassword__");
  var regExFecha = new RegExp("__CFecha__");
  var regExLista = new RegExp("__CLista__");
  var regExNumeroReal = new RegExp("__CNumeroReal.*__");
  var regExNumeroEntero = new RegExp("__CNumeroEntero.*__");
  var regExRadio = new RegExp("__CRadioList__");
  var regExCheck = new RegExp("__CCheckList__");

  if(regExEmail.test(idControl))
    return 1;
  if(regExPassword.test(idControl))
    return 2;
  if(regExFecha.test(idControl))
    return 3;
  if(regExLista.test(idControl))
    return 4;
  if(regExNumeroReal.test(idControl))
    return 5;
  if(regExNumeroEntero.test(idControl))
    return 6;
  if(regExRadio.test(idControl))
    return 7;
  if(regExCheck.test(idControl))
    return 8;
  if(regExText.test(idControl))
    return 9;
  if(regExTextArea.test(idControl))
    return 10;
  else
    return 0;
}

function esControlGenerado(idControl)
{
  var regEx = new RegExp("(_O_|__CTextArea__|__CText__|__CEmail__|__CPassword__|__CFecha__|__CLista__|__CNumeroReal.*__|__CNumeroEntero.*__|__CRadioList__|__CCheckList__|__CAutocomplete__)");

  if(idControl == null)
    return false;
  return regEx.test(idControl);
}

function validarValorReal(control)
{
  var error = "";
  numberRegExp = new RegExp("^-{0,1}[\\d]+(\\.[\\d]+){0,3}(\\,[\\d]+){0,1}$");

  if(!numberRegExp.test(control.value))
  {
    error += "Debe ingresar un valor num�rico v�lido para " + nombres_campos[control.name] + "\n";
  }
  return error;
}

function validarValorEntero(control)
{
  var error = "";
  numberRegExp = new RegExp("^-{0,1}[\\d]+$");
  if(!numberRegExp.test(control.value))
  {
    error += "Debe ingresar un valor num�rico entero v�lido para " + nombres_campos[control.name] + "\n";
  }
  return error;
}

function verificarValorReal(control)
{
  var error = validarValorReal(control);
  if(tieneRango(control))
  {
    error += validarRango(control);
  }
  advertencias(error,control);
}

function verificarValorEntero(control)
{
  var error = validarValorEntero(control);
  if(tieneRango(control))
  {
    error += validarRango(control);
  }
  advertencias(error,control);
}

function tieneRango(control)
{
  var rangorx = new RegExp("\\[\\d+>\\d+\\]");
//  var rangorx = new RegExp("\\[\\d+>.\\d.\\]");
  var identificador = control.id;
  return rangorx.test(identificador);
}


function validarRango(control)
{
  var error = "";
  var indiceAbre, indiceCierra, indiceGuion, iden ;

  iden = new String(control.id);
  indiceAbre = iden.indexOf("[");
  indiceGuion = iden.indexOf(">");
  indiceCierra = iden.indexOf("]");

  var rangoDesde = parseFloat(iden.substring(indiceAbre+1,indiceGuion));
  var rangoHasta = parseFloat(iden.substring(indiceGuion+1,indiceCierra));

  if(!(parseFloat(control.value) >= rangoDesde && parseFloat(control.value) <= rangoHasta && rangoHasta !='%' && rangoDesde !='%'))
  {
    if(rangoDesde==0 && rangoHasta==99999999){
         error +=  "El valor debe ser un n�mero positivo. \n";
    }else{
          error += "El valor debe estar entre " + rangoDesde + " y " + rangoHasta +".\n";
    }
  }
  return error;
}


function validarRadioOCheck(control_array)
{
  var checked = 0;
  var error = "";

  for(var i=0;i<control_array.length;i++) {
    if(control_array[i].checked) {
      checked = 1;
    }
  }

  if(!checked)
  {
    if(control_array[0].type == "checkbox") {
      error += "Debe seleccionar al menos una opci�n en el campo " + nombres_campos[control_array[0].name] +".\n";
    } else {
      error += "Debe seleccionar una opci�n en el campo " + nombres_campos[control_array[0].name] +".\n";
    }
  }

  return error;
}

function validarLista(control_array)
{
  var selected = true;
  var error = "";

  for(var i=0;i<control_array.length;i++) {
    if(control_array[i].selected && (control_array[i].value == '0' || control_array[i].value == '')) {
      selected = false;
    }
  }

  if(!selected)
  {
    if(control_array.type == "select-one") {
      error += "Debe seleccionar una opci�n en el campo " + nombres_campos[control_array.name] +".\n";
    } else {
      error += "Debe seleccionar al menos una opci�n en el campo " + nombres_campos[control_array.name.substring(0,control_array.name.length-2)] +".\n";
    }
  }

  return error;
}

function quita_caracteres(argument)
{
  var ch, new_value='';
  for (i=0; i<(argument.length); i++)
  {
    ch=(argument.substring(i,i+1));
    if (ch!=' ' && ch!='$'  && ch!=',')
    {
      new_value +=ch;
    }
  }
  return(new_value);
}

function ReemplazarComillas(control)
{
	var re = new RegExp ('\'');
	strText = control.value;
	var newstr = strText.replace(re, '\"') ;
	control.value = newstr;
}

function verificarEspacios(control)
{
  var error = validarEspacios(control);
  advertencias(error,control);
}

function validarEspacios(control)
{
 	var regex = new RegExp("\\s");
    var error = "";
	if (regex.test(control.value))
		error+="La campo \""+ nombres_campos[control.name] +"\" no debe contener espacios.\n" ;
	return error;
}

//Funcion para limitar la carga de archivos
//Funcion anexada Andres Bravo.
//Fecha: 12-06-06

function LimitAttach(tField,iType) {
	file=tField.value;
	if (iType==1) {
		extArray = new Array(".gif",".jpg",".png",".jpeg");
	}
	if (iType==2) {
		extArray = new Array(".swf");
	}
	if (iType==3) {
		extArray = new Array(".exe",".sit",".zip",".tar",".swf",".mov",".hqx",".ra",".wmf",".mp3",".qt",".med",".et");
	}
	if (iType==4) {
		extArray = new Array(".mov",".ra",".wmf",".mp3",".qt",".med",".et",".wav");
	}
	if (iType==5) {
		extArray = new Array(".html",".htm",".shtml");
	}
	if (iType==6) {
		extArray = new Array(".doc",".xls",".ppt");
	}

	allowSubmit = false;
	if (!file)
		return false;

	while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
		ext = file.slice(file.indexOf(".")).toLowerCase();

	for (var i = 0; i < extArray.length; i++) {
		if (extArray[i] == ext) {
			allowSubmit = true;
			return true;
			break;
		}
	}
	if (allowSubmit) {
	} else {
		tField.value="";
		alert("Usted s�lo puede subir archivos con extensiones " + (extArray.join(" ")) + "\nPor favor seleccione un nuevo archivo");
		tField.focus();
		return false;
	}
}


//Funcion para detectar que version  de Navegador Utiliza
//Fecha Implementacion: 20/06/06
//Implementada por: Andres Bravo.

function detectBrowser() {

	if ((i = navigator.userAgent.indexOf("Opera")) >= 0)
		strBrowser = "Opera";
	else if ((i = navigator.userAgent.indexOf("Netscape6/")) >= 0)
		strBrowser = "Netscape6/";
	else if ((i = navigator.userAgent.indexOf("Gecko")) >= 0)
		strBrowser = "Gecko";
	else if ((i = navigator.userAgent.indexOf("MSIE")))
		strBrowser = "MSIE";
	else if ((i = navigator.userAgent.indexOf("Mozilla")) >= 0)
		strBrowser = "Mozilla";
	else if ((i = navigator.userAgent.indexOf("Firefox")) >= 0)
		strBrowser = "Firefox";

	return strBrowser;
}

//Funcion que permite entrar a cualquier modulo seccion publica
//Implementada por: Andres Bravo.

function details(modulo,accion,id,option,option2) {

	var forma = document.forms.generico;
	var id_aux;
	var option_aux;
	var option2_aux;
	var action_aux;

	//DETERMINAMOS SI EXISTE ACTION PARA CAMBIAR EL ACTION DEL FORM GENERICO
	action_aux='';
	if (typeof modulo!='undefined')
		action_aux=modulo;

	forma.action=action_aux + ".php";

	forma.accion.value = accion;

	//DETERMINAMOS SI EXISTE ID
	id_aux='';
	if (typeof id!='undefined')
		id_aux=id;

	//DETERMINAMOS SI EXISTE OPTION
	option_aux='';
	if (typeof option!='undefined')
		option_aux=option;

	//DETERMINAMOS SI EXISTE OPTION2
	option2_aux='';
	if (typeof option2!='undefined')
		option2_aux=option2;

	forma.id.value = id_aux;
	forma.option.value = option_aux;
	forma.option2.value = option2_aux;

	forma.submit();
}


//Funcion que permite entrar a cualquier modulo seccion publica
//Implementada por: Andres Bravo.

function detailsReport(action,option,accion,id) {

	var forma = document.forms.generico;
	var id_aux;
	var option_aux;
	var action_aux;

	//DETERMINAMOS SI EXISTE ACTION PARA CAMBIAR EL ACTION DEL FORM GENERICO
	action_aux='';
	if (typeof action!='undefined')
		action_aux=action;

	forma.action=action_aux + ".php";

	//EN ACCION ENVIAMOS LOS DATOS DEL REPORTE
	if (document.getElementById('datosReporte')!=null)
		forma.accion.value = document.getElementById('datosReporte').innerHTML;

	if (document.getElementById('resultDatos')!=null)
		forma.accion.value = document.getElementById('resultDatos').innerHTML;

	//DETERMINAMOS SI EXISTE ID
	id_aux='';
	if (typeof id!='undefined')
		id_aux=id;

	//DETERMINAMOS SI EXISTE OPTION
	option_aux='';
	if (typeof option!='undefined')
		option_aux=option;

	forma.id.value = id_aux;
	forma.option.value = option_aux;

	forma.submit();
}


//Funcion que permite borrar todas las filas de una tabla que no tengan ID
//Implementada por: Andres Bravo.
function borraFilasTablaID(tabla,incluyeEncabezado){

	var tblBody = document.getElementById(tabla);
	if (tblBody){
		var tamanoTabla=tblBody.rows.length;

		i=1;
		if (incluyeEncabezado)
			i=0;

		while (i<tamanoTabla){
			tblBody.rows[i].id = "tr_" + Math.random();
			indice = tblBody.rows[i].id;
			var rowToDelete = document.getElementById(indice).rowIndex;
			tblBody.deleteRow(rowToDelete);
			tamanoTabla = tblBody.rows.length;
		}
	}
}

//Funcion que permite borrar todas los hijos de un objeto
//Implementada por: Andres Bravo.
function borraChild(objeto){

	var element = document.getElementById(objeto);
	while (element.firstChild)
	  element.removeChild(element.firstChild);

}


//Funcion que permite tomar el option de un select y ponerlo en un cuadro de texto
//Implementada por: Andres Bravo.
function textSelect(objeto,campoId){

	var forma = document.buscador;
	var select = objeto;
	var option;

	option = select.options[select.selectedIndex];
	if (option.value=='')
		document.getElementById(campoId).value = '';
	else
		document.getElementById(campoId).value = option.text;
}

//Funcion que permite abrir un div con prototype con metodo URL
//Implementada por: Andres Bravo.
function openModalDialogURL(URLParam,titleWindow,ancho,alto,transparencia) {

	ventana = new Window('modal_window', {className: "dialog", title: titleWindow,top:0, left:0,  width:ancho, height:alto, zIndex:100, opacity:1, resizable: true});
	//ventana = new Window('modal_window', {className: "dialog", title: titleWindow,top:0, left:0,  width:ancho, height:alto, zIndex:100, opacity:1, resizable: false,draggable:false,closable:false,minimizable:false,maximizable:false,allowTransparency:transparencia,rowHeader:false,rowFooter:false});
  	ventana.setURL(URLParam);
  	ventana.setDestroyOnClose();
	ventana.showCenter(true);
}


//Funcion que permite cerrar un div desde un Frame que simula una ventana
//Implementada por: Andres Bravo.
function closeDivFrame(){
	window.parent.ventana.hide();
}

//Funcion que permite crear un alert con prototpe
//Implementada por: Andres Bravo.
function openInfoDialog(mensaje, ancho, alto, progress) {

	if (typeof progress=='undefined')
		progress=false;

	Dialog.info(mensaje,{windowParameters: {className: "alert_lite",width:ancho, height:alto}, showProgress: progress});
}

function closeDialog(){
	Dialog.closeInfo();
	debug=1;
}

//Funcion que permite crear 2 selects multiples y pasar valores entre si
//Implementada por: Andres Bravo.
var selectedList;
var availableList;

function delAll(selOrigen,selDestino,param){

	var obj1 = $(selOrigen);
	var obj2 = $(selDestino);

	var len = obj2.length -1;

	for(i=len; i>=0; i--){
		valor=obj2.item(i).value; // almacenar value
		obj1.appendChild(obj2.item(i));
	}

}

function addAll(selOrigen,selDestino,param){

	var obj1 = $(selOrigen);
	var obj2 = $(selDestino);

	var len = obj1.length -1;
	for(i=len; i>=0; i--){
		valor=obj1.item(i).value; // almacenar value
		obj2.appendChild(obj1.item(i));
	}

}

function addItem(selOrigen,selDestino,param){

	var obj1 = $(selOrigen);
	var obj2 = $(selDestino);

	var addIndex = obj1.selectedIndex;
	if(addIndex < 0)
		return;

	valor=obj1.options.item(addIndex).value; // almacenar value
	obj2.appendChild(obj1.options.item(addIndex));

}

function delItem(selOrigen,selDestino,param){

	var obj1 = $(selOrigen);
	var obj2 = $(selDestino);

	var selIndex = obj2.selectedIndex;
	if(selIndex < 0)
		return;

	valor=obj2.options.item(selIndex).value; // almacenar value
	obj1.appendChild(obj2.options.item(selIndex));

}

//Fin funciones para pasar valores entre textareas


function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

//FUNCION PARA TOMAR LOS TAMA�OS DE UNA VENTANA
function getWindowData(){
    var widthViewport,heightViewport,xScroll,yScroll,widthTotal,heightTotal;
    if (typeof window.innerWidth != 'undefined'){
        widthViewport= window.innerWidth;
        heightViewport= window.innerHeight;
    }else if(typeof document.documentElement != 'undefined' && typeof document.documentElement.clientWidth !='undefined' && document.documentElement.clientWidth != 0){
        widthViewport=document.documentElement.clientWidth;
        heightViewport=document.documentElement.clientHeight;
    }else{
        widthViewport= document.getElementsByTagName('body')[0].clientWidth;
        heightViewport=document.getElementsByTagName('body')[0].clientHeight;
    }
    xScroll=self.pageXOffset || (document.documentElement.scrollLeft+document.body.scrollLeft);
    yScroll=self.pageYOffset || (document.documentElement.scrollTop+document.body.scrollTop);
    widthTotal=Math.max(document.documentElement.scrollWidth,document.body.scrollWidth,widthViewport);
    heightTotal=Math.max(document.documentElement.scrollHeight,document.body.scrollHeight,heightViewport);
    return [widthViewport,heightViewport,xScroll,yScroll,widthTotal,heightTotal];
}

//FUNCION PARA CENTRAR UN OBJETO
function centrarObjeto(objeto,ancho,alto){

	var data=getWindowData();

	objeto.style.left = data[0]/2+data[2]-parseInt(ancho)/2+'px';
	objeto.style.top = data[1]/2+data[3]-parseInt(alto)/2+'px';

}

//FUNCION PARA CARGAR UN CONTENIDO POR AJAX
function verContenido(alias,ancho,alto){

	$("fade").style.display = 'block';

	//CAMBIAMOS LOS TAMOS DEL IFRAME
	$("contentIframe").width = ancho + "px";
	$("contentIframe").height = alto + "px";

	//CARGAMOS LA RUTA DEL IFRAME
	$("contentIframe").src = "index.php?Ajax=true&page=" + alias;

	centrarObjeto($("ajaxContent"),ancho,alto);

	$("ajaxContent").style.display = 'block';


	new PeriodicalExecuter(function(pe) {

		//VALIDAMOS EL OBJETO PARA CAMBIAR LOS ESTILOS NECESARIOS
		if (parent.frames[0].document.getElementById('ajaxContentData')!=null){
			parent.frames[0].document.getElementById('ajaxContentData').style.overflow = "auto";
			parent.frames[0].document.getElementById('ajaxContentData').style.width = ancho + "px";
			parent.frames[0].document.getElementById('ajaxContentData').style.height = alto + "px";
			pe.stop();
		}

	}, 1);

}

//FUNCION PARA OCULTAR LOS DIVS UTILIZADOS PARA CARGAR LOS CONTENIDOS POR AJAX
function cerrarContenido(){

	document.getElementById('fade').style.display='none';
	parent.frames[0].document.getElementById('ajaxContentData').innerHTML = "";
	$("ajaxContent").style.display = 'none';

}

//FUNCTION PARA OCULAR LOS SELECT DE UNA PAGINA Y EVITAR BUG DE IE6
function ocultaSelects(){
	if(!window.attachEvent) return false;

	var selects = document.getElementsByTagName("select");
	for( var i=0; i<selects .length; i++ ){
		selects[i].style.display = "none";
	}
}

//FUNCTION PARA MOSTRAR LOS SELECT DE UNA PAGINA Y EVITAR BUG DE IE6
function mostrarSelects(){
	if(!window.attachEvent) return false;

	var selects = document.getElementsByTagName("select");
	for( var i=0; i<selects .length; i++ ){
		selects[i].style.display = "inline";
	}
}

function cambiaProfundidad(posicionMenu){
	N = "banReal";
	A=document.getElementById
	B=document.all;
	C=document.layers;

	switch(posicionMenu){
		case "Adentro":
			var newZIndex = 190;
		break;
		case "Afuera":
			var newZIndex = 210;
		break;
	}

	if (A){
		document.getElementById(N).style.zIndex = newZIndex;
	}else if (B){
		B[N].style.zIndex = newZIndex;
	}else{
		C[N].zIndex = newZIndex;
	}
}