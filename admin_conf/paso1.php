<?
if(!isset($resultados_pagina) || $resultados_pagina=='')
	$resultados_pagina = 20;
if(!isset($tiempo_sesion) || $tiempo_sesion=='')
	$tiempo_sesion = 15;
?>
<html>
<title>.:: Administrador de Datos  ::.</title>
<link rel="stylesheet" href="estilos.css">
<script language=JavaScript src="picker.js"></script>
<body>
<p>&nbsp;</p>
<form method="POST" name="forma" action="test/test.php" enctype="multipart/form-data" onSubmit="return _CF_checkform(this)">
<p class="textos" align="center"><b>Configuración del Administrador de Datos</b></p>
<table width="550" border="0" align="center" cellpadding="2" cellspacing="1">
	<tr class="titulotabla">
	<td colspan="4" align="center"><b>Base de Datos</b></td>
	</tr>
    <tr class="contenidotabla">
      <td>Host:</td>
      <td><input name="bd_host" type="text" class="campos" value="<?=$bd_host?>"></td>
      <td>Nombre BD:</td>
      <td><input name="bd_nombre" type="text" class="campos" value="<?=$bd_nombre?>"></td>
    </tr>
    <tr class="contenidotabla">
      <td>Usuario:</td>
      <td><input name="bd_usuario" type="text" class="campos" value="<?=$bd_usuario?>"></td>
      <td>Clave:</td>
      <td><input name="bd_clave" type="text" class="campos" value="<?=$bd_clave?>"></td>
    </tr>
</table>
<br>
<table width="550" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr class="titulotabla">
    <td colspan="4" align="center"><b>Dise&ntilde;o</b></td>
  </tr>
	 <tr class="contenidotabla">
	 <td width="80">Título de las páginas</td>
	 <td colspan="3"><input name="titulo_paginas" type="text" class="campos" value="<?=$titulo_paginas?>" size="30"></td>
  </tr>
  <tr class="contenidotabla">
    <td>Archivo de estilos:</td>
    <td colspan="3"><input name="hoja_estilos" type="file" class="campos"> (<a href="archivos_ejemplo/estilos.css" class='links'>Archivo de ejemplo</a>)</td>
 </tr>
  <tr class="contenidotabla">
    <td>Archivo de estilos menú:</td>
    <td colspan="3"><input name="hoja_estilos_menu" type="file" class="campos"> (<a href="archivos_ejemplo/estilos_menu.css" class='links'>Archivo de ejemplo</a>)</td>
 </tr>
  <tr class="contenidotabla">
    <td>Imagén del cabezote:</td>
    <td colspan="3"><input name="imagen_cabezote" type="file" class="campos"> (<a href="archivos_ejemplo/cabezote.gif" class='links'>Archivo de ejemplo 760x61 px</a>)</td>
 </tr>
  <tr class="contenidotabla">
    <td>Texto alternativo cabezote:</td>
    <td colspan="3"><input name="texto_alt_cabezote" type="text" class="campos" value="<?=$texto_alt_cabezote?>" size="30"></td>
 </tr> 
  <tr class="contenidotabla">
    <td>Tipo de menú:</td>
    <td colspan="3">
	 <input type="radio" name="tipo_menu" value="menu_horizontal" <?if($tipo_menu == "menu_horizontal") print "checked";?>>Menú horizontal
	 <input type="radio" name="tipo_menu" value="menu_vertical" <?if($tipo_menu == "menu_vertical") print "checked";?>>Menú vertical
	 <input type="radio" name="tipo_menu" value="desplegable" <?if($tipo_menu == "desplegable") print "checked";?>>Desplegable
	 </td>
 </tr>
  <tr class="contenidotabla">
    <td>Tipo de link: </td>
    <td colspan="3">
	 
	 <input name="tipo_link" type="radio" value="texto" <?if($tipo_link == "texto") print "checked";?>>
      Hiperexto 
      <input name="tipo_link" type="radio" value="icono" <?if($tipo_link == "icono") print "checked";?>>
      Iconos</td>
  </tr>
  <tr class="contenidotabla">
    <td>Icono insertar</td>
    <td colspan="3"><input name="img_insertar" type="file" class="campos" id="img_insertar10" size="20">
