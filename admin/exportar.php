<?
session_start();
/**********************************************************************************

/**

'Descripci�n: Archivo que exporta los datos a excel

'Fecha de creaci�n: Diciembre 10 de 2003

'Ultima modificaci�n: Diciembre 10 de 2003

'@autor: Javier Neva.

'(c) 2003 Indexcol Ltda. jneva@indexcol.com 

**/

//**********************************************************************************



//**********************************************************************************

//HISTORIA

//

//         Autor	 	               Fecha  	   	    Cambios

//  ---------------------- 		    ------------   	  -----------

//   Javier Neva		     	     10/12/2003		   Creaci�n

//**********************************************************************************	



/***********************************************************************************

							LIBRERIAS

***********************************************************************************/
//Cabecera de un archivo excel



header ("Content-type: application/vnd.ms-excel");
require_once ("../utilidades/adodb.php");

require_once ("../utilidades/funciones.php");

require_once ("../utilidades/obj_list.php");

require_once ("../conf/config.php");

require_once ("../logica/general/generico.php");

require_once ("../logica/usuarios/usuarios.php");



/***********************************************************************************

							VARIABLES

***********************************************************************************/

//Crear objeto para validaci�n de usuarios

$v_usuarios = new Usuario();

//Validar usuario

require("sesion.php");



?>

<html>

<head>

<title>:: Administrador ::</title>

</head>

<body>

  <table border='1'>

    <tr bgcolor='#C5C5C5'>

	  <?//*** Imprimir el nombre de las columnas ***

  		$list_rotulos = explode("|",$rotulos);

		for($i=0;$i<count($list_rotulos);$i++){

			print "<td width='200' bgcolor='#C5C5C5'><b>" . $list_rotulos[$i] . "</b></td>";

		}

  	  ?>

	</tr>

	<?// *** Imprimir los datos ***

	  //Crear objeto Generico para obtener los datos a imprimir

	  $objeto = new Generico();

	  $resultado = $objeto->find($campos_buscar,$from,stripslashes($parametros_busqueda));

	  if($resultado->num_rows() > 0){

	  	//Obtener las caracteristicas de los campos a imprimir

		$list_campos_nombre = explode("|",$campos_nombre);

		while(($resultado->next_row())){

			print "<tr>";

			for($i=1;$i<=count($list_rotulos);$i++){

				print "<td width='200' bgcolor='#C5C5C5'>";

				if($list_campos_nombre[(($i*3)-1) - 1] != "file")

					print $resultado->$list_campos_nombre[($i*3) - 1];

				print "</td>";

			}

			print "</tr>";

		}

	  }

	  $resultado->close();

	  $objeto->Destroy();

	  $objeto = null;

	  $v_usuarios->Destroy();

	?>

  </table>

</html>