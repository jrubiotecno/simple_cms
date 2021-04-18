<?
Require_once("../utilidades/adodb.php");
Require_once("../conf/config.php");
Require_once("../utilidades/controles/select.php");
Require_once("../utilidades/controles/textbox.php");

$db = New ADODB;
$db2 = New ADODB;
$db->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);
$db2->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);

$db->query("SHOW TABLES");
while($db->next_row())
{
	$arr_tablas[$db->R[0]] = $db->R[0];
	$db2->query("SELECT * FROM ".$db->R[0]);
	$campos = $db2->GetFieldNames();
	for($i=0; $i<count($campos); $i++)
		$arr_campos[] = array($db->R[0],$campos[$i]);
}

// iniciar el objeto select con Nombre Tabla
$select1 = new Select("nombre_tabla", "Nombre Tabla", $arr_tablas, "", 1,"","combobox");
$select1->ShowBlankOption = 1;

// iniciar el objeto select con Campos
$select2 = new Select("nombre_campo", "Nombre Campo","", "", 1, "","combobox");
$select2->ShowBlankOption = 1;

$select1->relateWithArray("nombre_campo",$arr_tablas,$arr_campos);

// iniciar el objeto select con Nombre Tabla
$select3 = new Select("nombre_tabla_relacion", "Nombre Tabla", $arr_tablas, "", 0, "","combobox");
$select3->ShowBlankOption = 1;

// iniciar el objeto select con Campos
$select4 = new Select("nombre_campo_relacion", "Nombre Campo","", "", 0, "","combobox");
$select4->ShowBlankOption = 1;

// iniciar el objeto select con Campos
$select5 = new Select("nombre_campo_imprimir", "Nombre Campo","", "", 0, "","combobox");
$select5->ShowBlankOption = 1;

$select3->relateWithArray("nombre_campo_relacion",$arr_tablas,$arr_campos);

$c_textbox = new Textbox;

