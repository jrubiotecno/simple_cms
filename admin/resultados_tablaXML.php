<?php
/**********************************************************************************
'Descripci�n: Archivo que trae la lista de resultados segun la tabla consultada
***********************************************************************************/
require_once("session.php");

//RECIBIMOS LA TABLA QUE SE VA ADMINISTRAR
$tabla=$_SESSION['tabla'];

//OBTENEMOS CONFIGURACION DE LA TABLA
$dbAux = new ADODB;
$strSQL = "SELECT * FROM admin_conf_tablas WHERE tabla='".$tabla."'";
$dbAux->query($strSQL);


$conf_condicion_consulta = "";
$conf_total_fila_datos = 0;
$conf_ruta_archivos = "";
$conf_ordenar_por = "";
$conf_orientacion = "";
if ($dbAux->next_row()){
	$conf_condicion_consulta = $dbAux->condicion_consulta;
	$conf_total_fila_datos = $dbAux->total_filas_datos;
	$conf_ruta_archivos = $dbAux->ruta_archivos;
	$conf_ordenar_por = $dbAux->ordenar_por;
	$conf_orientacion = $dbAux->orientacion;
}


$id_campo=$_SESSION['id_campo'];

//ARMMAMOS EL SQL DE CONSULTA
$strSQL = "SELECT ".$_SESSION['SELECT']." FROM ".$_SESSION['FROM_SQL']." ";

//WHERE
eval("\$conf_condicion_consulta = \"$conf_condicion_consulta\";");

if ($_SESSION['WHERE'])
	$strSQL .= "WHERE " . $_SESSION['WHERE']. " " . $conf_condicion_consulta;
else{
	if ($conf_condicion_consulta)
		$strSQL .= "WHERE 1=1 " . $conf_condicion_consulta;
}


//ORDER BY
if ($_POST[order_by]!=""){
	$ORDER_BY = "ORDER BY " .$_POST[order_by]." " .$_POST[order_direction];
	$_SESSION['ORDER_BY']=$ORDER_BY;
}
else if ($conf_ordenar_por){
	$ORDER_BY = "ORDER BY " .$conf_ordenar_por." " .$conf_orientacion;
	$_SESSION['ORDER_BY']=$ORDER_BY;
}


//AUMENTA ORDER BY
$strSQL .= $_SESSION['ORDER_BY'];

//echo $strSQL;

//PAGINACION
$pagina = 1;
if ($_POST[pagina])
	$pagina = $_POST[pagina];

//DETERMINAMOS SI HAY NUMERO DE RESULTADOS PARA EL RESULTADO DE DATOS
$num_resultados_datos = $P_NUM_RESULTS;
if ($conf_total_fila_datos>0)
	$num_resultados_datos = $conf_total_fila_datos;

$prueba = $db->PageExecute($strSQL, $num_resultados_datos, $pagina, false, 0);

//CLASE PAGINADOR
$paginador = new Paginador($prueba,"Cargando...","resultados_tablaXML",'');

//Realizar la consulta en la base de datos y cargar los resultados.
$objeto = new Generico();

$resultado = $objeto->find_NEW($paginador->getSQL());


