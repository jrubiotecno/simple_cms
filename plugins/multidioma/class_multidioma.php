<?php
/**
* Adminsitración de multidioma de la aplicacion
* @author Andres Bravo
* @email andres.bravo@indexcol.com
* @version 1.0
* El constructor de esta clase es {@link multidioma()}
*/
class multidioma {


	var $Database;
  	var $ID;


  	/**
      * Funciòn para seleccionar opciones de administrador
      */
  	function parseAdmin() {

 		global $db,$id,$accion,$option,$option2;

		switch($accion){

 			case "verListado":
							$this->listadoAdmin();
 							break;
 			case "editarTraduccion":
							$this->editarTraduccion();
 							break; 							
		}

  	}

  	/**
  	  * Funciòn para mostrar el formulario 
  	  */
  	function editarTraduccion() {
  		
  		global $db,$id,$accion,$option,$option2,$appObj,$msjProcesoRealizado;
  		
  		print_r($_REQUEST);
  	
  		include("../plugins/multidioma/templates/admin_editar_traducciones.php"); 
  	
	}
	
  	/**
  	  * Funciòn para mostrar el listado de traducciones en el administrador
  	  */
  	function listadoAdmin() {
  		
  		global $db,$id,$accion,$option,$option2,$appObj,$msjProcesoRealizado;
  	
  		include("../utilidades/class_dataGrid.php");
			
		//INSTANCIAMOS LA CLASE DATA GRID	
		$dataGrid = new DataGrid($this);	
		$dataGrid->idDataGrid = "resultDatos";
		$dataGrid->heightDG = "300"; 		

		//INSTANCIAMOS EL TITULO DEL ADMINISTRADOR
		$dataGrid->titleList="Listado de contenidos";			
		$dataGrid->classTitleList="titletable";

		//INSTANCIAMOS EL MENSAJE DE PROCESO REALIZADO
		$dataGrid->titleProcess = $msjProcesoRealizado;


		//CREAMOS UN COLOR QUE SE ALTERNA POR CADA REGISTRO
		$dataGrid->classTrRegisterData = null;
		$dataGrid->arrAltBgcolor = array("#ffffff","#CECECE");		


		//TRAEMOS EL LISTADO DE TABLAS QUE SE PUEDEN TRADUCIR
		$strSQL = "SELECT id_tabla, titulo FROM multidioma_tablas WHERE activa=1 ORDER BY tabla";			

		//CREAR OPCIONES DE ENCABEZADO EN EL DATA GRID
		$dataGrid->optionsHeader=true;				

		$c_select = new Select;
		$c_select->Select("tablaTraducir", "Seccion a traducir", $db, $strSQL, 0,$_REQUEST["tablaTraducir"] , "textfields", 0, "", "location.href='plugins.php?modulo=multidioma&accion=verListado&tablaTraducir='+this.value;", 0);
		$c_select->enableBlankOption();				
		$selectCode = $c_select->genCode();

		$dataGrid->addOptionsHeader("Seleccione una opcion para traduccion: " . $selectCode,"noLink");


		//DETERMINO SI HAY FILTRO SELECCIONADO
		if ($_REQUEST["tablaTraducir"]){
			
			$strSQL = "SELECT * FROM multidioma_tablas WHERE id_tabla='".$_REQUEST["tablaTraducir"]."' AND activa=1";			
			$rsTablas = $db->Execute($strSQL);			
			if (!$rsTablas->EOF){
						
				$idTabla = $rsTablas->fields["id_tabla"];
				$strTituloTabla = $rsTablas->fields["titulo"];
				$strTabla = $rsTablas->fields["tabla"];
				$strCampoId = $rsTablas->fields["campo_id"];
				$strCamposConsulta = $rsTablas->fields["campos_consulta"];
				$strOrdenPor = $rsTablas->fields["orden_por"];				
			}
			
			//ARMAMOS LA CONSULTA A EJECUTAR
			$strSQL = "SELECT ".$strCampoId."," . $strCamposConsulta . " FROM " . $strTabla . " ORDER BY " . $strOrdenPor;						
			$dataGrid->SQL = $strSQL;		
			
			//CAMPOS CONSULTA
			$arrCamposConsulta = split(",",$strCamposConsulta);

			//IMPRIMIMOS LOS ENCABEZADOS DE COLUMNAS DEL DATA GRID
			for ($i=0;$i<=count($arrCamposConsulta);$i++){
				if ($arrCamposConsulta[$i]!="")
					$arrTitulos[] = $arrCamposConsulta[$i];
			}
			
			$dataGrid->addTitlesHeader($arrTitulos);

			//OCULTAMOS COLUMNAS O CAMPOS DEL DATA GRID
			$dataGrid->addColumnHide(array($strCampoId));

			//CREAR UNA COLUMNA CON LINK PASANDO VARIABLES POR METODO GET		
			$arrVarGet1 = Array("id_tabla"=>$idTabla,"valor_id"=>strtoupper($strCampoId),"modulo"=>"multidioma","accion"=>"editarTraduccion");
			$dataGrid->addColLink("Traduccion","<center>Español</center>","plugins.php",$arrVarGet1,"","right"); 

			//CREAR LA PAGINACION
			$dataGrid->page = $_POST["pagina"];
			$dataGrid->totalRegPag = 40;
			$dataGrid->paginadorHeader = true;		
			$dataGrid->paramMensajePaginador = "Buscando...";
			$dataGrid->paramModuloPaginador = "plugins";
			$dataGrid->paramModulo1Paginador = "multidioma";
			$dataGrid->paramAccionPaginador = "verListado";
			$dataGrid->paramIdPaginador = "";
			$dataGrid->paramOptionPaginador = "";
			$dataGrid->paramOption2Paginador = "";							  		

			
			
		}
		else{
			
			//ARMAMOS UNA CONSULTA QUE NUNCA DEVOLVERA DATOS SOLO PARA PINTAR EL GRID
			$dataGrid->SQL = "SELECT nombre FROM multidioma_tablas WHERE tabla='multidioma'";
			$dataGrid->noData = "Por favor seleccione una tabla para traduccion.";
			$dataGrid->paginadorHeader = false;		
		}

		
  		include("../plugins/multidioma/templates/admin_listado_traducciones.php"); 
  		
  	}

  	/**
  	  * Funciòn para seleccionar opciones de la parte publica
  	  */
  	function parsePublic() {
		
		
 		global $db,$id,$accion,$option,$option2,$appObj;
		
		$id = $appObj->id;		

  	}
  	

  	/**
  	 * Funciòn para mostrar el Contenidos por pàginas
  	 */
  	function findSQL($strSQL, $order_by,$order_direction,$page = 1,$num_results = 20) {

		global $db,$dbAux,$id,$accion,$option,$option2;

		$db_class = $db;

		if(!$order_by) $order_by = "";

		$strSQL = $strSQL ." ORDER BY $order_by $order_direction";

		$rsConsulta = $db_class->PageExecute($strSQL, $num_results, $page, false, 0);

		return $rsConsulta;
  	}

}

?>