(<a href="archivos_ejemplo/ico_nuevo.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td height="28">Icono editar</td>
    <td colspan="3"><input name="img_editar" type="file" class="campos" id="img_insertar11" size="20">
(<a href="archivos_ejemplo/ico_editar.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td>Icono buscar</td>
    <td colspan="3"><input name="img_buscar" type="file" class="campos" id="img_insertar12" size="20">
(<a href="archivos_ejemplo/ico_buscar.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td>Icono borrar</td>
    <td colspan="3"><input name="img_borrar" type="file" class="campos" id="img_insertar13" size="20">
(<a href="archivos_ejemplo/ico_borrar.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td>Icono exportar a excel </td>
    <td colspan="3"><input name="img_excel" type="file" class="campos" id="img_insertar10" size="20">
    (<a href="archivos_ejemplo/ico_excel.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td height="28">Icono activar </td>
    <td colspan="3"><input name="img_activar" type="file" class="campos" id="img_insertar11" size="20">
    (<a href="archivos_ejemplo/ico_activar.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td>Icono inactivar </td>
    <td colspan="3"><input name="img_inactivar" type="file" class="campos" id="img_insertar12" size="20">
    (<a href="archivos_ejemplo/ico_inactivar.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td>Icono salir </td>
    <td colspan="3"><input name="img_salir" type="file" class="campos" id="img_insertar13" size="20">
    (<a href="archivos_ejemplo/salir.gif" class='links'>Archivo de ejemplo</a>)</td>
  </tr>
  <tr class="contenidotabla">
    <td>Colores Resultados </td>
    <td colspan="3">Color 1 
      <input name="color_tigra1" type="text" class="campos" size="10" maxlength="7" value="<?=$color_tigra1?>">&nbsp;
		<a href="javascript:TCP.popup(document.forms['forma'].elements['color_tigra1'], 0)"><img width="15" height="13" border="0" alt="Click aquí para seleccionar el color" src="imagenes/sel.gif"></a>
      <br>
      Color 2 
      <input name="color_tigra2" type="text" class="campos" size="10" maxlength="7" value="<?=$color_tigra2?>">&nbsp;
		<a href="javascript:TCP.popup(document.forms['forma'].elements['color_tigra2'], 0)"><img width="15" height="13" border="0" alt="Click aquí para seleccionar el color" src="imagenes/sel.gif"></a>
      <br>
      Color 3 
      <input name="color_tigra3" type="text" class="campos" size="10" maxlength="7" value="<?=$color_tigra3?>">&nbsp;
		<a href="javascript:TCP.popup(document.forms['forma'].elements['color_tigra3'], 0)"><img width="15" height="13" border="0" alt="Click aquí para seleccionar el color" src="imagenes/sel.gif"></a>
      <br>
      Color 4 
      <input name="color_tigra4" type="text" class="campos" size="10" maxlength="7" value="<?=$color_tigra4?>">&nbsp;
		<a href="javascript:TCP.popup(document.forms['forma'].elements['color_tigra4'], 0)"><img width="15" height="13" border="0" alt="Click aquí para seleccionar el color" src="imagenes/sel.gif"></a>
		</td>
  </tr>
 </table>
 <br>
<table width="550" border="0" align="center" cellpadding="2" cellspacing="1">
	<tr class="titulotabla">
	<td colspan="4" align="center"><b>Parámetros Generales</b></td>
	</tr>
    <tr class="contenidotabla">
      <td>Resultados por página:</td>
      <td><input type="text" name="resultados_pagina" value="<?=$resultados_pagina?>" size="8"></td>
      <td>Tiempo de sesión:</td>
      <td><input type="text" name="tiempo_sesion" value="<?=$tiempo_sesion?>" size="8"> Minutos</td>
    </tr>
  <tr class="contenidotabla">
    <td>Autor:</td>
    <td colspan="3"><input type="text" name="autor" value="<?=$autor?>"></td>
 </tr>	 
</table>  
<p align="center">
  <input name="Button" type="submit" value="Continuar &gt;&gt;">
</p>
<script language="JavaScript">
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() {
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=4) { test=args[i+2]; mensaje=args[i+3]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+= mensaje+' debe ser una dirección de correo.\n';
      } else if (test!='R') {
        if (isNaN(val)) errors+= mensaje+' debe ser numerico.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (val<min || max<val) errors+= mensaje+' debe ser un numero entre '+min+' y '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += mensaje+' es requerido.\n'; }
  } 

  if(v_radio_button(document.forma.tipo_menu) == -1)
  	errors += 'Debe seleccionar un tipo de menú.\n';
	tipo_link = v_radio_button(document.forma.tipo_link);
  if(tipo_link == -1)
  	errors += 'Debe seleccionar un tipo de link.\n';
	if(tipo_link == 1)
	{
		if(document.forma.img_insertar.value == '')
			errors += 'El ícono de insertar es requerido.\n';
		if(document.forma.img_editar.value == '')
			errors += 'El ícono de editar es requerido.\n';
		if(document.forma.img_buscar.value == '')
			errors += 'El ícono de buscar es requerido.\n';
		if(document.forma.img_borrar.value == '')
			errors += 'El ícono de borrar es requerido.\n';
		if(document.forma.img_excel.value == '')
			errors += 'El ícono de exportar a excel es requerido.\n';
		if(document.forma.img_activar.value == '')
			errors += 'El ícono de activar es requerido.\n';
		if(document.forma.img_inactivar.value == '')
			errors += 'El ícono de inactivar es requerido.\n';
		if(document.forma.img_salir.value == '')
			errors += 'El ícono de salir es requerido.\n';	
	}
  	
  if (errors) alert('Por favor realice las siguientes correcciones:\n\n'+errors);
  document.MM_returnValue = (errors == '');
}

function  _CF_checkform(_CF_this)
{ 
  MM_validateForm('bd_host','','R','El host de la base de datos','bd_nombre','','R','El nombre de la base de datos','bd_usuario','','R','El usuario de la base de datos','titulo_paginas','','R','El título de las páginas','hoja_estilos','','R','La hoja de estilos','hoja_estilos_menu','','R','La hoja de estilos del menú','imagen_cabezote','','R','La imagen del cabezote','texto_alt_cabezote','','R','El Texto altenativo del cabezote','resultados_pagina','','R','El numero de resultados por página','tiempo_sesion','','R','El tiempo de sesión','autor','','R','El nombre del autor','color_tigra1','','R','Color de resultados 1','color_tigra2','','R','Color de resultados 2','color_tigra3','','R','Color de resultados 3','color_tigra4','','R','Color de resultados 4');return document.MM_returnValue
    return true;
}

//funcion que devuelve el item seleccionado en un radiobutton, -1 si no selecciono ninguno
function v_radio_button(nomCampo)
{
  opcion = -1;
  for (i=0;i<nomCampo.length; i++)
  {
    if (nomCampo[i].checked)
      opcion = i;
  }
  return opcion;
}
</script>
</form>
</body>
</html>
