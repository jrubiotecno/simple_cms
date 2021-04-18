<?php
/**********************************************************************************
'Descripci�n: Archivo que controla la instancia de clases segun el plugin administrado
***********************************************************************************/
error_reporting(0);
require_once ("session.php");

$plug = $_REQUEST["modulo"];
require_once ("../plugins/".$plug ."/class_".$plug .".php");

//INSTANCIAMOS LA CLASE SEGUN EL REQUEST		
@$plugin = new $plug;
$plugin->parseAdmin();	

?>