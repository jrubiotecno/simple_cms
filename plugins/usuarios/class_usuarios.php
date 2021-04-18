<?php
/**
* Adminsitración de tabla de usuarios
* @author Andres Bravo
* @email andres.bravo@indexcol.com
* @version 1.0
* El constructor de esta clase es {@link usuarios()}
*/
class usuarios extends ADOdb_Active_Record{


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
			
		switch($appObj->accion){

 			case "login":
							$this->login();
 							break;
 			case "loginDo":
							$this->loginDo();
 							break;
 			case "recordarClaveDo":
							$this->recordarClaveDo();
 							break; 							
 			case "logout":
							$this->logout();
 							break; 
 		}
  	}

  	/**
  	 * Funciòn para recordar la clave
  	 */
  	function recordarClaveDo() {
  	
  		global $db,$id,$appObj,$LANG;

  		//INCLUIMOS ARCHIVOS NECESARIOS
  		require_once("./utilidades/class_hcemd5.php");
  		require_once("./utilidades/class_mailer.php");
  		
  		$parametro = utf8_decode($id);
  		$strSQL = "SELECT pass,email,nombres,apellidos FROM usuarios WHERE email='".$parametro."'";
  		$rs = $db->Execute($strSQL);
  		
  		if (!$rs->EOF){
  			
  			$nombres = $rs->fields["nombres"] . " " . $rs->fields["apellidos"];
  			$email = $rs->fields["email"];
  			$passEncrypted = $rs->fields["pass"];
  			$asunto = $LANG["asuntoRecordarClave"];
			$EncryptionKey = "IndexcolProductos";
			$hcemd5 = new Crypt_HCEMD5($EncryptionKey, '');
			$passDecrypt = $hcemd5->decodeMime($passEncrypted);
			
			$mailTemp = new PHPMailer();
			$mailTemp->IsHTML(true);
			$mailTemp->From = $appObj->paramCustom["FROM_EMAIL_CONTACT"];
			$mailTemp->FromName = $appObj->paramCustom["FROM_NAME_EMAIL_CONTACT"];
			$mailTemp->Subject = $asunto;
			$mailTemp->AddAddress($email,$nombres);
			$mailBody = "La clave de ingreso a la pagina " . $appObj->paramGral["P_TITULO_PAGINAS"]. " es: " . $passDecrypt;

			$mailTemp->Body = $mailBody;
			if(!$mailTemp->Send())
				$msj = "El operación no se pudo completar, por favor intente más tarde";
			else
				$msj = "La clave ha sido enviada a su correo electronico.";  			
  		}
  		else{
  			$msj = "El E-mail no se encuentra registrado.";
  		}
  		
  		echo $msj;
  		exit;
  	
  	}

  	/**
  	 * Funciòn para cerrar session de usuario
  	 */
  	function logout() {
  		
  		$_SESSION["logueo"] = null;
		$_SESSION["id_usuario"] = null;
		$_SESSION["usuario"] = null;
		$_SESSION["identificacion"] = null;		
		echo "<span id='logout'></span>";
		exit;
  	}

  	/**
  	 * Funciòn para ver hacer logueo del usuario
  	 */
  	function loginDo() {
  	
  		global $db,$id,$accion,$option,$option2;
  		
  		//INCLUIMOS ARCHIVOS NECESARIOS
  		require_once("./utilidades/class_hcemd5.php");
  		
  		$email = utf8_decode($_POST["id"]);
  		$clave = utf8_decode($_POST["option"]);
		
		$EncryptionKey = "IndexcolProductos";
		$hcemd5 = new Crypt_HCEMD5($EncryptionKey, '');
		$encrypted_password = $hcemd5->encodeMime($clave);
		
		$strSQL = "SELECT  usuarios.id_usuario, usuarios.nombres, usuarios.apellidos, usuarios.identificacion, usuarios.pass, usuarios.publicado FROM usuarios WHERE publicado=1 AND email='".$email."' AND pass='".$encrypted_password."'";		
		$rs = $db->Execute($strSQL);
		
		if (!$rs->EOF){
			$_SESSION["id_usuario"] = $rs->fields["id_usuario"];
			$_SESSION["usuario"] = $rs->fields["nombres"] . " " . $rs->fields["apellidos"];
			$_SESSION["identificacion"] = $rs->fields["identificacion"];			
			$_SESSION["logueo"] = true;
			echo "<span id='logueado' style='display:none'>true</span>";
			$msj = "El ingreso esta en proceso..";
		}
		else{
			$msj = "Su clave no se encuentra registradas.";
			echo "<span id='logueado' style='display:none'>false</span>";
		}
		
		
		include("./plugins/usuarios/templates/msjAlerta.php");
		exit;
  		
  	
  	}

  	/**
  	 * Funciòn para ver la caja de logueo
  	 */
  	function login() {
  	
  		global $db,$id,$accion,$option,$option2;
  		
  		if (!$_SESSION["id_usuario"])
  			include("./plugins/usuarios/templates/login.php");
  		else
  			include("./plugins/usuarios/templates/logueado.php");
  	
  	}


  	/**
  	 * Funciòn para ejecutar un sql paginado
  	 */
  	function findSQL($strSQL, $order_by,$order_direction,$page = 1,$num_results = 20) {

		global $db,$dbAux,$id,$accion,$option,$option2;

		$db_class = $db;

		if(!$order_by) $order_by = "id_usuario";

		$strSQL = $strSQL ." ORDER BY $order_by $order_direction";

		$rsConsulta = $db_class->PageExecute($strSQL, $num_results, $page, false, 0);

		return $rsConsulta;
  	}

	
}

?>