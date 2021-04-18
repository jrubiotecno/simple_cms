<?extract($_GET);extract($_POST);require_once("../utilidades/adodb.php");
require_once("../conf/config.php");
require_once("../utilidades/controles/select.php");
require_once("../utilidades/controles/textbox.php");

$db = New ADODB;
$db2 = New ADODB;
$db->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);
$db2->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);

$db->query("SHOW TABLES");
while($db->next_row())
{
	$arr_tablas[$db->R[0]] = $db->R[0];
	$db2->query("SHOW COLUMNS FROM ".$db->R[0]);
	while($db2->next_row())
		$arr_campos[] = array($db->R[0],$db2->R[0]);
}

$c_textbox = new Textbox;
?>

<html>
<title>.:: Administrador de Datos ::.</title>
<link rel="stylesheet" href="estilos.css">
<body bgcolor="#FFFFFF">
<script language="JavaScript" src="validationscripts.js"></script>
<script> var nombres_campos = new Array(); </script>
<p>&nbsp;</p>
<form method="POST" name="forma" action="">
<p class="textos" align="center"><b>Configuracion del Administrador de Datos</b></p>
<table width="650" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr class="titulotabla">
    <td colspan="2" align="center"><b>Datos que se van a administrar</b></td>
  </tr>
  <tr class="contenidotabla">
    <td width="200">Tabla que se va a administrar </td>
    <td>
	<?
	if($accion == "editar")
	{
		$db->query("SELECT * FROM admin_menu WHERE nombre_tabla='$tabla' ORDER BY descripcion");
		$db->next_row();
		$nombre_menu = $db->descripcion;
		$nivel_menu = $db->grupo;
		print $tabla;
		print "<input type='hidden' name='tabla' value='$tabla'>";
	}
	else
	{
	 ?>
	 <select name="tabla" class="campos" onchange="document.forma.submit();">
	 <option value="">Seleccione...</option>
	 <?
		$db->query("SHOW TABLES");
		while($db->next_row())
		{
			if($db->R[0] == $tabla)
				$sel = "selected";
			else
				$sel = "";

			print "<option value='".$db->R[0]."' $sel>".$db->R[0]."</option>";
		}
	?>
	 </select>
	 <?}?>
	 </td>
  </tr>
  <tr class="contenidotabla">
    <td>Nombre en el men&uacute; </td>
    <td><?=$c_textbox->Textbox("nombre_menu","Nombre en el menu",1,"$nombre_menu","campos","30","100"); ?></td>
  </tr>
  <tr class="contenidotabla">
    <td>Nivel en el men&uacute; </td>
    <td><?=$c_textbox->Textbox("nivel_menu",">Nivel en el menu",1,"$nivel_menu","campos","6","5"); ?></td>
  </tr>
