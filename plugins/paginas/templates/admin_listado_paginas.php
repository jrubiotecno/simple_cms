<?php

echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";

if (!$_POST["Ajax"]){
	echo "<tr>";
	echo "<td class=\"textos\" >";
	include("includes/general/encabezado.php");
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
	echo "<table width=\"98%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" align=\"center\">";
	echo "<tr>";
	echo "<td align=\"center\" valign=\"top\">";
}

$dataGrid->displayDataGrid();

if (!$_POST["Ajax"]){
	echo "</td>";
	echo "</tr>";
	echo "</table>";
	echo "</td>";
	echo "</tr>";
}

echo "</table>";

if (!$_POST["Ajax"])
	include ("includes/general/pie.php");

?>