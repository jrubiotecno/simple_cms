<?php
/**
* Clase que permite generar un data grid de un objeto enviado por parametros
* @author Andres Bravo
* @email andres.bravo@indexcol.com
* @version 1.0
* El constructor de esta clase es {@link DataGrid()}
*/
class DataGrid{

  
	var $Database;
	var $obj;
	var $table;
	
	var $titleList;
	var $classTitleList = "titlecolumns_admin";
	var $titleProcess;	
	var $classTitleProcess = "titleProcess";	
	var $noData = "No hay datos para mostrar.";
	
	var $classTableGrid = "";
	var $idDataGrid = "resultDataGrid";

	var $optionsHeader = true;
	var $arrOptionsHeader = array();
	var $posOptionsHeader = "left";
	var $classOptionsHeader = "titleOptionsHeader_admin";

	var $optionsFooter = true;
	var $arrOptionsFooter = array();
	var $posOptionsFooter = "right";
	var $classOptionsFooter = "titleOptionsHeader_admin";

	var $arrTitlesHeader = array();
	var $arrColumnHide = array();
	var $totalColumnas = 0;
	var $classTitlesHeader = "titlesheader_admin";
	
	var $heightDG = "100%";
	var $classTdRegisterData = "tdRegisterData";
	var $classTrRegisterData = "trRegisterData";

	var $page = 1;
	var $totalRegPag = 20;
	var $posPaginador = "center";
	var $classPaginadorName = "tdRegisterData";
	var $classPaginadorLink = "tdRegisterData";
	var $paramMensajePaginador = "Cargando...";
	var $paramModuloPaginador = "";
	var $paramModulo1Paginador = "";
	var $paramAccionPaginador = "";
	var $paramIdPaginador = "";
	var $paramOptionPaginador = "";
	var $paramOption2Paginador = "";	
	var $paginadorHeader = true;
	var $paginadorFooter = false;	
	
	var $arrAltBgcolor = array();

	var $arrEventRegister = array();	

	var $arrColLink = array();	
	
	var $arrOperCol = array();
	var $arrColSum = array();
	
	var $arrAddFieldTwoValues = array();

	var $SQL;
	var $ORDER_BY;
	var $ORDER_DIR = "ASC";
	var $WHERE;

  	
  	/**
	  * Constructor de la Clase
	  */
  	function DataGrid($objParam) {  		
  		
  		global $db,$id,$accion,$option,$option2;
  		
  		$this->obj = $objParam;	  		
  		  	
  	} 	