</table>
<br>
<?if(isset($tabla) && $tabla != "")
{
?>
	 <table width="650" border="1" align="center" cellpadding="2" cellspacing="1">
      <tr class="titulotabla">
        <td colspan="15"><b>Campos de la tabla</b></td>
        </tr>
      <tr class="contenidotabla" align="center">
        <td>&nbsp;</td>
        <td><strong>Nombre del campo</strong></td>
		  <td><strong>Campo es ID</strong></td>
		  <td><strong>Tipo campo</strong></td>
        <td><strong>Tabla relaci&oacute;n</strong></td>
        <td><strong>Campo relaci&oacute;n</strong></td>
        <td><strong>Campo imprimir</strong></td>
        <td><strong>Condicion select</strong></td>
        <td><strong>Obligat.</strong></td>
        <td><strong>Tama&ntilde;o</strong></td>
        <td><strong>Longitud M&aacute;xima</strong></td>
        <td><strong>Valores opciones (|)</strong></td>
        <td><strong>Nombres opciones (|)</strong></td>
        <td><strong>Mostrar en la consulta</strong></td>
        <td><strong>R&oacute;tulo</strong></td>
        </tr>
		  <?
			$db2->query("SHOW COLUMNS FROM $tabla");			while($db2->next_row())
			{
				$nombre_campo = $db2->R[0];
				$campo_es_id = "";
				$tipo_campo = "";
				$validacion = "";
				$tabla_relacion = "";
				$campo_relacion = "";
				$campo_imprimir = "";
				$condicion_select = "";
				$tamano = "";
				$longitud = "";
				$estado1 = "";
				$estado2 = "";
				$rotulo = "";
				$mostrar = "";

				if($accion == "editar")
				{
					$db->query("SELECT * FROM admin_tablas WHERE nombre_tabla='$tabla' AND nombre_campo='$nombre_campo'");
					$db->next_row();
					$rows = $db->num_rows();
					if($rows > 0)
					{
						$campo_es_id = $db->campo_es_id;
						$tipo_campo = $db->tipo_campo;
						$validacion = $db->validacion;
						$tabla_relacion = $db->tabla_relacion;
						$campo_relacion = $db->campo_relacion;
						$campo_imprimir = $db->campo_imprimir;
						$condicion_select = $db->condicion_select;
						$tamano = $db->tamano;
						$longitud = $db->longitud;
						$estado1 = $db->estado1;
						$estado2 = $db->estado2;
						$rotulo = $db->rotulo;
						$mostrar = $db->mostrar;
					}
				}

				// iniciar el objeto select con Nombre Tabla
				$select1 = new Select("nombre_tabla_relacion_$nombre_campo", "Nombre Tabla", $arr_tablas, "", 0, "$tabla_relacion","campos","","","actualizar_detalle_array_nombre_tabla_relacion_".$nombre_campo."_nombre_campo_imprimir_".$nombre_campo."(this);");
				$select1->ShowBlankOption = 1;

				// iniciar el objeto select con Campos
				$select2 = new Select("nombre_campo_relacion_$nombre_campo", "Nombre Campo","", "", 0, "$campo_relacion","campos");
				$select2->ShowBlankOption = 1;

				// iniciar el objeto select con Campos
				$select3 = new Select("nombre_campo_imprimir_$nombre_campo", "Nombre Campo","", "", 0, "$campo_imprimir","campos");
				$select3->ShowBlankOption = 1;

				$select1->relateWithArray("nombre_campo_relacion_$nombre_campo",$arr_tablas,$arr_campos);
				//$select1->relateWithArray("nombre_campo_imprimir_$nombre_campo",$arr_tablas,$arr_campos);

				$js_tabla_campos =$select1->relateWith_mod("nombre_campo_imprimir_$nombre_campo",$arr_tablas,$arr_campos);
				print $js_tabla_campos;
		  ?>
      <tr class="contenidotabla">
        <td><input type="checkbox" name="lista_campos[]" value="<?=$nombre_campo?>" <?if($rows > 0) print "checked";?>></td>
        <td><?=$nombre_campo?></td>
		  <td>
		  	<input type="radio" name="campo_es_id_<?=$nombre_campo?>" value="1" <?if($campo_es_id == 1) print "checked";?>> Si
        	<input type="radio" name="campo_es_id_<?=$nombre_campo?>" value="0" <?if($campo_es_id == 0) print "checked";?>> No
		  </td>
        <td>
			<select name='tipo_campo_<?=$nombre_campo?>' class="campos">
			<option value=''>Seleccione...</option>
			<option value='text' <?if($tipo_campo == 'text') print "selected";?>>Caja de texto peque&ntilde;a</option>
			<option value='autocomplete' <?if($tipo_campo == 'autocomplete') print "selected";?>>Caja de texto autocomplete</option>
			<option value='textarea' <?if($tipo_campo == 'textarea') print "selected";?>>Caja de texto grande</option>
			<option value='textarea_editor' <?if($tipo_campo == 'textarea_editor') print "selected";?>>Caja de texto editor</option>
			<option value='select' <?if($tipo_campo == 'select') print "selected";?>>Seleccionable</option>
			<option value='select_relation' <?if($tipo_campo == 'select_relation') print "selected";?>>Seleccionable Relacionado</option>
			<option value='select_estatico' <?if($tipo_campo == 'select_estatico') print "selected";?>>Seleccionable (Estatico)</option>
			<option value='fecha' <?if($tipo_campo == 'fecha') print "selected";?>>Fecha del Sistema</option>
			<option value='fecha_calendario' <?if($tipo_campo == 'fecha_calendario') print "selected";?>>Fecha Calendario</option>
			<option value='radio' <?if($tipo_campo == 'radio') print "selected";?>>Radio botones</option>
			<option value='bi_radio' <?if($tipo_campo == 'bi_radio') print "selected";?>>Radio botones(Estatico)</option>
			<option value='file' <?if($tipo_campo == 'file') print "selected";?>>Campo de archivo</option>
			<option value='check' <?if($tipo_campo == 'check') print "selected";?>>Cajas de chequeo</option>
			<option value='autonumerico' <?if($tipo_campo == 'autonumerico') print "selected";?>>Autonumerico</option>
			<option value='imagen' <?if($tipo_campo == 'imagen') print "selected";?>>Imagen</option>
			<option value='numero_entero' <?if($tipo_campo == 'numero_entero') print "selected";?>>Campo de numero entero</option>
			<option value='numero_real' <?if($tipo_campo == 'numero_real') print "selected";?>>Campo de numero real</option>
			<option value='email' <?if($tipo_campo == 'email') print "selected";?>>Campo de e-mail</option>
			<option value='password' <?if($tipo_campo == 'password') print "selected";?>>Campo de password</option>
			</select>
		  </td>
        <td><?=$select1->genCode();?></td>
        <td><?=$select2->genCode();?></td>
        <td><?=$select3->genCode();?></td>
        <td><?php
        		echo $condicion_select;
        		echo $c_textbox->Textbox("condicion_select_$nombre_campo","Condicion Select",1,"","campos","20","");
        	?>
        </td>
		  <?
			if($accion == "editar" && $tabla_relacion != '')
			{
				print "<script>
							actualizar_detalle_array_nombre_tabla_relacion_$nombre_campo"."_nombre_campo_relacion_$nombre_campo(document.forma.nombre_tabla_relacion_$nombre_campo);
							actualizar_detalle_array_nombre_tabla_relacion_$nombre_campo"."_nombre_campo_imprimir_$nombre_campo(document.forma.nombre_tabla_relacion_$nombre_campo);
							document.forma.nombre_campo_relacion_$nombre_campo.options[0].value = \"$campo_relacion\";
							document.forma.nombre_campo_relacion_$nombre_campo.options[0].text = \"$campo_relacion\";
							document.forma.nombre_campo_relacion_$nombre_campo.options[0].selected = true;
							document.forma.nombre_campo_imprimir_$nombre_campo.options[0].value = \"$campo_imprimir\";
							document.forma.nombre_campo_imprimir_$nombre_campo.options[0].text = \"$campo_imprimir\";
							document.forma.nombre_campo_imprimir_$nombre_campo.options[0].selected = true;
						</script>";
			}
		  ?>
        <td>
        <input type="radio" name="validacion_<?=$nombre_campo?>" value="1" <?if($validacion == 1) print "checked";?>> Si
        <input type="radio" name="validacion_<?=$nombre_campo?>" value="0" <?if($validacion == 0) print "checked";?>> No
		  </td>
        <td><?=$c_textbox->Textbox("tamano_$nombre_campo","Tama�o",1,"$tamano","campos","6","5"); ?></td>
        <td><?=$c_textbox->Textbox("longitud_$nombre_campo","Longitud M�xima",1,"$longitud","campos","6","5"); ?></td>
        <td><?=$c_textbox->Textbox("valores_opciones_$nombre_campo","Valores para las opciones",1,"$estado1","campos","10",""); ?></td>
        <td><?=$c_textbox->Textbox("nombres_opciones_$nombre_campo","Nombres para las opciones",1,"$estado2","campos","10",""); ?></td>
        <td>
        <input type="radio" name="mostrar_<?=$nombre_campo?>" value="1" <?if($mostrar == 1) print "checked";?>> Si
        <input type="radio" name="mostrar_<?=$nombre_campo?>" value="0" <?if($mostrar == 0) print "checked";?>> No
		  </td>
        <td><?=$c_textbox->Textbox("rotulo_$nombre_campo","R�tulo",1,"$rotulo","campos","10","50"); ?></td>
        </tr>
		  <?
		  }
		  ?>
    </table>
	<p align="center">
		<input type="button" value="Guardar" onclick="guardar();">&nbsp;&nbsp;&nbsp;
		<input type="button" value="Cancelar" onclick="window.location='lista_tablas.php';">
	</p>
<?
}
?>
<input type="hidden" name="accion" value="<?=$accion?>">

<script language="JavaScript">
function guardar()
{
	if(_CF_checkform(this))
	{
		document.forma.action='paso3b.php';
		document.forma.submit();
	}
}

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
        if (p<1 || p==(val.length-1)) errors+= mensaje+' debe ser una direcci�n de correo.\n';
      } else if (test!='R') {
        if (isNaN(val)) errors+= mensaje+' debe ser numerico.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (val<min || max<val) errors+= mensaje+' debe ser un numero entre '+min+' y '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += mensaje+' es requerido.\n'; }
  }

  if (errors) alert('Por favor realice las siguientes correcciones:\n\n'+errors);
  document.MM_returnValue = (errors == '');
}

function  _CF_checkform(_CF_this)
{
  MM_validateForm('tabla','','R','La tabla','nombre_menu','','R','El nombre en el men�','nivel_menu','','R','El nivel en el men�');return document.MM_returnValue
    return true;
}
</script>
</form>
</body>
</html>
