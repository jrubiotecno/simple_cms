<?php
/**
* Adminsitración de tabla de contenido
* @author Andres Bravo
* @email andres.bravo@indexcol.com
* @version 1.0
* El constructor de esta clase es {@link contenido()}
*/
class contenido extends ADOdb_Active_Record{


	var $Database;
  	var $ID;


  	/**
      * Funciòn para seleccionar opciones de administrador
      */
  	function parseAdmin() {

 		global $db,$id,$accion,$option,$option2;

		switch($accion){


 		}

  	}

  	/**
  	  * Funciòn para seleccionar opciones de la parte publica
  	  */
  	function parsePublic() {
		
		
 		global $db,$id,$accion,$option,$option2,$appObj;
		
		$id = $appObj->id;
		
		switch($appObj->accion){		
			
 			case "verContenido":
							$this->verContenido();
 							break;
 		}

  	}

  	/**
  	 * Funciòn para mostrar el contenido
  	 */
  	function verContenido() {
  	
  		global $db,$id,$accion,$option,$option2,$appObj;
  	
  		$loadReg = $this->load("id_contenido=".$id);
  		
  		//GENERAMOS EL PATH 		
  		$path = $appObj->getPathContent("/","miga_pan");
		
		if (!$appObj->Lightbox)
  			include("./plugins/contenido/templates/ver_contenido.php");
  		else
  			include("./plugins/contenido/templates/ver_contenido_ajax.php");
  	
  	}


  	/**
  	 * Funciòn para mostrar el Contenidos por pàginas
  	 */
  	function findSQL($strSQL, $order_by,$order_direction,$page = 1,$num_results = 20) {

		global $db,$dbAux,$id,$accion,$option,$option2;

		$db_class = $db;

		if(!$order_by) $order_by = "id_contenido";

		$strSQL = $strSQL ." ORDER BY $order_by $order_direction";

		$rsConsulta = $db_class->PageExecute($strSQL, $num_results, $page, false, 0);

		return $rsConsulta;
  	}


}

?>