/*
If Request.form("btn_guardar") = "Guardar" Then 

	'ºº	INSERTA EL FOLLETO SOLICITADO POR EL CLIENTE	
	tabla 	= "admin_tablas"
	campos 	= "nombre_tabla, nombre_campo, campo_es_id, tipo_campo, tabla_relacion, campo_relacion, campo_imprimir, validacion, tipo_validacion, tamano, longitud, mostrar, rotulo, campo_confirmar, estado1, estado2 "
	valores	= Comillas(Request.form("nombre_tabla")) & "," &_
			Comillas(Request.form("nombre_columna")) & "," &_
			Request.form("campo_es_id") & "," &_
			Comillas(Request.form("tipo_campo")) & "," &_
			Comillas(Request.form("tabla_relacion")) & "," &_
			Comillas(Request.form("campo_relacion")) & "," &_
			Comillas(Request.form("campo_imprimir")) & "," &_
			Request.form("validacion") & "," &_
			Comillas(Request.form("tipo_validacion")) & "," &_
			Comillas(Request.form("tamano")) & "," &_
			Comillas(Request.form("longitud")) & "," &_
			Request.form("mostrar") & "," &_
			Comillas(Request.form("rotulo")) & "," &_
			Comillas(Request.form("campo_confirmar")) & "," &_
			Comillas(Replace(Request.form("estado1"), ",", "")) & "," &_
			Comillas(Replace(Request.form("estado2"), ",", ""))
				
	Set obj_basedatos = new basedatos
	obj_basedatos.Constructor
	Set obj_insertar = New query
	obj_insertar.Insertar obj_basedatos.Cn, tabla, campos, valores

End If
*/
?>
<html>
<title>.:: Administrador de Datos ::.</title>
<link rel="stylesheet" href="estilos.css">
<body bgcolor="#FFFFFF">
<script language="JavaScript" src="validationscripts.js"></script>
<script> 
var nombres_campos = new Array(); 
function indexControl(nombre)
{   
	for(i=0; i < document.forma.elements.length; i++)      
		if(document.forma.elements[i].name == nombre)            
	return i;
}
</script>
<p>&nbsp;</p>
<form method="POST" name="forma" action="paso3.php" enctype="multipart/form-data" onsubmit="return validarForma(this);">
<p class="textos" align="center"><b>Configuración del Administrador de Datos</b></p>
<table width="520" border="0" align="center" cellpadding="2" cellspacing="1">
	<tr class="titulotabla">
	<td colspan="2" align="center"><b>Datos que se van a administrar</b></td>
	</tr>
    <tr class="contenidotabla">
      <td width="200">&nbsp;*Nombre de la tabla:</td>
		<td><?=$select1->genCode();?></td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;*Nombre del campo:</td>
		<td><?=$select2->genCode();?></td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Campo es ID:</td>
		<td>
        <input type="radio" name="campo_es_id" value="1"> Si
        <input type="radio" name="campo_es_id" value="0" checked> No 
		</td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Tipo campo:</td>
		<td>
		<select name='tipo_campo'>
		<option value='0'>Seleccione...</option>
		<option value='text'>Caja de texto peque&ntilde;a</option>
		<option value='textarea'>Caja de texto grande</option>
		<option value='select'>Seleccionable</option>
		<option value='select_estatico'>Seleccionable (Estático)</option>
		<option value='fecha'>Fecha del Sistema</option>
		<option value='fecha_calendario'>Fecha Calendario</option>
		<option value='radio'>Radio botones</option>
		<option value='bi_radio'>Radio botones(Estático)</option>
		<option value='file'>Campo de archivo</option>
		<option value='check'>Cajas de chequeo</option>
		<option value='autonumerico'>Autonumerico</option>
		<option value='imagen'>Imágen</option>
		</select>		
		</td>
    </tr>	 
    <tr class="contenidotabla">
      <td>&nbsp;Tabla relación:</td>
		<td><?=$select3->genCode();?></td>
    </tr>	 
    <tr class="contenidotabla">
      <td>&nbsp;Campo relación:</td>
		<td><?=$select4->genCode();?></td>
    </tr>    
    <tr class="contenidotabla">
      <td>&nbsp;Campo imprimir:</td>
		<td><?=$select5->genCode();?></td>
    </tr>    
    <tr class="contenidotabla">
      <td>&nbsp;Validación:</td>
		<td>
        <input type="radio" name="validacion" value="1" checked> Si
        <input type="radio" name="validacion" value="0"> No
		</td>
    </tr>    
    <tr class="contenidotabla">
      <td>&nbsp;Tipo validación:</td>
		<td>
        <select name="tipo_validacion" class="campos_texto" onChange="ocultar_confirmar();">
          <option value='0'>Seleccione...</option>
          <option value="Email">Email</option>
          <option value="EmailConfirm">Confirmar Email</option>
          <option value="Password">Password</option>
          <option value="PasswordConfirm">Confirmar Password</option>
          <option value="NumberInteger">Número Entero</option>
        </select>
		</td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Tamaño:</td>
		<td><?=$c_textbox->Textbox("tamano","Tamaño",1,"","","6","5"); ?></td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Longitud Máxima:</td>
		<td><?=$c_textbox->Textbox("longitud","Longitud Máxima",1,"","","6","5"); ?></td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Campo a Confirmar:</td>
		<td><?=$c_textbox->Textbox("campo_confirmar","Campo a Confirmar",1,"","","21","20"); ?></td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Nombres de los estados:</td>
		<td><?=$c_textbox->Textbox("nombres_estados","Nombres de los estados",1,"","","30",""); ?></td>
    </tr>	 	 
    <tr class="contenidotabla">
      <td>&nbsp;Valores para las opciones (|):</td>
		<td><?=$c_textbox->Textbox("valores_opciones","Valores para las opciones",1,"","","30",""); ?></td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Nombres para las opciones (|):</td>
		<td><?=$c_textbox->Textbox("nombres_opciones","Nombres para las opciones",1,"","","30",""); ?></td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;Mostrar el campo en la consulta:</td>
		<td>
        <input type="radio" name="mostrar" value="1" checked> Si
        <input type="radio" name="mostrar" value="0"> No
		</td>
    </tr>
    <tr class="contenidotabla">
      <td>&nbsp;R&oacute;tulo:</td>
		<td><?=$c_textbox->Textbox("rotulo","Rótulo",1,"","","30","50"); ?></td>
    <tr class="contenidotabla">
	 <td colspan="2" align="center">
	 <input type="submit" value="Guardar">
	 </td>
    <tr>
	 
    </tr>
  </table>
</form>
</body>
</html>
