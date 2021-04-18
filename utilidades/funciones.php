<?php
/*
ARCHIVO
        common.php

DESCRIPCION
    librer�a de recursos frecuentes

PARAMETERS
        globales
NOTAS
POR HACER

HISTORIA

   Autor                Fecha          Comentarios
  -------              ------          -------------
   C.Camargo        28/12/2002    Creaci�n
   M.Miechowicz    01/04/2003    Adici�n de funci�n isAccessible
   S.Trujillo           22/07/2003    Adici�n de las funciones Date_Format, Currency_Format y Date_To_Week
   S.Trujillo           23/07/2003    Adici�n de las funciones Sumar_Dias y JS_Message
   S.Trujillo           08/08/2003    Adici�n de la funci�nes Get_Razon_Social y Get_Tipo_Proveedorl
   A.Bravo				30/05/2006	  Adicion de la funcion redimensionar_img
*/

/**
 * Funci�n para generar ID del formulario
 */
function genFormID() {
 $length=20;

      $array=array();

      $Pool = "1234567890";

      $Pool .= "abcdefghijklmnopqrstuvwxyz";

      for($i = 0; $i < $length; $i++){

            $sid.= substr($Pool, ((rand()*time())%(strlen($Pool))), 1);

      }
      return $sid;
}


function formatear_numero($p_numero)
{
        return Currency_Format($p_numero); // Ver funci�n Currency_Format m�s abajo
}


//----------------------------------------
//       Funci�n Currency_Format
//----------------------------------------
// Descripci�n: Enmascara la cadena de la forma XXX'XXX.XXX,XX
//                                 Ejemplos:
//                                 100000000.1234 --> 100'000.000,12
//                                 10000.5 --> 10.000,50
//                                 1000000 --> 1'000.000
// Par�metros:
// * cadena: Cadena con s�lo n�meros
// * moneda: S�mbolo monetario a usar (opcional)
//----------------------------------------
function Currency_Format($cadena, $moneda = "\$")
{
   list($cantidad, $centavos) = explode(".", $cadena);
   if($cantidad[0] == "-")
   {
      $signo = "-";
      $cantidad = substr($cantidad, 1);
   }
   else
      $signo = "";

   $length = strlen($cantidad);
   if(7 > $length && $length > 3)
       $out = substr($cantidad, 0, $length - 3).".".substr($cantidad, $length - 3, 3);
   elseif(10 > $length && $length > 6)
      $out = substr($cantidad, 0, $length - 6)."'".substr($cantidad, $length - 6, 3).".".substr($cantidad, $length - 3, 3);
   elseif($length > 9)
      $out = substr($cantidad, 0, $length - 9).".".substr($cantidad, $length - 9, 3)."'".substr($cantidad, $length - 6, 3).".".substr($cantidad, $length - 3, 3);
   else
      $out = $cantidad;
   if($centavos)
       $cents = substr($centavos, 0, 2) + 0;

   return "<nobr>$signo $moneda ".$out.($centavos?(($centavos < 10)?",0".$cents:",$cents"):"")."</nobr>";
}

function genPassword() {

	$clave="";
	$max_chars = round(rand(6,10));  // tendr� entre 7 y 10 caracteres
	$chars = array();
	for ($i='a'; $i<'z'; $i++)
		$chars[] = $i;  // creamos vector de letras

	$chars[] = 'z';

	for ($i=0; $i<$max_chars; $i++) {

	  if ($i<$max_chars-2) // es letra
		$clave .= $chars[round(rand(0, count($chars)-1))];
	  else // es numero
		$clave .= round(rand(0, 9));
	}
	return $clave;
}


function alertJS($msj="") {
/*********************************************************
/*Descripcion: Funcion que permite llamar un mensaje de alerta por javascript
/*Creada por: Andres Bravo
/**********************************************************/
	return "<script language=\"javascript\">function mensaje(){alert('".$msj."')} mensaje();</script>";
}

