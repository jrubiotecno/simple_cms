<?php
/** * Adminsitraci�n de paginas para armar un menu de navegacion * @version 1.0 * El constructor de esta clase es {@link menu()} */
class registro extends ADOdb_Active_Record {
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
		switch($appObj->accion) {
			case "registro" :				$this -> registro();
				break;							case "rpm":				echo "a";				break;			}
	}	/**
 	* Funci�n para armar el menu de navegacion
 	*/
	function registro() {
		global $db, $id, $accion, $option, $option2, $appObj;		if(trim($_POST["nit"]) != "") {			//se valida si el usuario ya existe con ese nit			$sql_ = "SELECT hbpreg_id FROM hbp_registro WHERE hbpreg_nombreempresa='" . $_POST["nombreempresa"] . "'";						$rsUsuario = $db -> Execute($sql_);			if($rsUsuario -> RecordCount() > 0) {				echo "<script>alert('El usuario " . $_POST["nombreempresa"] . " ya existe');window.location.href='index.php?page=registro';</script>";			} else {				if($_POST["email"] != "") {					require_once ("./utilidades/phpmailer/class.phpmailer.php");					$mailTemp = new PHPMailer();					$mailTemp -> IsHTML(true);					$mailTemp -> IsSMTP();					$mailTemp -> Host = "mail.hbp.net.co";					$mailTemp -> SMTPAuth = true;					$mailTemp -> Username = "infoweb@hbp.net.co";					$mailTemp -> Password = "ytrewq12";					$mailTemp -> From = "infoweb@hbp.net.co";					$mailTemp -> FromName = "hbp.net.co";					$mailTemp -> Subject = $appObj -> paramGral["SUBJECT_REGISTRO"];					$mailBody = "Se ha realizado un nuevo registro de usuario en la pagina web: <br><br>";					$mailBody .= "Por favor revise la siguiente informaci&oacute;n: <br><br>";					$mailBody .= "NOMBRE: " . $_POST["nombrepers"] . "<br>";					$mailBody .= "APELLIDO: " . $_POST["apellidos"] . "<br>";					$mailBody .= "EMPRESA: " . $_POST["nombreempresa"] . "<br>";					$mailBody .= "NIT: " . $_POST["nit"] . "<br>";					$mailBody .= "NUMERO DE PERSONAS EN LA EMPRESA: " . $_POST["numpersonas"] . "<br>";					$mailBody .= "CARGO: " . $_POST["cargo"] . "<br>";					$mailBody .= "E-MAIL: " . $_POST["email"] . "<br>";					$mailBody .= "PAIS: " . $_POST["pais"] . "<br>";					$mailBody .= "CIUDAD: " . $_POST["ciudad"] . "<br>";					$mailBody .= "TELEFONO: " . $_POST["telefono"] . "<br>";					$mailBody .= "DIRECCION: " . $_POST["direccion"] . "<br><br>";					$mailBody .= "<i>Contactenos Pagina Web.</i>";					$mailTemp -> Body = $mailBody;					//HACEMOS EL ENVIO					$mailTemp -> AddAddress($appObj -> paramGral["EMAIL_REGISTRO"]);					if(!$mailTemp -> Send()) {						echo $mailTemp -> ErrorInfo;					} else {						$sqlInsert="INSERT INTO `hbp_registro` (						`hbpreg_id` ,						`hbpreg_nombreempresa` ,						`hbpreg_nit` ,						`hbpreg_nombrepers` ,						`hbpreg_apellidos` ,						`hbpreg_cargo` ,						`hbpreg_telefono` ,						`hbpreg_celular` ,						`hbpreg_email` ,						`hbpreg_direccion` ,						`hbpreg_pais` ,						`hbpreg_ciudad` ,						`hbpreg_numpersonas` ,						`hbpreg_fecha`						)						VALUES (						NULL ,						'" . $_POST["nombreempresa"] . "' ,						'" . $_POST["nit"] . "' ,						'" . $_POST["nombrepers"] . "' ,						'" . $_POST["apellidos"] . "' ,						'" . $_POST["cargo"] . "' ,						'" . $_POST["telefono"] . "' ,						'" . $_POST["celular"] . "' ,						'" . $_POST["email"] . "' ,						'" . $_POST["direccion"] . "' ,						'" . $_POST["pais"] . "' ,						'" . $_POST["ciudad"] . "' ,						'" . $_POST["numpersonas"] . "' ,						NOW()						);";												$db -> Execute($sqlInsert);						/*						$mailTemp = new PHPMailer();						$mailTemp -> IsHTML(true);							$mailTemp -> IsSMTP();							$mailTemp -> Host = "mail.hbp.net.co";							$mailTemp -> SMTPAuth = true;							$mailTemp -> Username = "infoweb@hbp.net.co";							$mailTemp -> Password = "ytrewq12";							$mailTemp -> From = "infoweb@hbp.net.co";							$mailTemp -> FromName = "hbp.net.co";							$mailTemp -> Subject = $appObj -> paramGral["SUBJECT_REGISTRO_USR"];							$mailBody = "Estimad@ <strong>" . $_POST["nombrepers"] . "</strong><br /><br />Bienvenido a Human Business Partner.<br /> Tu usuario registrado es <strong>" . $_POST["nombreempresa"] . "</strong><br>Tu Password es <strong>" . $_POST["nit"] . "</strong><br><br>";						$mailBody .= "<i>Cordialmente,<br />  <a style='text-decoration:none; color:#007AAE; font-weight:bold;' href=\"http://www.hbp.net.co/\">HBP</a>.</i><br /><br />";						$mailBody .= "<a style='text-decoration:none; color:#007AAE; font-weight:bold;' href=\"http://www.hbp.net.co/\">http://www.hbp.net.co/</a><br />";						$mailTemp -> Body = $mailBody;							//HACEMOS EL ENVIO						$mailTemp -> AddAddress($_POST["email"]);							if(!$mailTemp -> Send()) {							echo $mailTemp -> ErrorInfo;						}*/						echo "<script>alert('Gracias, su registro ha sido realizado satisfactoriamente, en breve nos comunicaremos con usted.');window.location.href='index.php?page=registro';</script>";												//echo "<span style='color:red;font-weight:bold'>Gracias, su registro ha sido realizado satisfactoriamente, en breve nos comunicaremos con usted.</span>";					}					$mailTemp -> ClearAddresses();				}			}		}
		require_once ("./plugins/registro/templates/registro.php");
	}}
?>