<?php
/**
class contactenos extends ADOdb_Active_Record {
	var $Database;
	var $ID;
	/**
 	* Funci�n para seleccionar opciones de administrador
 	*/
	function parseAdmin() {
		global $db, $id, $accion, $option, $option2;
		switch($accion) {
	}
 	* Funci�n para seleccionar opciones de la parte publica
 	*/
	function parsePublic() {
		global $db, $id, $accion, $option, $option2, $appObj;
		$id = $appObj -> id;
		switch($appObj->accion) {
			case "contactenos" :
				break;
	}
 	* Funci�n para armar el menu de navegacion
 	*/
	function viewContactenos() {
		global $db, $id, $accion, $option, $option2, $appObj;
		include ("./plugins/contactenos/templates/contactenos.php");
	}
?>