function funcionJS($funcionJS=""){
/*********************************************************
/*Descripcion: Funcion que permite llamar una funcion de javascript
/*Creada por: Andres Bravo
/**********************************************************/
	return "<script language=\"javascript\">". $funcionJS .";</script>";

}

function rm($dir) {
/*********************************************************
/*Descripcion: Funcion que permite borrar un directorio fisico en el servidor
/*Creada por: Andres Bravo
/**********************************************************/
   if(!$dh = @opendir($dir)) return;
   while (($obj = readdir($dh))) {
       if($obj=='.' || $obj=='..') continue;
       if (!@unlink($dir.'/'.$obj)) rm($dir.'/'.$obj);
   }
   $mode = 0777;
   @chmod($dir,$mode);
   @rmdir($dir);
}




function date_diff_old($date1, $date2)
{
 $s = strtotime($date2)-strtotime($date1);
 $d = intval($s/86400);
 $s -= $d*86400;
 $h = intval($s/3600);
 $s -= $h*3600;
 $m = intval($s/60);
 $s -= $m*60;
 return array("d"=>$d,"h"=>$h,"m"=>$m,"s"=>$s);
}


function diferencia_fechas($fechaIni,$fechaFin){
/*********************************************************
/*Descripcion: Funcion que trae la diferencia en dias entre 2 fechas
/*Creada por: Andres Bravo
/*Fecha: 11 Julio 2006
/*********************************************************/
	$timestamp1 = mktime(0,0,0,date("m",strtotime($fechaIni)),date("d",strtotime($fechaIni)),date("Y",strtotime($fechaIni)));
	$timestamp2 = mktime(0,0,0,date("m",strtotime($fechaFin)),date("d",strtotime($fechaFin)),date("Y",strtotime($fechaFin)));

	//resto a una fecha la otra
	$segundos_diferencia = $timestamp1 - $timestamp2;

	//convierto segundos en d�as
	$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

	//obtengo el valor absoulto de los d�as (quito el posible signo negativo)
	$dias_diferencia = abs($dias_diferencia);

	//quito los decimales a los d�as de diferencia
	$dias_diferencia = ceil($dias_diferencia);

	return $dias_diferencia;
}

function restar_dias_fecha($fecha,$dias){
/*********************************************************
/*Descripcion: Funcion que resta dias a una fecha
/*Creada por: Andres Bravo
/*Fecha: 11 Julio 2006
/*********************************************************/
	$nuevaFecha = date("Y-m-d", mktime (0,0,0,date("m",strtotime($fecha)),date("d",strtotime($fecha))-$dias,date("Y",strtotime($fecha))));
	return $nuevaFecha;
}

function sumar_dias_fecha($fecha,$dias){
/*********************************************************
/*Descripcion: Funcion que suma dias a una fecha
/*Creada por: Andres Bravo
/*Fecha: 11 Julio 2006
/*********************************************************/
	$nuevaFecha = date("Y-m-d", mktime (0,0,0,date("m",strtotime($fecha)),date("d",strtotime($fecha))+$dias,date("Y",strtotime($fecha))));
	return $nuevaFecha;
}

function fecha_inicio_fin_de_semana($fecha){
/*********************************************************
/*Descripcion: Funcion que determina cuando inicial el fin de semana
/*segun la fecha del parametro
/*Creada por: Andres Bravo
/*Fecha: 11 Julio 2006
/*********************************************************/

	$dia = date("w",strtotime($fecha));


	if ($dia==0)//ES DOMINGO
		$dias = -2;
	else if ($dia==1)//ES LUNES
		$dias = 4;
	else if ($dia==2)//ES MARTES
		$dias = 3;
	else if ($dia==3)//ES MIERCOLES
		$dias = 2;
	else if ($dia==4)//ES JUEVES
		$dias = 1;
	else if ($dia==5)//ES VIERNES
		$dias = 0;
	else if ($dia==6)//ES SABADO
		$dias = -1;

	$finDeSemana = sumar_dias_fecha($fecha,$dias);

	return $finDeSemana;
}

