<?php

//**********************************************************************************

/**

*Archivo: admin_permisos.php</p>

*Descripción: Archivo para el manejo de la información de la tabla permisos

*Fecha de creación: Diciembre 2 de 2003

*Ultima modificación: Diciembre 2 de 2003

*@autor: Javier Neva.

*(c) 2003 Indexcol Ltda. jneva@indexcol.com

**/

//**********************************************************************************



//**********************************************************************************

//HISTORIA

//

//         Autor	 	               Fecha  	   	    Cambios

//  ---------------------- 		    ------------   	  -----------

//   Javier Neva		     	     02/12/2003		   Creación

//**********************************************************************************



class AdminPermisos {



	var $idPermiso;

	var $idPerfil;

	var $idModulo;

	var $idAccion;



	var $Database;



	/**

	* Función Creadora

    */

	function AdminPermisos() {

  		global $db_mysql;



		if(!is_object($db_mysql)) {

			$db_mysql = new ADODB;

		}

	    $this->Database = $db_mysql;

	}



	/**

	* Retorna el ID del permiso

    * @return int $idPermiso

    */

	function getidPermiso() {

	  return $this->idPermiso;

	}



	/**

	* Ingresa el ID del permiso

    * @param int $idPermiso

    */

  	function setidPermiso($idPermiso) {

	  $this->idPermiso = $idPermiso;

	}



	/**

	* Retorna el id del perfil

    * @return int $idPerfil

    */

	function getidPerfil() {

	  return $this->idPerfil;

	}



	/**

	* Ingresa el identificador del perfil

    * @param int $idPerfil

    */

  	function setidPerfil($idPerfil) {

	  $this->idPerfil = $idPerfil;

	}



	/**

	* Retorna el id del modulo

    * @return int $idModulo

    */

	function getidModulo() {

	  return $this->idModulo;

	}



	/**

	* Ingresa el identificador del modulo

    * @param int $idModulo

    */

  	function setidModulo($idModulo) {

	  $this->idModulo = $idModulo;

	}



	/**

	* Retorna el id de la acción

    * @return int $idAccion

    */

	function getidAccion() {

	  return $this->idAccion;

	}



	/**

	* Ingresa el identificador de la acción

    * @param int $idAccion

    */

  	function setidAccion($idAccion) {

	  $this->idAccion = $idAccion;

	}



  /**

   * Funciòn para llenar la clase con datos

   * @param $db parámetro con la base de datos para sacar los datos

   */

  function setData($db) {

    $this->idPermiso = $db->id_permiso;

	$this->idPerfil = $db->id_perfil;

	$this->idModulo = $db->nombre_tabla;

	$this->idAccion = $db->id_tipo;

  }



  /**

   * Función que busca el listado de permisos de un perfil

   * @param $p_perfil parámetro que contiene el identificador del perfil

   * @list Listado de permisos del perfil

   */

  function findbyPerfil($p_perfil) {

    $db = $this->Database;



    if(!$order_by) $order_by = "id_perfil ";



    $query = "SELECT DISTINCT nombre_tabla FROM admin_permisos WHERE id_perfil='$p_perfil' ORDER BY nombre_tabla ASC";

    $list = new ObjList($db,$query,1,-1,"AdminPermisos");



    return $list;

  }



  function findbyPerfilTabla($p_perfil,$p_tabla) {

    $db = new ADODB;



    if(!$order_by) $order_by = "id_perfil ";

    $query = "SELECT * FROM admin_permisos WHERE id_perfil='$p_perfil' AND nombre_tabla = '$p_tabla'";

    $list = new ObjList($db,$query,1,-1,"AdminPermisos");



    return $list;

  }



  function create() {

    $db = $this->Database;

    $db->query("INSERT INTO admin_permisos (id_perfil,nombre_tabla,id_tipo) VALUES ('$this->idPerfil','$this->idModulo','$this->idAccion')");

  }





  function delete() {

    $db = $this->Database;

    $db->query("DELETE FROM admin_permisos WHERE id_perfil='$this->idPerfil' AND nombre_tabla='$this->idModulo'");

  }



  function deleteByPerfil($p_idPerfil) {

    $db = $this->Database;

    $db->query("DELETE FROM admin_permisos WHERE id_perfil='$p_idPerfil'");

  }



  function Destroy(){

  	$this->Database->close();

  }

}



?>