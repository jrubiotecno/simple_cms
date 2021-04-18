<?php


/**
 * Adminsitraci�n de paginas para armar un menu de navegacion
 * @version 1.0
 * El constructor de esta clase es {@link menu()}
 */


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


	}

	/**


 	* Funci�n para seleccionar opciones de la parte publica


 	*/


	function parsePublic() {


		global $db, $id, $accion, $option, $option2, $appObj;


		$id = $appObj -> id;


		switch($appObj->accion) {


			case "contactenos" :
				$this -> viewContactenos();


				break;
		}


	}

	/**


 	* Funci�n para armar el menu de navegacion


 	*/


	function viewContactenos() {


		global $db, $id, $accion, $option, $option2, $appObj;

		if($_POST["email"] != "") {

			require_once ("./utilidades/phpmailer/class.phpmailer.php");

			$mailTemp = new PHPMailer();

			$mailTemp -> IsHTML(true);

			$mailTemp -> IsSMTP();

			$mailTemp -> Host = "mail.hbp.net.co";

			$mailTemp -> SMTPAuth = true;

			$mailTemp -> Username = "infoweb@hbp.net.co";

			$mailTemp -> Password = "ytrewq12";

			$mailTemp -> From = "infoweb@hbp.net.co";

			$mailTemp -> FromName = "hbp.net.co";

			$mailTemp -> Subject = $appObj -> paramGral["SUBJECT_CONTACTENOS"];

			$mailBody = "Se ha enviado un contactenos desde la pagina web: <br><br>";

			$mailBody .= "Por favor revise la siguiente informaci&oacute;n: <br><br>";

			$mailBody .= "NOMBRE: " . $_POST["nombre"] . "<br>";
			$mailBody .= "APELLIDO: " . $_POST["apellido"] . "<br>";
			$mailBody .= "EMPRESA: " . $_POST["empresa"] . "<br>";
			$mailBody .= "NIT: " . $_POST["nit"] . "<br>";
			$mailBody .= "NUMERO DE PERSONAS EN LA EMPRESA: " . $_POST["numpersonas"] . "<br>";
			$mailBody .= "CARGO: " . $_POST["cargo"] . "<br>";
			$mailBody .= "E-MAIL: " . $_POST["email"] . "<br>";
			$mailBody .= "PAIS: " . $_POST["pais"] . "<br>";
			$mailBody .= "CIUDAD: " . $_POST["ciudad"] . "<br>";
			$mailBody .= "TELEFONO: " . $_POST["telefono"] . "<br>";
			$mailBody .= "COMENTARIOS:  <br><br>";
			$mailBody .= $_POST["message"] . "<br><br>";

			$mailBody .= "<i>Contactenos Pagina Web.</i>";

			$mailTemp -> Body = $mailBody;

			//HACEMOS EL ENVIO
			$mailTemp -> AddAddress($appObj -> paramGral["EMAIL_CONTACTENOS"]);
		
			if(!$mailTemp -> Send()) {
				echo $mailTemp -> ErrorInfo;
			} else {

				$db -> Execute("INSERT INTO `hbp_contacto` (
							`hbpcon_id` ,
							`hbpcon_nombre` ,
							`hbpcon_apellido` ,
							`hbpcon_empresa` ,
							`hbpcon_nit` ,
							`hbpcon_numpersonas` ,
							`hbpcon_cargo` ,
							`hbpcon_email` ,
							`hbpcon_pais` ,
							`hbpcon_ciudad` ,
							`hbpcon_telefono` ,
							`hbpcon_message` ,
							`hbpcon_fecha`
							)
							VALUES (
							NULL , 
							'" . $_POST["nombre"] . "' ,
							'" . $_POST["apellido"] . "' ,
							'" . $_POST["empresa"] . "' ,
							'" . $_POST["nit"] . "' ,
							'" . $_POST["numpersonas"] . "' ,
							'" . $_POST["cargo"] . "' ,
							'" . $_POST["email"] . "' ,
							'" . $_POST["pais"] . "' ,
							'" . $_POST["ciudad"] . "' ,
							'" . $_POST["telefono"] . "' ,
							'" . $_POST["message"] . "' ,
							NOW()
							);");

				echo "<span style='color:#3096C4;font-weight:bold'>Mensaje enviado exitosamente.</span>";
			}

			$mailTemp -> ClearAddresses();

		}

		include ("./plugins/contactenos/templates/contactenos.php");


	}

}


?>