function CambiarCaracteres($varTexto)
/*********************************************************
/*Descripcion: Funcion que cambia caracteres especiales a caracteres HTML
/*Creada por: Andres Bravo
/*Fecha: 11 Julio 2006
/*********************************************************/
{
	$varTextoFinal = str_replace("&","&#38;",$varTexto);

	$varTextoFinal = str_replace("�","&#225;",$varTextoFinal);
	$varTextoFinal = str_replace("�","&#233;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#237;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#243;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#250;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#241;",$varTextoFinal);

    $varTextoFinal = str_replace("�","&#193;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#201;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#205;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#211;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#218;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#209;",$varTextoFinal);

    $varTextoFinal = str_replace("�","&#191;",$varTextoFinal);
    $varTextoFinal = str_replace("\"","&#34;",$varTextoFinal);
    $varTextoFinal = str_replace("'","&#39;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#8221;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#8220;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#8216;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#8217;",$varTextoFinal);

    $varTextoFinal = str_replace("�","&#196;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#203;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#207;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#214;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#220;",$varTextoFinal);

    $varTextoFinal = str_replace("�","&#228;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#235;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#239;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#246;",$varTextoFinal);
    $varTextoFinal = str_replace("�","&#252;",$varTextoFinal);

	$varTextoFinal = str_replace("�","&#8230;",$varTextoFinal);
	$varTextoFinal = str_replace("�","&#176;",$varTextoFinal);

	return $varTextoFinal;
}

function creaRegistroAuditoria($accion){

	global $db;

	$strSQL = "INSERT INTO admin_auditoria (fecha,usuario,accion) VALUES (now(),'".$_SESSION['s_usuario']."','".$accion."') ";
	$db->query($strSQL);

}




//TRAE LAS DIFERENCIAS DE 2 HORAS
function dif($h1,$h2){
	$h=((strtotime($h1)-strtotime($h2)))/3600;
	$m=intval((($h)-intval($h))*60);
	$s=intval((((($h)-intval($h))*60)-$m)*60);
	return (intval($h)<10?'0'.intval($h):intval($h)).':'.($m<10?'0'.$m:$m).':'.($s<10?'0'.$s:$s);
}

//CREA LA SESSION DEL SQL EJECUTADO PARA LOS PROCESOS CON AJAX
function creaSessionSQL($SQL="", $esProcesoAjax=false){

	$_SESSION['SQLSession']="";
	if (($_SESSION['SQLSessionAux'] && $SQL==$_SESSION['SQLSessionAux']) || $esProcesoAjax)
		if ($SQL!=$_SESSION['SQLSessionAux'])
			$_SESSION['SQLSession'] = $SQL;
		else
			$_SESSION['SQLSession'] = $_SESSION['SQLSessionAux'];
	else{
		$_SESSION['SQLSession'] = $SQL;
		$_SESSION['SQLSessionAux'] = $SQL;
	}
	//echo "&nbsp;";
	return $_SESSION['SQLSession'];
}

//CREA UN ARREGLO DE DIAS PARA SELECT DE CALENDARIO
function arrDias($diaInicial=1, $diaFinal=31, $option=""){

	$arrD = Array();
	for ($i=$diaInicial;$i<=$diaFinal;$i++){
		$arrD[$i]=$i;
	}

	return $arrD;
}

