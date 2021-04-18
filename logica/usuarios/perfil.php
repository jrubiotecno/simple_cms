<?php
//**********************************************************************************
/**
*Archivo: perfil.php</p>
*Descripci�n: Archivo para el manejo de informaci�n de perfiles.
*Fecha de creaci�n: Diciembre 12 de 2003
*Ultima modificaci�n: Diciembre 12 de 2003
*@autor: Lucero Mart�nez G.
*(c) 2003 Indexcol Ltda. lmartinez@indexcol.com 
**/
//**********************************************************************************

//**********************************************************************************
//HISTORIA
//
//         Autor	 	               Fecha  	   	    Cambios
//  ---------------------- 		    ------------   	  -----------
//   Lucero Mart�nez G.		     	     12/12/2003		   Creaci�n
//**********************************************************************************	

class Perfil {

  var $v_idPerfil;
  var $v_perfil;
  
  var $Database;

  /**
   * Constructor de la clase
   * @param $ID par�metro con ID del Usuario para llenar la clase con datos (opcional)
   */
  function Perfil($p_id = 0) {
		global $db_mysql;

		if(!is_object($db_mysql)) {
			$db_mysql = new ADODB;
		}
	    $this->Database = $db_mysql;
	}


  function getIdPerfil() {
    return $this->v_idPerfil;
  }

  function setIdPerfil($p_id) {
    $this->v_idPerfil = $p_id;
  }

  function getPerfil() {
    return $this->v_perfil;
  }

  function setPerfil($p_perfil) {
    $this->v_perfil = $p_perfil;
  }

  /**
   * Funci�n que busca el perfil que tiene el identificador especificado
   * @param $p_id par�metro que contiene el identificador del perfil
   */
 
   function findByPrimaryKey($id_perfil) {
     $db = $this->Database;
 
     $query = "SELECT * FROM admin_perfiles WHERE id_perfil = '$id_perfil'";
 	$db->query($query);
 	if($db->next_row())
 		$this->setData($db);
  }
  
  /**
   * Funci�n para llenar la clase con datos
   * @param $db par�metro con la base de datos para sacar los datos
   */
  function setData($db) {
    $this->v_idPerfil = $db->id_perfil;
    $this->v_perfil = $db->perfil;
  }

  /**
   * Funci�n para insertar la fila del Usuario en la base de datos
   */
  function create() {
    $db = $this->Database;

    $fields = "perfil";
    $values = "'$this->v_perfil'";

    $db->query("INSERT INTO admin_perfiles ($fields) VALUES ($values)");
    $this->idPerfil = mysql_insert_id();

  }

  /**
   * Funci�n que actualiza el nombre del perfil en la base de datos
   */
  function update() {
    $db = new ADODB;

    if($this->v_idPerfil) {
      $update .= ($update?", ":"")."id_perfil = '$this->v_perfil'";
      $db->query("UPDATE admin_perfiles SET $update WHERE id_perfil = '$this->v_idPerfil'");
    }
  }

  /**
   * Funci�n para borrar la fila del Usuario en la base de datos
   */
  function delete() {
    $db = $this->Database;
	
	$db->query("DELETE FROM admin_perfiles WHERE id_perfil = '$this->v_idPerfil'");

  }

   /**
   * Funci�n que verifica si existe un usuario diferente que use el mismo usuario
   */
  function hayUsuariosAsociados($idPerfil) {
    $db = $this->Database;

    $query = "SELECT * FROM admin_usuarios WHERE id_perfil='$idPerfil'";
	$db->query($query);
	if($db->next_row())
		return true;
	else
		return false;
  }
  
  /**
   * Funci�n que retorna el listado de perfiles en el sistema
   * @param $order_by  que contiene el nombre de la columna por la cual se va a ordenar
   *        $order_direction contiene el orden en el cual iran los datos ASC o DESC
   *        $page n�mero de p�gina actual.
   *		$num_results n�mero de resultado por p�gina
   * @return $list que contiene el listado de perfiles
   */
  function findAll($order_by = "",$order_direction = "",$page = 1,$num_results = -1) {
    $db = $this->Database;

    if(!$order_by) $order_by = "id_perfil ";

    $query = "SELECT * FROM admin_perfiles ORDER BY $order_by $order_direction";
    $list = new ObjList($db,$query,$page,$num_results,"Perfil");

    return $list;
  }
  
 
  function Destroy(){
  	$this->Database->close();
  }
}
?>