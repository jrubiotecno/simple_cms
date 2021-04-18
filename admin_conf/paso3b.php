<?extract($_GET);extract($_POST);
Require_once("../utilidades/adodb.php");
Require_once("../conf/config.php");
$db = New ADODB;
$db->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);

if($accion == "editar")
{
	$db->query("DELETE FROM admin_tablas WHERE nombre_tabla='$tabla'");
	$db->query("UPDATE admin_menu SET descripcion='$nombre_menu',grupo='$nivel_menu' WHERE nombre_tabla='$tabla'");
}
else
	$db->query("INSERT INTO admin_menu (nombre_tabla,descripcion,grupo) VALUES ('$tabla','$nombre_menu','$nivel_menu')");

for($i=0; $i<count($lista_campos);$i++)
{
	$variable = "campo_es_id_$lista_campos[$i]";
	$campo_es_id = $$variable;
	$variable = "tipo_campo_$lista_campos[$i]";
	$tipo_campo = $$variable;
	$variable = "nombre_tabla_relacion_$lista_campos[$i]";
	$nombre_tabla_relacion = $$variable;
	$variable = "nombre_campo_relacion_$lista_campos[$i]";
	$nombre_campo_relacion = $$variable;
	$variable = "nombre_campo_imprimir_$lista_campos[$i]";
	$nombre_campo_imprimir = $$variable;
	$variable = "condicion_select_$lista_campos[$i]";
	$condicion_select = $$variable;
	$variable = "validacion_$lista_campos[$i]";
	$validacion = $$variable;
	$variable = "tamano_$lista_campos[$i]";
	$tamano = $$variable;
	$variable = "longitud_$lista_campos[$i]";
	$longitud = $$variable;
	$variable = "valores_opciones_$lista_campos[$i]";
	$valores_opciones = $$variable;
	$variable = "nombres_opciones_$lista_campos[$i]";
	$nombres_opciones = $$variable;
	$variable = "mostrar_$lista_campos[$i]";
	$mostrar = $$variable;
	$variable = "rotulo_$lista_campos[$i]";
	$rotulo = $$variable;

	$campos = "nombre_tabla,nombre_campo,campo_es_id,tipo_campo,tabla_relacion,campo_relacion,campo_imprimir,validacion,tamano,longitud,mostrar,rotulo,estado1,estado2,condicion_select";
	$valores = "'$tabla','$lista_campos[$i]','$campo_es_id','$tipo_campo','$nombre_tabla_relacion','$nombre_campo_relacion','$nombre_campo_imprimir','$validacion','$tamano','$longitud','$mostrar','$rotulo','$valores_opciones','$nombres_opciones','$condicion_select'";
	$db->query("INSERT INTO admin_tablas ($campos) VALUES ($valores)");
}

$strSQL = "INSERT INTO admin_conf_tablas(tabla) VALUES ('".$tabla."')";
$db->query($strSQL);

print "<script> window.location='lista_tablas.php'; </script>";
exit;
?>