function strptime__($date, $format) {
    $masks = array(
      '%d' => '(?P<d>[0-9]{2})',
      '%m' => '(?P<m>[0-9]{2})',
      '%Y' => '(?P<Y>[0-9]{4})',
      '%H' => '(?P<H>[0-9]{2})',
      '%M' => '(?P<M>[0-9]{2})',
      '%S' => '(?P<S>[0-9]{2})',
     // usw..
    );

    $rexep = "#".strtr(preg_quote($format), $masks)."#";
    if(!preg_match($rexep, $date, $out))
      return false;

    $ret = array(
      "tm_sec"  => (int) $out['S'],
      "tm_min"  => (int) $out['M'],
      "tm_hour" => (int) $out['H'],
      "tm_mday" => (int) $out['d'],
      "tm_mon"  => $out['m']?$out['m']-1:0,
      "tm_year" => $out['Y'] > 1900 ? $out['Y'] - 1900 : 0,
    );
    return $ret;
  } 

function dateadd($date, $dd=0, $mm=0, $yy=0, $hh=0, $mn=0, $ss=0,$formatoResp=0){
$fechaSelAux = new DateTime($date);
$date  = $fechaSelAux->format('m/d/Y H:i:s');

$date_r = getdate(strtotime($date));
$date_result = date("m/d/Y H:i:s", mktime(($date_r["hours"]+$hh),($date_r["minutes"]+$mn),($date_r["seconds"]+$ss),($date_r["mon"]+$mm),($date_r["mday"]+$dd),($date_r["year"]+$yy)));

if($formatoResp==1){
$fechaSelAux = new DateTime($date_result);
$date_result = $fechaSelAux->format('Y-m-d');

}

if($formatoResp==2){
$fechaSelAux = new DateTime($date_result);
$date_result = $fechaSelAux->format('Y-m-d H:i:s');
}

if($formatoResp==3){
$fechaSelAux = new DateTime($date_result);
$date_result = $fechaSelAux->format('m/d/Y H:00:00');
}

if($formatoResp==4){
$fechaSelAux = new DateTime($date_result);
$date_result = $fechaSelAux->format('m/d/Y H:46:00');
}

return $date_result;

}

//CREA UN ARREGLO DE HORAS PARA SELECT DE CALENDARIO
function arrHoras($horInicial=0, $horFinal=23, $option=""){
	$arrM = Array();
	for ($i=$horInicial;$i<=$horFinal;$i++){
		$hora = $i;
		if($i<10) $hora = "0".$i;
		$arrM[$hora]=$hora;
	}

	return $arrM;
}

//CREA UN ARREGLO DE MINUTOS PARA SELECT DE CALENDARIO
function arrMinut($Inicial=0, $Final=60, $option=""){
	$arrM = Array();
	for ($i=$Inicial;$i<=$Final;$i++){
		$hora = $i;
		if($i<10) $hora = "0".$i;
		$arrM[$hora]=$hora;
	}

	return $arrM;
}

//CREA UN ARREGLO DE DIAS PARA SELECT DE CALENDARIO
function arrMeses($mesInicial=1, $mesFinal=12, $option=""){

	$arrM = Array();
	for ($i=$mesInicial;$i<=$mesFinal;$i++){
		$arrM[$i]=$i;
	}

	return $arrM;
}

//CREA UN ARREGLO DE DIAS PARA SELECT DE CALENDARIO
function arrAnios($anioInicial=1, $anioFinal=12, $option=""){

	$arrA = Array();
	for ($i=$anioInicial;$i<=$anioFinal;$i++){
		$arrA[$i]=$i;
	}

	return $arrA;
}

/**FUNCION PARA ORDERNA EL ARREGLO POR UN CAMPO**/
 function orderMultiDimensionalArray ($toOrderArray, $field, $inverse = false) {  
     $position = array();  
     $newRow = array();  
     foreach ($toOrderArray as $key => $row) {  
             $position[$key]  = $row[$field];  
             $newRow[$key] = $row;  
     }  
     if ($inverse) {  
         arsort($position);  
     }  
     else {  
         asort($position);  
     }  
     $returnArray = array();  
     foreach ($position as $key => $pos) {       
         $returnArray[] = $newRow[$key];  
     }  
     return $returnArray;  
 } 


?>