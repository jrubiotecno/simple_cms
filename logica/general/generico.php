<?php

class Generico {



  //Variables para consultas

  var $Tabla;

  var $Campos;

  var $Valores;

  var $ValoresUpdate;



  //Variables base de datos

  var $Database;



  /**

   * Constructor de la clase

   */

  function Generico() {

    global $db_mysql;



    if(!is_object($db_mysql)) {

      $db_mysql = new ADODB;

    }

    $this->Database = $db_mysql;

  }



  function Destroy() {

  	$this->Tabla = "";

	$this->Campos = "";

	$this->Valores = "";

	$this->Database->close();

	$this->Database = null;

  }



  /**

   * Insertar el nombre de la tabla

   * @param $p_tabla parámetro que contiene el nombre de la tabla

   */

  function setTabla($p_tabla) {
    $this->Tabla = "$p_tabla";

  }



  /**

   * Retornar el nombre de la tabla.

   * @return el nombre de la tabla

   */

  function getTabla() {

    return $this->Tabla;

  }



  /**

   * Insertar un valor al listado de valores

   * @param $p_valor párametro con el valor a agregar

   */

  function setValor($p_valor) {

      if(strlen($this->Valores))

	    $this->Valores .= ",'$p_valor'";

	  else

		$this->Valores .= "'$p_valor'";

  }





  /**

   * Retornar el listado de valores.

   * @return el listado de valores separado por coma

   */

  function getValores() {

    return $this->Valores;

  }



  /**

   * Insertar un valor al listado de valores para un update

   * @param $p_campo, $p_valor que contienen el nombre del campo y el valor

   */

  function setValorUpdate($p_campo,$p_valor) {
  	if(strlen($p_campo)){

	    if(strlen($this->ValoresUpdate))

		    $this->ValoresUpdate .= ",$p_campo='$p_valor'";

		else

			$this->ValoresUpdate .= "$p_campo='$p_valor'";

	}

  }



  function getValorUpdate() {

  	return $this->ValoresUpdate;

  }



  /**

   * Insertar un campo al listado de campos

   * @param $p_campo párametro con el nombre del campo

   */



  function setCampo($p_campo) {

	  if(strlen($this->Campos))

	    $this->Campos .= ",$p_campo";

	  else

		$this->Campos .= "$p_campo";

  }



  /**

   * Insertar el listado de campos

   * @param $p_campos párametro con el listado de campos separado por coma

   */

  function setCampos($p_campos) {

    $this->Campos = "$p_campos";

  }



  /**

   * Retornar el listado de campos

   * @return el listado de los campos separado por coma.

   */

  function getCampos() {

    return $this->Campos;

  }



  /**

   * Funciòn para insertar una fila a la base de datos

   */

  function create() {

    $db = $this->Database;

	$query = "INSERT INTO $this->Tabla ($this->Campos) VALUES ($this->Valores)";
    $db->query($query);
	$db->close();

  }



  function update($id_campo,$id_valor) {

    $db = $this->Database;
    $db->query("UPDATE $this->Tabla SET $this->ValoresUpdate WHERE $id_campo='$id_valor'");
	$db->close();

  }



  function delete($id_campo,$id_valor) {

    $db = $this->Database;
	
	$str = "DELETE FROM $this->Tabla WHERE $id_campo='$id_valor'";
	$db->query("DELETE FROM $this->Tabla WHERE $id_campo='$id_valor'");

	$db->close();

  }



  /**

   * Funciòn que busca la información de una tabla

   * @param $columnas que contiene el listado de las columnas,$tablas que contiene el listado de las columnas,

   *        $condicion con la condicion de busqueda

   */

  function find($columnas,$tablas,$condicion,$sql) {

    $db = $this->Database;

	$query = "SELECT $columnas FROM $tablas";

	if(strlen($condicion)){  $query .= " WHERE $condicion "; }

	$query = $sql;
	$db->query($query);

	return $db;

  }

  function find_NEW($sql) {

    $db = new ADODB;
	$db->query($sql);
	return $db;

  }



  /**

   * Funciòn para insertar una fila a la base de datos

   */

  function findByCondition($p_condicion,$p_campo) {

    $db = $this->Database;
    $db->query("SELECT $p_campo FROM $this->Tabla WHERE $p_condicion");

	if($db->next_row()) {

      $this->Valores = $db->$p_campo;

    }

  }



  /*function Destroy(){

  		$this->Database->close();

  }*/

}

?>