//DETERMINA SI HAY DATOS EN LA TABLA
if($resultado->num_rows() > 0){



	if($_SESSION['consultar']){

		//Obtengo el nombre de las columnas
		$list_columnas = explode("|",$_SESSION['rotulos']);
		$list_campos_nombre = explode("|",$_SESSION['campos_nombre']);
	

		//ARMAMOS LA TABLA CONTENEDORA DE INFORMACION
		$strTablaDatos .= "<table width='100%' border='0' id='".$tabla."_admin' cellspacing='0' cellpadding='0'>";
		$strTablaDatos .= "<tr class='title7'>";
		$strTablaDatos .= "<td colspan align='center'>".$paginador->getPalabrasAdmin('title7','title7')."</td>";
		$strTablaDatos .= "</tr>";

		$strTablaDatos .= "<tr>";
		$strTablaDatos .= "<td>";
		$strTablaDatos .= "<div id='Cls' class='gridbox gridbox_dhx_skyblue'><div id='xdf' class='xhdr'><table width='100%'  border='0' cellspacing='1' cellpadding='1' align='$center' class='hdr'>";
		$strTablaDatos .= "<tr>\n";

		//Si el usuario tiene permisos de editar imprime el link
		if($_SESSION["editar"]){
			$strTablaDatos .= "<td class='titlecolumns' align='center'>".$TITLE_EDITAR."</td>\n";
		}

		//Si el usuario tiene permisos de borrar imprime el link
		if($_SESSION["borrar"]){
			$strTablaDatos .= "<td class='titlecolumns' align='center'>".$TITLE_BORRAR."</td>\n";
		}
		
		//Mostrar el nombre de las filas
		$j=1;
		for($i=0;$i<count($list_columnas);$i++){
			$indiceCampo = ($j*3) - 1;
			$strTablaDatos .= "<td class='titlecolumns' align='center'>" . $list_columnas[$i] . "&nbsp;&nbsp;<a href=\"javascript:paginadorAjaxAdmin('1','".$list_campos_nombre[$indiceCampo]."','ASC','Ordering and Loading','resultados_tablaXML','');\"><img src='../images/up.gif' border='0'></a><a href=\"javascript:paginadorAjaxAdmin('1','".$list_campos_nombre[$indiceCampo]."','DESC','Ordering and Loading','resultados_tablaXML','');\"><img src='../images/down.gif' border='0'></a></td>\n";
			$j++;
		}

		$strTablaDatos .= "</tr>\n";

		//*** IMPRIMIR DATOS DEL SISTEMA ***
		$cont = 0;

		while(($resultado->next_row())){
			
			if($cls=="ev_dhx_skyblue"){
				$cls="odd_dhx_skyblue";
			}
			else{
				$cls="ev_dhx_skyblue";
			}

			$strTablaDatos .= "<tr class='datos ".$cls."'>\n";


			//Si el usuario tiene permisos de editar imprime el link
			if($_SESSION['editar']){
				if($P_TIPO_LINK == "icono")
					$strTablaDatos .= "	<td align='center'>										
										<a href=\"javascript:openModalDialogURL('editNew.php?time=".time()."&accion=update&tabla=".$tabla."&campo=" . $id_campo . "&id=" . $resultado->$id_campo . "','Edit',780,500);\" class='links2'>Edit</a></td>";
				else if($P_TIPO_LINK == "texto")
					$strTablaDatos .= "	<td align='center'><a href=\"javascript:accion('editar', 'editar.php','$tabla','" . $resultado->$id_campo . "','$id_campo','" . $_SESSION['descripcion_tabla'] . "','','');\" class='links2'>Editar</a></td>";
			}


			//Si el usuario tiene permisos de borrar imprime el link
			if($_SESSION['borrar']){
			 if($invocar_tabla!=""){
				$strTablaDatos .= "	<td align='center'>&nbsp;</td>";
			 }
			 else{
				if($P_TIPO_LINK == "icono")
					$strTablaDatos .= "	<td align='center'><a href=\"javascript:deleteRegisterAjax('$tabla','" . $resultado->$id_campo . "','$id_campo');\" class='links2'><img src=\"../images/$P_IMAGEN_BORRAR\" border=\"0\" alt=\"Delete\"></a></td>";
				else if($P_TIPO_LINK == "texto")
					$strTablaDatos .= "	<td align='center'><a href=\"javascript:deleteRegisterAjax('$tabla','" . $resultado->$id_campo . "','$id_campo');\" class='links2'>Delete</a></td>";
			 }
			}
			
			//HACEMOS UNA VALIDACION ESPECIAL PARA CREAR UN LINK PARA LA TABLA PUBLICACIONES
			if ($tabla=="publicaciones")
				$strTablaDatos .= "<td align='center'><a href=\"index.php?tabla=publicaciones_detalle&campo=publicaciones_detalle.id_publicacion&valor=" . $resultado->$id_campo . "\" class='links2'>Ver</a></td>\n";			
			

			for($i=1;$i<=count($list_columnas);$i++){

				if($list_campos_nombre[(($i*3)-1) - 1] == "file"){
					$valor = $resultado->$list_campos_nombre[($i*3) - 1] ;
					$strTablaDatos .= "<td align='center' class='font8'>";
					
					//$strTablaDatos .= $valor;
					
					if(strlen($valor))
						$ruta_imagen="../galeria/".$conf_ruta_archivos."/".$valor;

					if (file_exists($ruta_imagen)){
						//OJO ARREGLAR ESTA OPCION PARA VALIDAR QUE TIPO DE ARCHIVO ES
						//DE LA TABLA
						$strTablaDatos .= "".$valor."";
					}
					else
						$strTablaDatos .= "<a href='../".$valor."' target='_blank'>".$valor."</a>";

					$strTablaDatos .= "</td>\n";
				}
				else{
					
					$valor = $resultado->$list_campos_nombre[($i*3) - 1] ;
					$strTablaDatos .= "<td class='font8'>&nbsp;$valor</td>";
				}
			}

			$strTablaDatos .= "</tr>\n";
			$cont ++;

		}


		$strTablaDatos .= "</table>";
		$strTablaDatos .= "</td>";
		$strTablaDatos .= "</tr>";
		$strTablaDatos .= "<tr class='title7'>";
		$strTablaDatos .= "<td colspan align='center'>".$paginador->getSelectAdmin('title7','title7')."</td>";
		$strTablaDatos .= "</tr>";
		$strTablaDatos .= "</table></div></div>";

	}
}
else{
	$strTablaDatos .= "<div class='title7'>No se encontraron resultados</div>";
}

$resultado->close();

//GUARDAMOS REGISTRO DE AUDITORIA
creaRegistroAuditoria("Consulta datos en ".$tabla);

//IMPRIME LOS DATOS
$return_value = "<?xml version='1.0' encoding='iso-8859-1'?><datos><resultados>".$strTablaDatos."</resultados></datos>";
header('Content-Type: text/xml');
echo $return_value;
?>