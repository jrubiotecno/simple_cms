<?php

class AdminTablas {

  var $iId;

  var $iNombre_tabla;

  var $iNombre_campo;

  var $iCampo_es_id;

  var $iTipo_campo;

  var $iTabla_relacion;

  var $iAlias_relacion;

  var $iCampo_relacion;

  var $iCampo_imprimir;

  var $iValidacion;

  var $iTipo_validacion;

  var $iTamano;

  var $iLongitud;

  var $iMostrar;

  var $iRotulo;

  var $iCampo_confirmar;

  var $iNombre_estado1;

  var $iNombre_estado2;



  var $Database;



  /**

   * Constructor de la clase

   */

  function AdminTablas() {

    global $db_mysql;



    if(!is_object($db_mysql)) {

      $db_mysql = new ADODB;

    }

    $this->Database = $db_mysql;

  }



  function setId($p_id) {

    $this->iId = "$p_id";

  }



  function setNombreTabla($p_nombre_tabla) {

    $this->iNombre_tabla = "$p_nombre_tabla";

  }



  function setNombreCampo($p_nombre_campo) {

    $this->iNombre_campo = "$p_nombre_campo";

  }



  function setCampoesId($p_campo_es_id) {

    $this->iCampo_es_id = "$p_campo_es_id";

  }



  function setTipoCampo($p_iTipo_campo) {

    $this->iTipo_campo = "$p_iTipo_campo";

  }



  function setTablaRelacion($p_tabla_relacion) {

    $this->iTabla_relacion = "$p_tabla_relacion";

  }

  function setAliasRelacion($p_alias_relacion) {

    $this->iAlias_relacion = "$p_alias_relacion";

  }

  function setCampoRelacion($p_campo_relacion) {

    $this->iCampo_relacion = "$p_campo_relacion";

  }



  function setCampoImprimir($p_campo_imprimir) {

    $this->iCampo_imprimir = "$p_campo_imprimir";

  }



  function setValidacion($p_validacion) {

    $this->iValidacion = "$p_validacion";

  }



  function setTipoValidacion($p_tipo_validacion) {

    $this->iValidacion = "$p_tipo_validacion";

  }



  function setTamano($p_tamano) {

    $this->iTamano = "$p_tamano";

  }



  function setLongitud($p_longitud) {

    $this->iLongitud = "$p_longitud";

  }



  function setMostrar($p_mostrar) {

    $this->iMostrar = $p_mostrar;

  }



  function setRotulo($p_rotulo) {

    $this->iRotulo = "$p_rotulo";

  }



  function setCampoConfirmar($p_campo_confirmar) {

    $this->iCampo_confirmar = "$p_campo_confirmar";

  }



  function setNombreEstado1($p_nombre_estado1) {

    $this->iNombre_estado1 = "$p_nombre_estado1";

  }



  function setNombreEstado2($p_nombre_estado2) {

    $this->iNombre_estado2 = "$p_nombre_estado2";

  }



  function getId() {

    return $this->iId;

  }



  function getNombreTabla() {

    return $this->iNombre_tabla;

  }



  function getNombreCampo() {

    return $this->iNombre_campo;

  }



  function getCampoesId() {

    return $this->iCampo_es_id;

  }



  function getTipoCampo() {

    return $this->iTipo_campo;

  }



  function getTablaRelacion() {

    return $this->iTabla_relacion;

  }

  function getAliasRelacion() {

    return $this->iAlias_relacion;

  }


  function getCampoRelacion() {

    return $this->iCampo_relacion;

  }



  function getCampoImprimir() {

    return $this->iCampo_imprimir;

  }



  function getValidacion() {

    return $this->iValidacion;

  }



  function getTipoValidacion() {

    return $this->iValidacion;

  }



  function getTamano($p_tamano) {

    return $this->iTamano;

  }



  function getLongitud() {

    return $this->iLongitud;

  }



  function getMostrar() {

    return $this->iMostrar;

  }



  function getRotulo() {

    return $this->iRotulo;

  }



  function getCampoConfirmar() {

    return $this->iCampo_confirmar;

  }



  function getNombreEstado1() {

    return $this->iNombre_estado1;

  }



  function getNombreEstado2() {

    return $this->iNombre_estado2;

  }



	function setData($db) {

		$this->iId 				= $db->id_tabla;

		$this->iNombre_tabla 	= $db->nombre_tabla;

		$this->iNombre_campo 	= $db->nombre_campo;

		$this->iCampo_es_id 	= $db->campo_es_id;

		$this->iTipo_campo 		= $db->tipo_campo;

		$this->iTabla_relacion 	= $db->tabla_relacion;

		$this->iAlias_relacion 	= $db->alias_tabla_relacion;

		$this->iCampo_relacion 	= $db->campo_relacion;

		$this->iCampo_imprimir 	= $db->campo_imprimir;

		$this->iValidacion 		= $db->validacion;

		$this->iTipo_validacion = $db->tipo_validacion;

		$this->iTamano			= $db->tamano;

		$this->iLongitud 		= $db->longitud;

		$this->iMostrar 		= $db->mostrar;

		$this->iRotulo			= $db->rotulo;

		$this->iCampo_confirmar = $db->campo_confirmar;

		$this->iNombre_estado1 	= $db->estado1;

		$this->iNombre_estado2 	= $db->estado2;

	}



  /**

   * Buscar todos los caracteristicas de los campos de una tabla especifica.

   * @param $tabla, $idPerfil parametros que contienen el nombre de la tabla y el identificador del perfil.

   * @return Lista con los tipos de permiso a los cuales tiene el perfil.

   */

	function buscarPorNombreTabla($nombre_tabla){

	    $db = $this->Database;

		$query = "SELECT * FROM admin_tablas WHERE nombre_tabla='$nombre_tabla' ORDER BY id_tabla ASC";

		$lista = new ObjList($db,$query,1,-1,"AdminTablas");

	    return $lista;

	}



	function Destroy(){

  		$this->Database->close();

    }

}

?>