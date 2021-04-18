<?php
/*** Adminsitraci�n de paginas para armar un menu de navegacion* @version 1.0* El constructor de esta clase es {@link menu()}*/
class menu extends ADOdb_Active_Record{


	var $Database;
  	var $ID;


  	/**
      * Funci�n para seleccionar opciones de administrador
      */
  	function parseAdmin() {

 		global $db,$id,$accion,$option,$option2;

		switch($accion){


 		}

  	}

  	/**
  	  * Funci�n para seleccionar opciones de la parte publica
  	  */
  	function parsePublic() {
		
		
 		global $db,$id,$accion,$option,$option2,$appObj;
		
		$id = $appObj->id;
		
		switch($appObj->accion){		
			
 			case "getMenu":
							$this->getMenu();
 							break;
 		}

  	}

  	/**
  	 * Funci�n para armar el menu de navegacion
  	 */
  	function getMenu() {
  		global $db,$id,$accion,$option,$option2,$appObj;
  		$_SESSION["itemsMenu"] = null;
  		$arrItemsPadre = $this->getItemsPadre("aplica_menu = 1 AND  oculto = -1 AND  id_pagina_padre = '0'");
  		$totalItemsPadre = count($arrItemsPadre);  		//RECORREMOS LA PRIMERA VEZ LOS ITEMS PADRE PARA GENERAR EL ARBOL GENEALOGICO EN UN ARRREGLO
  		for ($i=0;$i<$totalItemsPadre;$i++){
  			$page = $arrItemsPadre[$i]["alias"];  			//TRAEMOS LOS ITEMS HIJOS   			$this->crearArbol("app_paginas","alias","nombre","id_pagina_padre",$page," AND oculto=-1 AND aplica_menu=1 ","-"," ORDER BY orden");	    
  		}
		//RECORREMOS LA SEGUNDA VEZ LOS ITEMS PADRE PARA GENERAR EL MENU
  		for ($i=0;$i<$totalItemsPadre;$i++){
  			$page = $arrItemsPadre[$i]["alias"];
  			$nombre = $arrItemsPadre[$i]["nombre"];
  			$target = $arrItemsPadre[$i]["target"];
  			$ancho = $arrItemsPadre[$i]["ancho"];
  			$alto = $arrItemsPadre[$i]["alto"];
  			$linkExterno = $arrItemsPadre[$i]["link_externo"];
  			//$imagenMenu = $arrItemsPadre[$i]["imagen_menu"];  			//$imagenMenu = "";
			$urlLink = "index.php?".htmlentities("page=". $page);			
			//DETERMINAMOS SI HAY LINK EXTERNO
			if ($linkExterno)
				$urlLink = $linkExterno;	
			
			//DETERMINOS SI EL TARGET ES EN UN LIGHTBOX
			if ($target=="lightbox"){
				$urlLink = "javascript:verContenido('".$page."',".$ancho.",".$alto.")";	
				$target = "_self";
			}
			
			$textoLink = $nombre;
			//DETERMINAMOS SI HAY IMAGEN COMO LINK
			if ($imagenMenu)
				$textoLink = "<img src='./galeria/menu/".$imagenMenu."'  style='padding-top:8px;' border='0' alt='".$nombre."' />";
			if($_GET[page]==$page){					$class_menu="class=\"current_page_item\"";				}				else{					$class_menu="";				}							if($_GET[page]=="" and $page=="Inicio"){				$class_menu="class=\"current_page_item\"";			}							if($_GET[modulo]=="crearorden" || $_GET[modulo]=="misordenes" || $_GET[modulo]=="crearordenpr"){				$class_menu="";			}			
  			$strMenu .= "<li ".$class_menu."><a href=\"".$urlLink."\" target='".$target."'>".$textoLink."</a>\n";

  			if ($this->tieneHijos($page,$_SESSION["itemsMenu"]))
  				$strMenu .= "<ul>\n";
  			
			//GENERAMOS MENU HIJOS
			$strMenu .= $this->generarMenu($_SESSION["itemsMenu"],$page);  			

			if ($this->tieneHijos($page,$_SESSION["itemsMenu"]))
				$strMenu .= "</ul>\n";
  			
  			$strMenu .= "</a></li>\n";
  		
  		}
			
  		include("./plugins/menu/templates/menu.php");  		
  	
  	}
	
  	/**
  	 * Funci�n para generar el menu a partir de un arreglo
  	 */
  	function generarMenu($arrItemsMenu,$pagePadre) {
		
		if (count($arrItemsMenu)>0){

			foreach ($arrItemsMenu as $key=>$value){

				if ($pagePadre==$key){
					$arrSubItems = $value;
					foreach ($arrSubItems as $key=>$value){
						
						$arrDataItem = explode("|",$value);
						
						$alias = $arrDataItem[0];
						$nombre = $arrDataItem[1];
						$imagenMenu = $arrDataItem[2];
						$linkExterno = $arrDataItem[3];
						$target = $arrDataItem[4];					
						$ancho = $arrDataItem[5];					
						$alto = $arrDataItem[6];					
											
						$urlLink = "index.php?".htmlentities("page=". $alias);
						
						//DETERMINAMOS SI HAY LINK EXTERNO
						if ($linkExterno)
							$urlLink = $linkExterno;	
							
						//DETERMINOS SI EL TARGET ES EN UN LIGHTBOX
						if ($target=="lightbox"){
							$urlLink = "javascript:verContenido('".$alias."',".$ancho.",".$alto.");";	
							$target = "_self";
						}

						
						$textoLink = $nombre;
						//DETERMINAMOS SI HAY IMAGEN COMO LINK
						if ($imagenMenu)
							$textoLink = "<img src='./galeria/menu/".$imagenMenu."' />";

						if ($this->tieneHijos($arrDataItem[0],$arrItemsMenu)){				
							$strDatos .= "<li><a class='drop' href=\"".$urlLink."\" target='".$target."' title='".$nombre."'> <img src='./galeria/menu/bullet_punto.gif' border='0' alt='vi�eta' style='padding-bottom:2px'/>&nbsp;".$nombre." &#187;\n";
							$strDatos .= "<!--[if gte IE 7]><!--></a><!--<![endif]-->\n";
							$strDatos .= "<!--[if lte IE 6]><table><tr><td><![endif]-->\n";
							$strDatos .= "<ul>\n";						
							$strDatos .= $this->generarMenu($arrItemsMenu,$arrDataItem[0]);
							$strDatos .= "</ul>\n";
							$strDatos .= "<!--[if lte IE 6]></td></tr></table></a><![endif]-->\n";
							$strDatos .= "</li>\n";
						}
						else{						
							$strDatos .= "<li><a href=\"".$urlLink."\" target='".$target."' title='".$nombre."'> <img src='./galeria/menu/bullet_punto.gif' border='0' alt='vi�eta' style='padding-bottom:2px'/>&nbsp;".$textoLink."</a></li>\n";
						}

					}
				}
			}
		}
		
		return $strDatos;
		  		
  	}


