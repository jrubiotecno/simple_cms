<?extract($_GET);extract($_POST);
Require_once("../utilidades/adodb.php");
Require_once("../conf/config.php");

$db = New ADODB;
$db->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);
if($accion == "borrar")
{
	$db->query("DELETE FROM admin_menu WHERE nombre_tabla='$tabla'");
	$db->query("DELETE FROM admin_tablas WHERE nombre_tabla='$tabla'");
}
?>

<html>
<title>.:: Administrador de Datos  ::.</title>
<link rel="stylesheet" href="estilos.css">
<body bgcolor="#FFFFFF">
<p>&nbsp;</p>
<form method="POST" name="forma" action="">
<p class="textos" align="center"><b>Configuraci�n del Administrador de Datos</b></p>
<table width="450" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr><td colspan="3" class='textos'>
  <a href="paso3.php" class='links'>Crear tabla</a>
  </td></tr>
  <tr class="titulotabla">
    <td colspan="4" align="center"><b>Tablas creadas</b></td>
  </tr>
  <?
	$db->query("SELECT * FROM admin_menu ORDER BY descripcion");
	while($db->next_row())
	{
		print "<tr class='contenidotabla'><td>";
		print $db->descripcion;
		print "</td><td align='center'><a href='javascript: quehacer(\"editar\",\"".$db->nombre_tabla."\");' class='links'>Editar Campos</a></td>";
		print "</td><td align='center'><a href='javascript: quehacer(\"configuracion\",\"".$db->nombre_tabla."\");' class='links'>Configuracion</a></td>";
		print "</td><td align='center'><a href='javascript: quehacer(\"borrar\",\"".$db->nombre_tabla."\");' class='links'>Borrar Tabla</a></td></tr>";
	}  
  ?>
</table>
<br>
<script>
function quehacer(accion,tabla)
{
	document.forma.tabla.value = tabla;
	document.forma.accion.value = accion;
	if(accion == "editar")
	{
		document.forma.action = "paso3.php";
		document.forma.submit();
	}
	
	if(accion == "borrar")
	{
		confirma=confirm("Esta acci�n no se puede deshacer.\n�Confirma que desea borrar esta tabla del administrador?");
		if(confirma==true)
		{
			document.forma.action="lista_tablas.php";
			document.forma.submit();
		}	
	}
	
	if(accion == "configuracion")
	{	
		document.forma.action="configuracion_tabla.php";
		document.forma.submit();
			
	}	
}
</script>
<input type="hidden" name="tabla">
<input type="hidden" name="accion">
</form>
</body>
</html>
