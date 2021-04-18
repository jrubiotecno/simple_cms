<?php
/**********************************************************************************
'Descripción: Archivo que ejecuta el script de autocomplete
***********************************************************************************/

$_POST['Ajax']=true;

require_once("session.php");

$dbAux = new ADODB;

$valor = $_POST['value'];

$cadena = addslashes(strtolower(trim($valor)));

$strSQL = "SELECT (".$_GET['campo_select'].") as valor FROM ".$_GET['tabla'];

//CONDICION GENERAL PARA EL AUTOCOMPLETE
$strSQL .= " WHERE lower(".$_GET['campo_where'].") like '%".$cadena."%'";

//ADICIONAMOS LA CONDICION SI EXISTE
if ($_GET['where'])
	$strSQL .= $_GET['where'];


$dbAux->query($strSQL);

echo "<ul>";

while ($dbAux->next_row()){
	echo "<li>".$dbAux->$_GET['valor']."</li>";
}

echo "</ul>";

?>

