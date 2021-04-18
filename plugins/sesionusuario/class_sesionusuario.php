<?php
/** * Adminsitraci�n de paginas para armar un menu de navegacion * @version 1.0 * El constructor de esta clase es {@link menu()} */
class sesionusuario extends ADOdb_Active_Record {
	var $Database;
	var $ID;
	/**
 	* Funci�n para seleccionar opciones de administrador
 	*/
	function parseAdmin() {
		global $db, $id, $accion, $option, $option2;
		switch($accion) {		}
	}	/**
 	* Funci�n para seleccionar opciones de la parte publica
 	*/
	function parsePublic() {
		global $db, $id, $accion, $option, $option2, $appObj;
		$id = $appObj -> id;
		switch($appObj->accion) {						case "cerrar" :				$this->cerrarSesion();				header("Location: index.php");				break;								case "int" :				$this->int();				break;			}
	}			function cerrarSesion(){		//se desconecta el usuario		session_unset();		session_destroy();		//include ("./plugins/sesionusuario/templates/sesionusuario.php");	}
	function sesionuser() {
		global $db, $id, $accion, $option, $option2, $appObj;		//print_r($_SESSION);		$result="";		if($_POST[logUsuario] == "1") {			if(trim($_POST[user]) != "") {				//se valida si el usuario ya existe con ese nombre				$sql_ = "SELECT *				FROM hbp_registro				WHERE hbpreg_nombreempresa='" . mysql_real_escape_string($_POST[user]) . "'				AND hbpreg_nit='" . mysql_real_escape_string($_POST[pas]) . "'";								//echo $sql_;								$rsUsuario = $db -> Execute($sql_);				if($rsUsuario -> RecordCount() > 0) {					if(!$rsUsuario -> EOF) {						$_SESSION[hbpreg_nombreempresa] = $rsUsuario -> fields["hbpreg_nombreempresa"];							$_SESSION[userldid] = $rsUsuario -> fields["hbpreg_id"];						$_SESSION[username] = $rsUsuario -> fields["hbpreg_nombrepers"];						$_SESSION[correo] = $rsUsuario -> fields["hbpreg_email"];						$_SESSION[nit] = $rsUsuario -> fields["hbpreg_nit"];						$_SESSION[at] = $rsUsuario -> fields["hbpreg_id"];					}				} else {					$result="Usuario inv&aacute;lido !";				}			} else {				$result="Usuario inv&aacute;lido !";			}		}
		require_once ("./plugins/sesionusuario/templates/sesionusuario.php");
	}}
?>