  	/**
	  * Funcion que permite generar el data grid del objeto
	  */
  	function displayDataGrid() {

		//TRAEMOS EL TOTAL DE COLUMNAS PARA QUE EL PAGINADOR ESTE CENTRADO
		$this->totalColumnas = $this->getTotalColumnas();
  		
  		//DETERMINAMOS SI SE LA GRID TIENE PAGINADOR PARA INCLUIR LA CLASE NECESARIA
  		if ($this->paginadorHeader || $this->paginadorFooter){
  			
  			require_once("class_paginador.php"); 
  			$rs = $this->getListData();  			
  			$paginador = new Paginador($rs,$this->paramMensajePaginador,$this->paramModuloPaginador,$this->paramAccionPaginador,$this->paramIdPaginador,$this->paramOptionPaginador,$this->paramOption2Paginador,$this->paramModulo1Paginador);  			
  			
  		}
  			
  	
  		//TABLA PARA MOSTRAR EL GRID GENERADO
  		if (!$_POST["Ajax"])
  			$strDatos .= "<table id='tableDataGrid' width='100%' border='0'>";  		

 		
  		//FILA PARA EL TITULO DE LA TABLA
  		if ($this->titleList && !$_POST["Ajax"]){
  			$strDatos .= "<tr>";
  			$strDatos .= "<td class='".$this->classTitleList."'>";
  			$strDatos .= $this->titleList;
  			$strDatos .= "</td>";
  			$strDatos .= "</tr>";
  		}

  		 		
  		//FILA PARA LAS OPCIONES GENERALES EN EL ENCABEZADO DEL GRID
  		if ($this->optionsHeader && !$_POST["Ajax"]){
  			$strDatos .= "<tr>";
			$strDatos .= "<td align='".$this->posOptionsHeader."'>";
			$strDatos .= $this->getOptionsHeader();
			$strDatos .= "</td>";
  			$strDatos .= "</tr>";
  		}

		 		
  		//FILA PARA EL GRID TOTAL
  		if (!$_POST["Ajax"]){
  			$strDatos .= "<tr>";
			$strDatos .= "<td height='".$this->heightDG."' valign='top'>";
			$strDatos .= "<div id='".$this->idDataGrid."'>";
		}
		
		$strDatos .= "<table align='center' border='0' cellspacing='1' cellpadding='1' width='100%' >";

			//FILA PARA EL TITULO DE LA TABLA CUANDO HAY UN PROCESO
			if ($this->titleProcess){
				$strDatos .= "<tr>";
				$strDatos .= "<td class='".$this->classTitleProcess."' colspan='".$this->totalColumnas."' align='center'>";
				$strDatos .= $this->titleProcess;
				$strDatos .= "</td>";
				$strDatos .= "</tr>";
			}
			
			//FILA PARA EL PAGINADOR DEL GRID
			if ($this->paginadorHeader){				
				
				$strDatos .= "<tr>";
				$strDatos .= "<td align='".$this->posPaginador."' colspan='".$this->totalColumnas."'>";
				$strDatos .= $paginador->getPalabrasAdmin($this->classPaginadorName,$this->classPaginadorLink);
				$strDatos .= "</td>";
				$strDatos .= "</tr>";  		
			}

			
			//LLAMAMOS EL METODO QUE GENERA EL GRID
			$strDatos .= "<tr>";
			$strDatos .= "<td>";
			$strDatos .= "<div id='Cls' class='gridbox gridbox_dhx_skyblue'>";
			$strDatos .= "<div id='xdf' class='xhdr'>";
			$strDatos .= "<table align='center' border='0' cellspacing='1' cellpadding='1' width='100%' class='hdr'>";
			$strDatos .= $this->getDataGrid();
			$strDatos .= "</table>";
			$strDatos .= "</div>";
			$strDatos .= "</div>";
			$strDatos .= "</td>";
			$strDatos .= "</tr>";
			

			//FILA PARA EL PAGINADOR DEL GRID
			if ($this->paginadorFooter){
				$strDatos .= "<tr>";
				$strDatos .= "<td align='".$this->posPaginador."' colspan='".$this->totalColumnas."'>";
				$strDatos .= $paginador->getSelect($this->classPaginadorName,$this->classPaginadorLink);
				$strDatos .= "</td>";
				$strDatos .= "</tr>";  		
			}		
		
		$strDatos .= "</table>";
		
		if (!$_POST["Ajax"]){
			$strDatos .= "</div>";
			$strDatos .= "</td>";
  			$strDatos .= "</tr>";
  		}

		
  		
  		//FILA PARA LAS OPCIONES GENERALES EN EL PIE DEL GRID
  		
  		if ($this->optionsFooter && !$_POST["Ajax"]){
  			$strDatos .= "<tr>";
			$strDatos .= "<td align='".$this->posOptionsFooter."'>";
			$strDatos .= $this->getOptionsFooter();
			$strDatos .= "</td>";
  			$strDatos .= "</tr>";
  		}
  		
  		if (!$_POST["Ajax"])
  			$strDatos .= "</table>";
  		
  		echo $strDatos;
  	}

  	/**
 	 * Funci�n para obtener las opciones del header para la tabla administrada 	 
 	 */
 	function getOptionsHeader() {
   		
   		global $db,$LANG;
   		
   		$strOptionsHeader = "<table id='optionsHeader'>";
   		   		
   		$optionsHeader = "";   		
   		
   		//TRAEMOS LAS OPCIONES QUE LLEGARON EN EL ARREGLO
   		if (is_array($this->arrOptionsHeader)){
   			
   			foreach($this->arrOptionsHeader as $arrOptions){
   				foreach($arrOptions as $label => $link){
   					if ($link=="noLink")
   						$optionsHeader .= $label;
   					else
						$optionsHeader .= "<a href='".$link."' class='".$this->classOptionsHeader."'> ".$label."</a>&nbsp;";   									
				}
   			}
   		}
   		
   		$strOptionsHeader .= "<tr>";	
   		$strOptionsHeader .= "<td class='".$this->classOptionsHeader."'>";	
   		$strOptionsHeader .= $optionsHeader;
   		$strOptionsHeader .= "</td>";	
   		$strOptionsHeader .= "</tr>";	
   		$strOptionsHeader .= "</table>";	
   
   		return $strOptionsHeader;
  	}

