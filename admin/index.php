<?php
error_reporting(0);
/**********************************************************************************
'Descripci�n: Archivo que muestra los registros de la tabla seleccionada
***********************************************************************************/
require_once("session.php");
if($_SESSION[s_usuario]!=""){
$_SESSION["rotulos"]="";
$_SESSION["campos_nombre"]="";
$_SESSION["id_campo"]="";
$_SESSION["tabla"]="";
$_SESSION["SELECT"]="";
$_SESSION["FROM_SQL"]="";
$_SESSION["WHERE"]="";
$_SESSION["ORDER_BY"]="";
$_SESSION["descripcion_tabla"] = "";

//DETERMINAMOS SI HAY UN WHERE EN EL REQUEST POR DEFECTO
if ($_REQUEST["campo"] && $_REQUEST["valor"]){
	$_SESSION["WHERE"] = $_REQUEST["campo"] . "=" . $_REQUEST["valor"];
	$_SESSION["WHERE_CAMPO_ID"] = $_REQUEST["campo"];
	$_SESSION["WHERE_CAMPO_VALOR"] = $_REQUEST["valor"];
}

//RECIBIMOS LA TABLA QUE SE VA ADMINISTRAR
if ($_GET['tabla']!="")
	$tabla=$_GET['tabla'];
else
	$tabla=$_POST['tabla'];


$list_tipos_permiso = null;
$list_campos = null;
$id_campo = "";

//Obtner los datos del usuario
$id_perfil = $_SESSION["s_id_perfil"];

//Dependiendo de la tabla que se cargue, la ruta de copir los archivos cambia
//OJO ESTA SE DEBE CONFIGURAR POR EL ADMINISTRADOR
$ruta_archivos="../galeria/";
//Fin ruta de archivos

//Verificar si el nombre de la tabla es diferente de vacio
if(strlen($tabla)){
	// **** Obtener los permisos del usuario *****.

	//Crear objeto que maneja los tipos de permiso del usuario
	$tipos_permiso = new AdminTipoPermiso();
	//Consultar el listado de permisos del usuario sobre la tabla
	$list_tipos_permiso = $tipos_permiso->buscarPorTablaPerfil($tabla,$id_perfil);


	//*** Obtener los datos de la tabla seleccionada
	$datos_tabla = new AdminMenu();
	$datos_tabla->findByTabla($tabla);

	$descripcion_tabla=$datos_tabla->getDescripcion();
	$_SESSION["descripcion_tabla"] = $descripcion_tabla;

}

?>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form method="post" action="index.php" name="forma">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="textos" >

     <?php
	include ("includes/general/encabezado.php");
     ?>

    </td>
  </tr>
  <tr>
     <td>

     <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr align="center" valign="top">
		  <?php

		echo "<td colspan='2'>";

		//Si se selecciono una tabla se mustra la informaci�n sobre la tabla
		if (strlen($tabla)) {

			//*** Validar los permisos que tiene el usuario ***
			$_SESSION['insertar'] = false;
			$_SESSION['editar'] = false;
			$_SESSION['consultar'] = false;
			$_SESSION['borrar'] = false;
			$_SESSION['exportar'] = false;
			$campos_file = "";

			//Si el listado de permisos es diferente de null cargar los permisos que tiene el  usuario
			if ($list_tipos_permiso != null) {

				//Mientras el listado de permisos no llegue al final verificar cuales son los permisos del usuario
				while ($tipo_permiso = $list_tipos_permiso -> next_entry()) {

					if ($tipo_permiso -> getNombre() == "Insertar")
						$_SESSION['insertar'] = true;
					else if ($tipo_permiso -> getNombre() == "Editar")
						$_SESSION['editar'] = true;
					else if ($tipo_permiso -> getNombre() == "Consultar")
						$_SESSION['consultar'] = true;
					else if ($tipo_permiso -> getNombre() == "Eliminar")
						$_SESSION['borrar'] = true;
					else if ($tipo_permiso -> getNombre() == "Exportar")
						$_SESSION['exportar'] = true;

				}

			}

			//Si el listado de campos es diferente de null, obtener los valores a mostrar

			$from = "";
			$parametros_buscar = "";
			$rotulos = "";

			//**** Consultar los campos de la tabla seleccionada ***
			$tablas = new AdminTablas();
			//Consultar el listado de permisos del usuario sobre la tabla
			$list_campos = $tablas -> buscarPorNombreTabla($tabla);

			if ($list_campos) {

				//Obtener el listado de campos a mostrar
				while ($campo = $list_campos -> next_entry()) {

					//Generar el listado de campos a mostrar
					if ($campo -> getMostrar() == 1) {
						if (strlen($campo -> getTablaRelacion())) {

							$strAlias = $campo -> getAliasRelacion();
							if (!$strAlias)
								$strAlias = $campo -> getTablaRelacion();

							$from .= " LEFT OUTER JOIN " . $campo -> getTablaRelacion() . " " . $strAlias . " ON $tabla" . "." . $campo -> getNombreCampo() . " = " . $strAlias . "." . $campo -> getCampoRelacion();

							//Selecciona los campos a imprimir del JOIN
							if (!strlen($parametros_buscar)) {
								if (strpos($parametros_buscar, $campo -> getCampoImprimir()))
									$parametros_buscar .= " " . $strAlias . "." . $campo -> getCampoImprimir() . " AS " . $strAlias . $campo -> getCampoImprimir();
								else
									$parametros_buscar .= " " . $strAlias . "." . $campo -> getCampoImprimir();
							} else {

								if (strpos($parametros_buscar, $campo -> getCampoImprimir())) {
									$parametros_buscar .= " , " . $strAlias . "." . $campo -> getCampoImprimir() . " AS " . $strAlias . $campo -> getCampoImprimir();
								} else {
									$parametros_buscar .= " , " . $strAlias . "." . $campo -> getCampoImprimir();

								}
							}
							if (!strlen($campos_nombre)) {
								if (strpos($campos_nombre, $campo -> getCampoImprimir()))
									$campos_nombre .= $campo -> getTablaRelacion() . "|" . $campo -> getTipoCampo() . "|" . $strAlias . $campo -> getCampoImprimir();
								else
									$campos_nombre .= $campo -> getTablaRelacion() . "|" . $campo -> getTipoCampo() . "|" . $campo -> getCampoImprimir();
							} else {
								if (strpos($campos_nombre, $campo -> getCampoImprimir()))
									$campos_nombre .= "|" . $campo -> getTablaRelacion() . "|" . $campo -> getTipoCampo() . "|" . $strAlias . $campo -> getCampoImprimir();
								else
									$campos_nombre .= "|" . $campo -> getTablaRelacion() . "|" . $campo -> getTipoCampo() . "|" . $campo -> getCampoImprimir();
							}

							//En caso de que el campo sea file guardar el nombre
							if ($campo -> getTipoCampo() == "file") {
								if (!strlen($campos_file))
									$campos_file .= $campo -> getNombreCampo();
								else
									$campos_file .= "|" . $campo -> getNombreCampo();
							}
						} else {
							if (!strlen($parametros_buscar)) {
								if (strpos($parametros_buscar, $campo -> getNombreCampo()))
									$parametros_buscar .= " " . $tabla . "." . $campo -> getNombreCampo() . " AS " . $campo -> getNombreCampo();
								else
									$parametros_buscar .= " " . $tabla . "." . $campo -> getNombreCampo();
							} else {
								if (strpos($parametros_buscar, $campo -> getNombreCampo())) {
									$parametros_buscar .= " , " . $tabla . "." . $campo -> getNombreCampo() . " AS " . $campo -> getNombreCampo();
								} else {
									$parametros_buscar .= " , " . $tabla . "." . $campo -> getNombreCampo();
								}
							}

							if (!strlen($campos_nombre)) {
								if (strpos($campos_nombre, $campo -> getNombreCampo())) {
									$campos_nombre .= $tabla . "|" . $campo -> getTipoCampo() . "|" . $campo -> getNombreCampo();
								} else {
									$campos_nombre .= $tabla . "|" . $campo -> getTipoCampo() . "|" . $campo -> getNombreCampo();
								}
							} else {
								if (strpos($campos_nombre, $campo -> getNombreCampo())) {
									$campos_nombre .= "|" . $tabla . "|" . $campo -> getTipoCampo() . "|" . $campo -> getNombreCampo();
								} else {
									$campos_nombre .= "|" . $tabla . "|" . $campo -> getTipoCampo() . "|" . $campo -> getNombreCampo();
								}
							}

							if ($campo -> getTipoCampo() == "file") {
								if (!strlen($campos_file))
									$campos_file .= $campo -> getNombreCampo();
								else
									$campos_file .= "|" . $campo -> getNombreCampo();
							}
						}
						if (!strlen($rotulos))
							$rotulos .= $campo -> getRotulo();
						else
							$rotulos .= "|" . $campo -> getRotulo();
					}

					//TRAEMOS EL CAMPO ID DE LA TABLA
					if ($campo -> getCampoesId() == 1) {
						$id_campo = $campo -> getNombreCampo();
					}
				}

				//A RMAMOS SELECT, FROM Y WHERE DE LA CONSULTA A MOSTRAR
				$SELECT = $tabla . "." . $id_campo . "," . $parametros_buscar;
				$FROM = $tabla . " " . $from;

				//OJO EL NUMERO DE RESULTADOS SE DEBERIA DEJAR POR TABLA Y NO UNO PARA TODOS
				//PARA ESTO SE DEBE ARREGLAR EL CONFIGURACION DE LA TABLA

				$_SESSION["rotulos"] = $rotulos;
				$_SESSION["campos_nombre"] = $campos_nombre;
				$_SESSION["id_campo"] = $id_campo;
				$_SESSION["tabla"] = $tabla;
				$_SESSION["SELECT"] = $SELECT;
				$_SESSION["FROM_SQL"] = $FROM;

				$ORDER_BY = "";
				$_SESSION["ORDER_BY"] = $ORDER_BY;

				//IMPRIME ENCABEZADO PARA LA TABLA A  ADMINISTRAR
				$strTablaDatos .= "<table width='100%' cellpadding='0' align='center' border=0  cellspacing='0'>\n";
				$strTablaDatos .= "<tr><td class='titletable' height='33'>&nbsp;<b>" . $TITULO_ADMINISTRAR . " " . $descripcion_tabla . "</b></td></tr>\n";
				$strTablaDatos .= "</table>\n";
				$strTablaDatos .= "<table width='100%' celspace='2' align='center' border=0>\n";

				$strTablaDatos .= "<tr><td>\n";

				if ($_SESSION['insertar']) {
					if ($P_TIPO_LINK == "icono")
						$strTablaDatos .= "	<a href=\"javascript:detailsAdmin('editNew','insert','" . $tabla . "','','','" . $descripcion_tabla . "');\" class='links2'><img src=\"../images/$P_IMAGEN_INSERTAR\" border=\"0\" alt=\"New\"></a> <a href=\"javascript:openModalDialogURL('editNew.php?accion=insert&tabla=" . $tabla . "','" . $INSERTAR_REGISTRO . "',780,500);\" class='links2'>New</a>&nbsp;&nbsp;";
					else if ($P_TIPO_LINK == "texto")
						$strTablaDatos .= "	<a href=\"javascript:detailsAdmin('insertar', 'insert.php','$tabla','','','" . $descripcion_tabla . "','','');\" class='links2'>Insertar</a>&nbsp;&nbsp;";

				}

				if ($_SESSION['consultar']) {
					if ($P_TIPO_LINK == "icono") {
						//$strTablaDatos .= "	<a href=\"javascript:detailsAdmin('editNew','search','".$tabla."','','','" . $descripcion_tabla . "',750,500);\" class='links2'><img src=\"../images/$P_IMAGEN_BUSCAR\" border=\"0\" alt=\"Buscar\"></a>";
						$strTablaDatos .= " <a href=\"javascript:openModalDialogURL('editNew.php?accion=search&tabla=" . $tabla . "','" . $BUSCAR_DATOS . "',780,500);\" class='links2'><img src=\"../images/$P_IMAGEN_BUSCAR\" border=\"0\" alt=\"Search\"></a>&nbsp;&nbsp;";
					} else if ($P_TIPO_LINK == "texto")
						$strTablaDatos .= "	<a href=\"javascript:accion('buscar', 'buscar.php','$tabla','','','" . $descripcion_tabla . "','','');\" class='links2'>Buscar</a>&nbsp;&nbsp;";
				}
				if ($_SESSION['exportar']) {
					if ($P_TIPO_LINK == "icono")
						$strTablaDatos .= "	<a href=\"javascript:document.exportarxls.submit();\" class='links2'><img src=\"../images/$P_IMAGEN_EXPORTAR\" border=\"0\" alt=\"Exportar\"></a>&nbsp;&nbsp;";
					else if ($P_TIPO_LINK == "texto")
						$strTablaDatos .= "	<a href=\"javascript:document.exportarxls.submit();\" class='links2'>Exportar</a>&nbsp;&nbsp;";
				}

				$strTablaDatos .= "\n</td>\n";
				$strTablaDatos .= "<tr><td><div id='msjAccion' class='msjAccion'></div></td></tr>";
				$strTablaDatos .= "</table>";

				//PINTA DIV PARA EL CONTENEDOR DE DATOS
				$strTablaDatos .= "<div id='resultDatos'>";
				$strTablaDatos .= "</div>";

				//SE IMPRIME LOS DATOS INICIALES
				echo $strTablaDatos;

				//PINTA LA TABLA DE DATOS PARA HACER PRUEBAS
				//include ("resultados_tabla.php");

				//DESTRUIR OBJETOS
				$tipos_permiso -> Destroy();
				$tablas -> Destroy();
				$datos_tabla -> Destroy();
				//$objeto->Destroy();
			}
		}
else{
	echo "<br/><br/><center><img src='../images/tpl/logo_.png'/></center>";
}
	      ?>

<input type="hidden" name="tabla" value="<?=$tabla?>">
</form>


</td>
</tr>

<?php
if ($tabla) {
	//LLAMAMOS LA FUNCION INICIAL PARA CARGAR LOS DATOS
	$msjPaginador = $MSJ_CARGANDO;
	if ($_POST['option'])
		$msjPaginador = $_POST['option'];

	echo funcionJS("paginadorAjaxAdmin(1,'','','" . $msjPaginador . " ','resultados_tablaXML','')");
}

include ("includes/general/pie.php");

}else{
echo "<script>window.location.href='login.php';</script>";
}
?>