<?php
session_start();

header("Content-type: application/vnd.ms-excel" );
header("Content-Disposition: attachment; filename=reporte.xls");

$datosImprimir = $_POST['accion'];
$nombreReporte = $_POST['option'];

//MODIFICAMOS TEXTOS EN MAYUSCULAS
$datosImprimir = str_replace("TABLE","table",$datosImprimir);
$datosImprimir = str_replace("TBODY","tbody",$datosImprimir);
$datosImprimir = str_replace("<TR","<tr",$datosImprimir);
$datosImprimir = str_replace("TR>","tr>",$datosImprimir);
$datosImprimir = str_replace("TD","td",$datosImprimir);


$datosImprimir = str_replace("<A","<a",$datosImprimir);
$datosImprimir = str_replace("A>","a>",$datosImprimir);
$datosImprimir = str_replace("<a","<!--<a",$datosImprimir);
$datosImprimir = str_replace("/a>","/a>!-->",$datosImprimir);
$datosImprimir = str_replace("<?","<!--<?",$datosImprimir);
$datosImprimir = str_replace("?>","?>!-->",$datosImprimir);
$datosImprimir = str_replace("\\","",$datosImprimir);


$strDatosReporte .= "<table border=\"1\" bgcolor=\"#FFFFFF\" bordercolor=\"#000000\">";

$strDatosReporte .= "<tr><td>";
$strDatosReporte .= "<b>".$nombreReporte."</b>";
$strDatosReporte .= "</td></tr>";

$strDatosReporte .= "<tr><td>";
$strDatosReporte .= "<b>User: </b>".$_SESSION['s_nombre_usuario'];
$strDatosReporte .= "</td></tr>";

$strDatosReporte .= "<tr><td>";
$strDatosReporte .= "<b>Date report: </b>".date("Y-m-d");
$strDatosReporte .= "</td></tr>";

$strDatosReporte .= "<tr><td>";
$strDatosReporte .= "&nbsp";
$strDatosReporte .= "</td></tr>";

$strDatosReporte .= "<tr><td>";
$strDatosReporte .= $datosImprimir;
$strDatosReporte .= "</td></tr></table>";

echo $strDatosReporte;

?>
