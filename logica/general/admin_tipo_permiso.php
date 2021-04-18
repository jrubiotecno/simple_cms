<?php
//**********************************************************************************
/**
*Archivo: admin_permisos.php</p>
*Descripci�n: Archivo para el manejo de la informaci�n de la tabla permisos
*Fecha de creaci�n: Diciembre 2 de 2003
*Ultima modificaci�n: Diciembre 2 de 2003
*@autor: Javier Neva.
*(c) 2003 Indexcol Ltda. jneva@indexcol.com
**/
//**********************************************************************************

//**********************************************************************************
//HISTORIA
//
//         Autor	 	               Fecha  	   	    Cambios
//  ---------------------- 		    ------------   	  -----------
//   Javier Neva		     	     02/12/2003		   Creaci�n
//**********************************************************************************

class AdminTipoPermiso {

	var $idTipo;
	var $nombreTipo;

	var $Database;

	/**
	* Funci�n Creadora
    */
	function AdminTipoPermiso() {
  		global $db_mysql;

		if(!is_object($db_mysql)) {
			$db_mysql = new ADODB;
		}
	    $this->Database = $db_mysql;
	}

	/**
	* Retorna el ID del tipo de permiso
    * @return el identificador del permiso.
    */
	function getidTipoPermiso() {
	  return $this->idTipo;
	}

	/**
	* Ingresa el ID del permiso
    * @param int $idPermiso
    */
  	function setidTipoPermiso($idTipoPermios) {
	  $this->idTipo = $idTipoPermiso;
	}

	/**
	* Retorna el id del perfil
    * @return int $idPerfil
    */
	function getNombre() {
	  return $this->nombreTipo;
	}

	/**
	* Ingresa el identificador del perfil
    * @param int $idPerfil
    */
  	function setNombre($nombre_tipo) {
	  $this->nombreTipo = $nombre_tipo;
	}

	function setData($db) {
		$this->idTipo = $db->id_tipo;
    	$this->nombreTipo = $db->nombre_tipo;
	}

  /**
   * Buscar todos los permisos que tiene el perfil sobre una tabla determinada.
   * @param $tabla, $idPerfil parametros que contienen el nombre de la tabla y el identificador del perfil.
   * @return Lista con los tipos de permiso a los cuales tiene el perfil.
   */
	function buscarPorTablaPerfil($tabla,$idPerfil){
	    $db = new ADODB;
		$query = "SELECT DISTINCT a.* FROM admin_permisos p,admin_tipo_permiso a WHERE p.nombre_tabla='$tabla' AND p.id_perfil='$idPerfil' AND p.id_tipo = a.id_tipo ORDER BY a.nombre_tipo";
		$lista= new ObjList($db,$query,1,-1,"AdminTipoPermiso");
	    return $lista;
	}

  /**
   * Buscar el listado nombre de los permisos que tiene el perfil sobre una tabla determinada.
   * @param $tabla, $idPerfil parametros que contienen el nombre de la tabla y el identificador del perfil.
   * @return Lista con los nombres de los permisos a los cuales tiene el perfil.
   */
	function buscarPorTablaPerfilNPer($tabla,$idPerfil){
	    $db = new ADODB;
		$query = "SELECT DISTINCT a.nombre_tipo FROM admin_permisos p,admin_tipo_permiso a WHERE p.nombre_tabla='$tabla' AND p.id_perfil='$idPerfil' AND p.id_tipo = a.id_tipo ORDER BY a.nombre_tipo";
		$list = new ObjList($db,$query,1,-1,"AdminTipoPermiso");

	    return $list;
	}

	function Destroy(){
  		$this->Database->close();
    }
}

?>