 	/**
 	 * Funci�n para crear las opciones adicionales a la tabla
 	 */
 	function addOptionsHeader($label,$link) {
 	
 		$this->arrOptionsHeader[] = array($label=>$link);
 		
			
	}

 	/**
 	 * Funci�n para crear las opciones adicionales a la tabla
 	 */
 	function addOptionsFooter($label,$link) {
 	
 		$this->arrOptionsFooter[] = array($label=>$link);
 		
			
	}

  	/**
 	 * Funci�n para obtener las opciones del footer para la tabla administrada 	 
 	 */
 	function getOptionsFooter() {
   		
   		global $db,$LANG;
   		
   		$strOptionsFooter = "<table id='optionsFooter'>";
   	   		
   		$optionsFooter = "";   		
   		
   		//TRAEMOS LAS OPCIONES QUE LLEGARON EN EL ARREGLO
   		if (is_array($this->arrOptionsFooter)){   			
   			foreach($this->arrOptionsFooter as $arrOptions){
   				foreach($arrOptions as $label => $link){
   					if ($link=="noLink")
   						$optionsFooter .= $label;
   					else
						$optionsFooter .= "<a href='".$link."' class='".$this->classOptionsHeader."'> ".$label."</a>&nbsp;";   									
				}
			}
   		}
   		
   		$strOptionsFooter .= "<tr>";	
   		$strOptionsFooter .= "<td class='".$this->classOptionsFooter."'>";	
   		$strOptionsFooter .= $optionsFooter;
   		$strOptionsFooter .= "</td>";	
   		$strOptionsFooter .= "</tr>";	
   		$strOptionsFooter .= "</table>";	
   
   		return $strOptionsFooter;
  	}

 	/**
 	 * Funci�n para crear las opciones adicionales a la tabla en la seccion footer
 	 */
 	function arrOptionsFooter($label,$link) {
 	
 		$this->arrOptionsFooter[] = array($label=>$link); 		
			
	}

