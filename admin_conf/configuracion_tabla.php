<?
Require_once("../utilidades/adodb.php");
Require_once("../conf/config.php");

$db = New ADODB;
$db->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);

if ($_POST['accion']=="guardar_configuracion"){

	$condicion_consulta = ($_POST['condicion_consulta'])?addslashes($_POST['condicion_consulta']):"";
	$total_filas_datos = ($_POST['total_filas_datos'])?$_POST['total_filas_datos']:"0";
	$ruta_archivos = ($_POST['ruta_archivos'])?$_POST['ruta_archivos']:"";
	$ordenar_por = ($_POST['ordenar_por'])?$_POST['ordenar_por']:"";
	$orientacion = ($_POST['orientacion'])?$_POST['orientacion']:"";

	//GUARDAMOS EL REGISTRO DE CONFIGURACION DE TABLA
	$strSQL = "UPDATE admin_conf_tablas SET orientacion='".$orientacion ."',ordenar_por='".$ordenar_por ."', condicion_consulta='".$condicion_consulta ."', total_filas_datos='".$total_filas_datos."', ruta_archivos='".$ruta_archivos."' WHERE tabla='".$_POST['tabla']."'";
	$db->query($strSQL);
}

//TRAEMOS EL REGISTRO DE CONFIGURACION DE LA TABLA
$strSQL = "SELECT * FROM admin_conf_tablas WHERE tabla='".$_POST['tabla']."'";
$db->query($strSQL);

if ($db->next_row()){
	$condicion_consulta = $db->condicion_consulta;
	$total_filas_datos = $db->total_filas_datos;
	$ruta_archivos = $db->ruta_archivos;
	$ordenar_por = $db->ordenar_por;
	$orientacion = $db->orientacion;
}


?>

<html>
<title>.:: Administrador de Datos ::.</title>
<link rel="stylesheet" href="estilos.css">
<body bgcolor="#FFFFFF">
<p>&nbsp;</p>
<form method="POST" name="forma" action="">
<p class="textos" align="center"><b>Configuración del Administrador de Datos</b></p>
<table width="60%" border="1" align="center" cellpadding="2" cellspacing="1">
	<tr class="titulotabla">
		<td colspan="2" align="center"><b>Configuracion tabla: <?php echo $_POST['tabla']?></b></td>
	</tr>
	<tr class="titulotabla">
		<td >Condicion consulta datos</td>
		<td >
			<b><?php echo $condicion_consulta?></b>
			<br>
			<input type="text" name="condicion_consulta" size="50" value="">
		</td>
	</tr>
	<tr class="titulotabla">
		<td >Total filas para resultados</td>
		<td ><input type="text" name="total_filas_datos" size="3" maxlength="3" value='<?php echo $total_filas_datos?>'></td>
	</tr>
	<tr class="titulotabla">
		<td >Ruta para guardar archivos</td>
		<td ><input type="text" name="ruta_archivos" size="50" value="<?php echo $ruta_archivos?>"></td>
	</tr>
	<tr class="titulotabla">
		<td >Ordenar tabla por</td>
		<td ><input type="text" name="ordenar_por" size="50" value="<?php echo $ordenar_por?>"></td>
	</tr>
	<tr class="titulotabla">
		<td >Orientacion para ordenar</td>
		<td ><input type="text" name="orientacion" size="50" value="<?php echo $orientacion?>"></td>
	</tr>	
	<tr class="titulotabla">
		<td colspan="2" align="center"><input type="submit" value="Guardar Configuracion"><input type="button" value="Cancelar" onclick="location.href='lista_tablas.php'"></td>
	</tr>
</table>
<input type="hidden" name="tabla" value="<?php echo $_POST['tabla']?>">
<input type="hidden" name="accion" value="guardar_configuracion">
</form>
</body>
</html>
