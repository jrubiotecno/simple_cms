<?php
error_reporting(0);
//ini_set("display_errors", true);
/**********************************************************************************
 INICIO DE LA APLICACION
 *********************************************************************************/
set_time_limit(0);

session_start();

extract($_GET);

extract($_POST);

ob_start();

require_once ("./utilidades/class_load_librerias.php");

require_once ("./utilidades/class_application.php");

$cargarLibrerias = new CargarLibrerias();

$cargarLibrerias -> DBConnect();

$appObj = new AppObj();

$appObj -> getParamGral();

$appObj -> checkPage();

$cargarLibrerias -> PHPInit();

if(!$appObj -> Ajax && !$appObj -> xml) {

	$cargarLibrerias -> HTMInit();

	if(!$appObj -> Lightbox)

		include ("./includes/header.php");

}

//DETERMINAMOS SI ES HOME
if(!$appObj -> modulo) {

	include_once ("includes/home.php");

} else {

	if($appObj -> modulo == "admin") {

		require_once ("./plugins/admin/class_admin.php");

		$admin = new admin();

		$admin -> parseAdmin();

	} else {
		
		if(!$appObj -> Ajax && !$appObj -> xml) {
			include_once ("includes/home.php");
		}
		else{
			$plug = $appObj -> modulo;				
			require_once ("./plugins/" . $plug . "/class_" . $plug . ".php");
			//INSTANCIAMOS LA CLASE SEGUN EL REQUEST
				
					@$plugin = new $plug();
				
					$plugin -> parsePublic();
		}	

	}

}

if(!$appObj -> Ajax && !$appObj -> xml) {

	if(!$appObj -> Lightbox)

		include ("./includes/footer.php");

	$cargarLibrerias -> HTMEnd();

}

ob_end_flush();

/*
 echo "<hr><hr>";
 foreach ($_POST as $post_var_name => $post_var)
 print "<br><font color=#000088>POST &nbsp;=></font>&nbsp;&nbsp;<u>$post_var_name</u>: $post_var";
 print "<br>";
 foreach ($_SESSION as $session_var_name => $session_var)
 print "<br><font color=#008800>SESSION &nbsp;=></font>&nbsp;&nbsp;<u>$session_var_name</u>: $session_var";
 */

?>