 	/**
 	 * Funci�n para obtener el resultado de datos para el datagrid
 	 */
 	function getDataGrid() {
   		
   		global $db,$LANG;
   		
   		//SE IMPRIME LOS TITULOS DE LA TABLA
   		$strDataGrid .= "<tr>";
   		
   		
   		if (is_array($this->arrTitlesHeader) && count($this->arrTitlesHeader)>0){   			
			$strDataGrid .= $this->getTitlesHeader();   			
   		}

  		
   		$strDataGrid .= "</tr>";
   		
   		//SE RECORRE LA CONSULTA PARA LA GRID
   		if ($this->SQL){
   			
			$lista = $this->getListData();			

			//DETERMINAMOS SI HAY REGISTROS
			if ($lista->_numOfRows>0){
						
				//RECORREMOS LA CONSULTA
				while (!$lista->EOF){
					if($cls=="ev_dhx_skyblue"){
						$cls="odd_dhx_skyblue";
					}
					else{
						$cls="ev_dhx_skyblue";
					}

					$arrRegister = $lista->GetRowAssoc();

					/* PASAR ESTO A METODOS*/
					//$strBgcolor = $this->getBgColor();
					//$strEvents = $this->getEvents();
					if (count($this->arrAltBgcolor)>0){
						($indiceArrBgcolor==0)?$indiceArrBgcolor=1:$indiceArrBgcolor=0;
						$strBgcolor = " bgcolor='".$this->arrAltBgcolor[$indiceArrBgcolor]."'";	
					}

					if (count($this->arrEventRegister)>0){
						$strEvents = "";
						foreach($this->arrEventRegister as $arrEvents) {													
							foreach($arrEvents as $event => $func)							
								$strEvents .= $event ."='". $func . "'";						
						}

					}
					/*HASTA AQUI SE DEBE PASAR A METODOS*/


					$strDataGrid .= "<tr class='".$this->classTrRegisterData." datos ".$cls."' ".$strBgcolor." ".$strEvents.">";														

					//DETERMINAMOS SI HAY COLUMNAS ADICIONALES A LA IZQUIERDA DEL DATA GRID *** PASAR A METODO
					//$strDataGrid = $this->getColLeft();
					if (count($this->arrColLink)>0){
						foreach($this->arrColLink as $arr){				

							if ($arr[5]=="left"){

								$strLink = $arr[2];
								//ARMAMOS LAS VARIABLES PARA PASARLAS POR GET EN EL LINK
								$strVarGet = "";
								foreach($arr[3] as $var=>$value){

									$valor = $value;								
									if ($arrRegister[$value])
										$valor = $arrRegister[$value];

									$strVarGet .= $var . "=" . $valor."&";

								}

								$strLink .= "?".$strVarGet;

								$strDataGrid .= "<td class='".$this->classTdRegisterData."' align='left'>";
								$strDataGrid .= "<a href='".$strLink."' class='".$this->classTdRegisterData."' target='".$arr[4]."'>".$arr[1]."</a>";   									   	
								$strDataGrid .= "</td>";	
							}				
						}
					}


					foreach($lista->GetRowAssoc() as $name=>$fld) {							

						$nombreCampo = strtolower($name);

						//DETERMINAMOS SI EL CAMPOR ESTA EN arrColumnHide PARA NO MOSTRAR SU CONTENIDO
						if (!in_Array($nombreCampo,$this->arrColumnHide)){

							$strDataGrid .= "<td  class='".$this->classTdRegisterData."' align='left'>";			
							$strDataGrid .= $this->validateValueField($fld,$nombreCampo)."&nbsp;";			
							$strDataGrid .= "</td>";

							//DETERMINAMOS SI SE HAY COLUMNAS PARA OPERAR **** PASAR A METODO						
							if (count($this->arrOperCol)>0){							
								foreach($this->arrOperCol as $arr){								
									if (in_Array($nombreCampo,$arr)){
										$nombreCampoTotal = $nombreCampo."_total";
										$$nombreCampoTotal += $fld;
										$arrColSum[$nombreCampo."_total"] += $fld;
										echo $arrColSum[$nombreCampo."_total"];
										$nombreCampoSubtotal = $nombreCampo."_subtotal";									
										$$nombreCampoSubtotal += $fld;

									}
								}

							}

						}
					}	

					//DETERMINAMOS SI HAY COLUMNAS ADICIONALES A LA DERECHA DEL DATA GRID *** PASAR A METODO
					//$strDataGrid = $this->getColRight();
					if (count($this->arrColLink)>0){
						foreach($this->arrColLink as $arr){				

							if ($arr[5]=="right"){

								$strLink = $arr[2];
								
								if($strLink=="javascript"){
									
									foreach($arr[3] as $var=>$value){
		
											$valor = $value;
											if ($arrRegister[$value]){
												$valor = $arrRegister[$value];
												if($value!="HBPOR_ID")
													$tipo = $arrRegister[$value];
												else
													$idvalue = $arrRegister[$value];
											}
											else{
												$accion = $value;
											}
											
											//$strVarGet = $valor;
									}
									$strLink = "javascript:openModalDialogURL('../index.php?modulo=misordenes&accion=".$accion."&xml=true&processGet=true&prueba=".$idvalue."&tipo=".$tipo."','Detallado',780,500)";
										
								}
								else{
									//ARMAMOS LAS VARIABLES PARA PASARLAS POR GET EN EL LINK
									$strVarGet = "";
									if(count($arr[3])>0){
									
										foreach($arr[3] as $var=>$value){
		
											$valor = $value;
											if ($arrRegister[$value])
												$valor = $arrRegister[$value];
		
											$strVarGet .= $var . "=" . $valor."&";
										}
										$strLink .= "?".$strVarGet;
									}
								}
								

								$strDataGrid .= "<td class='".$this->classTdRegisterData."' align='left'>";
								$strDataGrid .= "<a href=\"".$strLink."\" class='".$this->classTdRegisterData."' target='".$arr[4]."'>".$arr[1]."</a>";   									   	
								$strDataGrid .= "</td>";	
							}				
						}
					}

					$strDataGrid .= "</tr>";					

					$lista->MoveNext();
				}			

				if (count($this->arrOperCol)>0){							
					echo $genero_subtotal."<hr>";
					echo $genero_total;
				}
			}
			else{
				$strDataGrid .= "<tr>";
				$strDataGrid .= "<td align='center' colspan='".$this->totalColumnas."' class='".$this->classPaginadorName."'>".$this->noData."</td>";
				$strDataGrid .= "</tr>";
			}
			
		}
   		
   		return $strDataGrid;
   		
   	}


