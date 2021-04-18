<?extract($_GET);extract($_POST);

$contenido_archivo = "<?
/*
ARCHIVO
    config.php

DESCRIPCION
    archivo para manejar la configuraci�n del sistema

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
 $autor     ".date("d/m/Y")."      Creaci�n
*/

// CONFIGURACION DE LA BD
\$CONF_DB_TYPE = \"mysql\";
\$CONF_DB_NAME = \"$bd_nombre\";
\$CONF_DB_HOST = \"$bd_host\";
\$CONF_DB_USER = \"$bd_usuario\";
\$CONF_DB_PASS = \"$bd_clave\";

// PARAMETROS DE DISE�O
\$P_TITULO_PAGINAS = \"$titulo_paginas\";
\$P_HOJA_ESTILOS = \"$hoja_estilos\";
\$P_HOJA_ESTILOS_MENU = \"$hoja_estilos_menu\";
\$P_IMAGEN_CABEZOTE = \"$imagen_cabezote\";
\$P_ALT_IMAGEN_CABEZOTE = \"$texto_alt_cabezote\";
\$P_TIPO_MENU = \"$tipo_menu\";
\$P_TIPO_LINK = \"$tipo_link\";
\$P_IMAGEN_INSERTAR = \"$img_insertar\";
\$P_IMAGEN_EDITAR = \"$img_editar\";
\$P_IMAGEN_BUSCAR = \"$img_buscar\";
\$P_IMAGEN_BORRAR = \"$img_borrar\";
\$P_IMAGEN_EXPORTAR = \"$img_excel\";
\$P_IMAGEN_ACTIVAR = \"$img_activar\";
\$P_IMAGEN_INACTIVAR = \"$img_inactivar\";
\$P_IMAGEN_SALIR = \"$img_salir\";
\$P_TABLA_TIGRA1 = \"$color_tigra1\";
\$P_TABLA_TIGRA2 = \"$color_tigra2\";
\$P_TABLA_TIGRA3 = \"$color_tigra3\";
\$P_TABLA_TIGRA4 = \"$color_tigra4\";

// PARAMETROS GENERALES
\$P_NUM_RESULTS = \"$resultados_pagina\";		// n�mero de resutlados por p�gina
\$P_TIME_SESSION = \"$tiempo_sesion\";		// tiempo de duraci�n de la sesi�n

?>
";
//copia los archivos de estilos
if($hoja_estilos != "")
	copy("./test/inc/$hoja_estilos","../html/includes/$hoja_estilos");
if($hoja_estilos_menu != "")
	copy("./test/inc/$hoja_estilos_menu","../html/includes/$hoja_estilos_menu");
if($imagen_cabezote != "")
	copy("./test/imagenes/$imagen_cabezote","../html/imagenes/$imagen_cabezote");
	
// crear al archivo de configuraci�n
$out = fopen("../conf/config.php", "w");
fwrite($out, $contenido_archivo);
fclose($out);

// crea las tablas en la BD
if($myfile=(fopen("archivos_ejemplo/admin.sql","r")))
{
	while(!feof($myfile))
		$query.=fgetc($myfile);
	fclose($myfile);
	Require_once("../utilidades/adodb.php");
	Require_once("../conf/config.php");
	$db = New ADODB;
	$db->connect($CONF_DB_NAME,$CONF_DB_HOST,$CONF_DB_USER,$CONF_DB_PASS,$CONF_DB_TYPE,true);
	$subquery = explode(';', $query);
	for($i=0;count($subquery)>($i+1);$i++)
		$db->query($subquery[$i]);
}

print "<script> window.location='lista_tablas.php'; </script>";
exit;
?>