  	/**
  	 * Funci�n para generar el menu a partir de un arreglo
  	 */
  	function generarCadenaHijos($arrItemsMenu,$pagePadre,$nombrePadre) {
		
		if (count($arrItemsMenu)>0){

			foreach ($arrItemsMenu as $key=>$value){

				if ($pagePadre==$key){
					$arrSubItems = $value;
					foreach ($arrSubItems as $key=>$value){										
						$arrDataItem = explode("|",$value);						
						$alias = $arrDataItem[0];					
						$nombre = $arrDataItem[1];						
						if ($this->tieneHijos($arrDataItem[0],$arrItemsMenu)){									
							$strDatos .= "$alias:$nombrePadre / $nombre#";
							$strDatos .= $this->generarCadenaHijos($arrItemsMenu,$arrDataItem[0],$nombrePadre." / ".$nombre);
						}
						else
							$strDatos .= "$alias:$nombrePadre / $nombre#";						
					}
				}
			}
		}
		
		return $strDatos;
		  		
  	}
  	
  	/**
  	 * Funci�n para determinar si un papa tiene hijos
  	 */
	function tieneHijos($idPapa,$arrItemsMenu){
		
		if (count($arrItemsMenu)>0){
        	foreach ($arrItemsMenu as $key=>$value){
			
				if ($key==$idPapa)
					return true;			
        	}        
        }
        
        return false;               
	}


	
  	/**
  	 * Funci�n para traer los items padre
  	 */
  	function getItemsPadre($where="1=1") {
  	
  		global $db,$id,$accion,$option,$option2,$appObj;
  	
  		//TRAEMOS LOS ITEMS PADRE
		$strSQL = "SELECT app_paginas.alias, app_paginas.nombre, app_paginas.imagen_menu, app_paginas.link_externo, app_paginas.target, app_paginas.ancho, app_paginas.alto FROM app_paginas WHERE ".$where." ORDER BY orden";
		$rsItems = $db->Execute($strSQL);
		$i=0;
		while (!$rsItems->EOF){
		
			$arrItemsPadre[$i]["alias"]=$rsItems->fields["alias"];
			$arrItemsPadre[$i]["nombre"]=$rsItems->fields["nombre"];
			$arrItemsPadre[$i]["imagen_menu"]=$rsItems->fields["imagen_menu"];
			$arrItemsPadre[$i]["link_externo"]=$rsItems->fields["link_externo"];
			$arrItemsPadre[$i]["target"]=$rsItems->fields["target"];
			$arrItemsPadre[$i]["ancho"]=$rsItems->fields["ancho"];
			$arrItemsPadre[$i]["alto"]=$rsItems->fields["alto"];
			$rsItems->MoveNext();
			$i++;
		}
		
		return $arrItemsPadre;
  	}

	function crearArbol($tabla,$id_field,$show_data,$link_field,$parent,$where,$prefix,$order_by=""){
	
		global $db;		
	
		//EL PROCESO NO SE PUDO HACER CON ADODB POR QUE PRESENTABA PROBLEMAS.
	
		//ARMAMOS LA CONSULTA
		$sql="SELECT * FROM ".$tabla." WHERE ".$link_field."='".$parent . "'" . $where . " " . $order_by;

		$rs=@mysqli_query($sql);
		if($rs){			   
			   while($arr=mysqli_fetch_array($rs)){					
				
					//GUARDAMOS LOS DATOS EN UN ARREGLO DE SESSION					
					$_SESSION["itemsMenu"][$arr["id_pagina_padre"]][]=$arr["alias"]."|".$arr["nombre"]."|".$arr["imagen_menu"]."|".$arr["link_externo"]."|".$arr["target"]."|".$arr["ancho"]."|".$arr["alto"];

					//LLAMAMOS LA FUNCION RECURSIVAMENTE
					$this->crearArbol($tabla,$id_field,$show_data,$link_field,$arr[$id_field],$where,$prefix.$prefix);
			   }
		}    
	}  


  	/**
  	 * Funci�n para mostrar el Contenidos por p�ginas
  	 */
  	function findSQL($strSQL, $order_by,$order_direction,$page = 1,$num_results = 20) {

		global $db,$dbAux,$id,$accion,$option,$option2;

		$db_class = $db;

		if(!$order_by) $order_by = "id_pagina";

		$strSQL = $strSQL ." ORDER BY $order_by $order_direction";

		$rsConsulta = $db_class->PageExecute($strSQL, $num_results, $page, false, 0);

		return $rsConsulta;
  	}


}

?>