	/**
 	 * Funci�n para obtener el listado de titulos para el grid
 	 */
 	function getTitlesHeader() {

		$strTitlesHeader = "";
		
		//DETERMINAMOS SI HAY COLUMNAS ADICIONALES A LA IZQUIERDA DEL DATA GRID
		if (count($this->arrColLink)>0){
			foreach($this->arrColLink as $arr){				
				if ($arr[5]=="left"){
					$strTitlesHeader .= "<td class='".$this->classTitlesHeader."' align='center'>";
					$strTitlesHeader .= $arr[0];   									   	
					$strTitlesHeader .= "</td>";	
				}				
			}
		}
		
		foreach($this->arrTitlesHeader as $name=>$value){
			
			//DETERMINAMOS SI EL LABEL ESTA EN arrColumnHide PARA NO MOSTRARLO
			if (!in_Array($value,$this->arrColumnHide)){
				$strTitlesHeader .= "<td class='".$this->classTitlesHeader."' align='center'>";
				$strTitlesHeader .= $value;   									   	
				$strTitlesHeader .= "</td>";
			}
		}
			
		//DETERMINAMOS SI HAY COLUMNAS ADICIONALES A LA DERECHA DEL DATA GRID	
		if (count($this->arrColLink)>0){
			foreach($this->arrColLink as $arr){				
				if ($arr[5]=="right"){
					$strTitlesHeader .= "<td class='".$this->classTitlesHeader."' align='center'>";
					$strTitlesHeader .= $arr[0];   									   	
					$strTitlesHeader .= "</td>";	
				}				
			}
		}		
		
   		return $strTitlesHeader;
   	}

 	/**
 	 * Funci�n para crear columnas de titulo del data grid
 	 */
 	function addTitlesHeader($arrTitles = array()) {
 	
 		if (is_array($arrTitles))
			$this->arrTitlesHeader = $arrTitles;
	}

 	/**
 	 * Funci�n para tomar las columas del data grid que no se van a mostrar
 	 */
 	function addColumnHide($arrHide = array()) {
 	
 		if (is_array($arrHide))
			$this->arrColumnHide = $arrHide;
	}
	

 	/**
 	 * Funci�n para obtener el listado de titulos para el grid
 	 */
 	function getListData() {

		global $db;
		
		if (!$this->page)
			$this->page = 1;
		
		$lista = $db->PageExecute($this->SQL,$this->totalRegPag,$this->page, false, 0);
		return $lista;
	
	}

 	/**
 	 * Funci�n para crear eventos al data grid
 	 */
	function addEventRegister($event="",$function=""){
	
		$this->arrEventRegister[] = array($event=>$function);			
				
	}


 	/**
 	 * Funci�n para crear columnas adicionales a la tabla de resultados del resultSet
 	 */
	function addColLink($title="",$label="",$link="",$arrVarsGet = array(),$target="_self",$pos="left"){
		
		if (!$target)
			$target = "_self";
			
		$this->arrColLink[] = array($title,$label,$link,$arrVarsGet,$target,$pos);			
				
	}

 	/**
 	 * Funci�n para crear operaciones a una columna ya se por paginacion, al final de la lista o las 2
 	 */
	function addOperCol($campo="",$operacion="SUM",$vista="ST",$estilo=""){
			
		$this->arrOperCol[] = array($campo,$operacion,$vista,$estilo);			
				
	}

 	/**
 	 * Funci�n para validar si el tipo de campo es de dos valores especificos
 	 */
	function addFieldTwoValues($field="",$arrValues = array(),$arrText = array()){
		
		
		$this->arrAddFieldTwoValues[] = array($field,$arrValues,$arrText);			
				
	}

 	/**
 	 * Funci�n para validar el contenido de un campo
 	 */
	function validateValueField($fld,$nombreCampo){
	
		$valueField = $fld;
		if (count($this->arrAddFieldTwoValues)>0){							
			foreach($this->arrAddFieldTwoValues as $arr){												
				if (in_Array($nombreCampo,$arr)){						
				
					$arrValues = $arr[1];
					$arrText = $arr[2];
					
					for ($j=0;$j<count($arrValues);$j++){						
						if ($fld==$arrValues[$j]){							
							$valueField = $arrText[$j];
						}
					}					
				}
			}
		}		

		return $valueField;
	}

 	/**
 	 * Funci�n para traer el total de columnas del datagrid
 	 */
	function getTotalColumnas(){
		
		$rs = $this->getListData();
		$totalColumnas = $rs->_numOfFields + count($this->arrColLink);							
		return $totalColumnas;
	}

}

?>