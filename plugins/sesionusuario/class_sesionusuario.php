<?php
/**
class sesionusuario extends ADOdb_Active_Record {
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
	}
	function sesionuser() {
		global $db, $id, $accion, $option, $option2, $appObj;
		require_once ("./plugins/sesionusuario/templates/sesionusuario.php");
	}
?>