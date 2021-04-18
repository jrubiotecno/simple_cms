<?php
header("Content-type: application/x-javascript");

//ARMAMOS EL ARREGLO PARA LOS LINKS INTERNOS

//CREAMOS LA VARIABLE PARA EL SCRIPT
$strJavascript = "var tinyMCELinkList = new Array(";
// Nombre, URL
$strJavascript .= "['Vacio1', 'prueba'],";
$strJavascript .= "['Vacio2', 'prueba'],";

$strJavascript = substr($strJavascript, 0, -1);
$strJavascript .= ");";

echo $strJavascript;
?>

