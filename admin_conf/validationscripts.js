/**
 * Variable para manejar el foco de los controles
 */
var controlFoco=null;
var nombres_campos=new Array();
var errores_extra = new String();
errores_extra = "";

/**
 * Función que muestra el error cometido por el usuario en un control.
 * Además maneja el foco para ponerlo sobre el control que contiene el error
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
    error+="En campo "+nombres_campos[control.name]+" debe digitar un email que sea válido.\n" ;
  return error;
}

// password - 6 o mas caracteres, 2 numericos, por lo menos 4 no numéricos
function verificarPassword(control)
{
  var error = validarPassword(control);
  advertencias(error,control);
}

// password - 6 o mas caracteres, 2 numericos, por lo menos 4 no numéricos
function validarPassword(control)
{
 var passwd = control.value;
  var error = "";

  if ((passwd.length < 6))
  {
    error += "La clave debe tener al menos seis (6) caracteres y dos (2) números.\n";
  }
  var regExpDigits = new RegExp("\.*\\d\.*\\d\.*$");
  var regExpChars = new RegExp("\.*[^\\d ]\.*[^\\d ]\.*[^\\d ]\.*[^\\d ]\.*$");
  if (error == "" && !regExpDigits.test(passwd))
  {
    error += "La clave debe tener al menos seis (6) caracteres y dos (2) números.\n";
  }
  if (error == "" && !regExpChars.test(passwd))
  {
    error += "La clave debe tener al menos seis (6) caracteres y dos (2) números.\n";
  }
  return error;
}

function validarCamposIguales(control1, control2)
{
  var error = "";
  if(control1.value != control2.value)
  {
    error += "Las contraseñas de "+nombres_campos[control2.name]+" y de "+nombres_campos[control1.name]+" deben ser iguales.\n";
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
        if(elemento.value=="")
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
                      /*var temp = validarPassword(elemento);
                      if(temp!="")
                        errores += temp;*/
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
  var regEx = new RegExp("(_O_|__CTextArea__|__CText__|__CEmail__|__CPassword__|__CFecha__|__CLista__|__CNumeroReal.*__|__CNumeroEntero.*__|__CRadioList__|__CCheckList__)");

  if(idControl == null)
    return false;
  return regEx.test(idControl);
}

function validarValorReal(control)
{
  var error = "";
  numberRegExp = new RegExp("^-{0,1}[\\d]+(\\.[\\d]+){0,1}$");
  if(!numberRegExp.test(control.value))
  {
    error += "Debe ingresar un valor numérico válido para " + nombres_campos[control.name] + "\n";
  }
  return error;
}

function validarValorEntero(control)
{
  var error = "";
  numberRegExp = new RegExp("^-{0,1}[\\d]+$");
  if(!numberRegExp.test(control.value))
  {
    error += "Debe ingresar un valor numérico entero válido para " + nombres_campos[control.name] + "\n";
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

  if(!(parseFloat(control.value) >= rangoDesde && parseFloat(control.value) <= rangoHasta))
  {
    error += "El valor debe estar entre " + rangoDesde + " y " + rangoHasta +".\n";
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
      error += "Debe seleccionar al menos una opción en el campo " + nombres_campos[control_array[0].name] +".\n";
    } else {
      error += "Debe seleccionar una opción en el campo " + nombres_campos[control_array[0].name] +".\n";
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
      error += "Debe seleccionar una opción en el campo " + nombres_campos[control_array.name] +".\n";
    } else {
      error += "Debe seleccionar al menos una opción en el campo " + nombres_campos[control_array.name.substring(0,control_array.name.length-2)] +".\n";
    }
  }

  return error;
}


function darFormatoPlata(number)
{
  var s = new String(number);
  var otra = new String();
  var decimales = new String();
  var indiceComa = s.indexOf(".");

  if(indiceComa != -1)
  {
    decimales = s.substring(indiceComa,s.length);
    s = s.substring(0,indiceComa);
  }

  var i=s.length-1,j=0;
  while(i >= 0)
  {
    if(j==3)
    {
      otra = "," + otra;
      j=0;
    }
    otra =  s.charAt(i)+ otra;
    i--;
    j++;
  }
  if(indiceComa != -1)
  {
    otra += decimales;
  }
  return otra;
}

function formatea(control)
{
  control.value = darFormatoPlata(quita_caracteres(control.value));
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