<?php

class AdminMenu {

	var $idTablaMenu;

	var $nombreTabla;

	var $descripcion;

	var $grupo;
	
	var $plugin;
	
	var $metodoPublico;

	var $Database;

	/**

	 * Funci�n Creadora

	 */

	function AdminMenu() {

		global $db_mysql;

		if (!is_object($db_mysql)) {

			$db_mysql = new ADODB;

		}

		$this -> Database = $db_mysql;

	}

	/**

	 * Ingresar el identificador del men�

	 * @param $idMenu par�metro que contiene el identificador del men�

	 */

	function getidTablaMenu($idMenu) {

		$this -> idTablaMenu = $idMenu;

	}

	/**

	 * Retorna el ID del menu

	 * @return int $idTablaMenu

	 */

	function setidTablaMenu() {

		return $this -> idPermiso;

	}
	
	
	function setPluginMenu($plugin){
		$this->plugin = $plugin;
	}
	
	function getPluginMenu(){
		return $this->plugin;
	}

	function setmetodoPublico($metodo){
		$this->metodoPublico = $metodo;
	}
	
	function getmetodoPlublico(){
		return $this->metodoPublico;
	}	

	/**

	 * Ingresa el nombre de la tabla

	 * @param $tabla p�rametro que contiene el nombre de la tabla

	 */

	function setnombreTabla($tabla) {

		$this -> nombreTabla = $tabla;

	}

	/**

	 * Retorna el nombre de la tabla

	 * @return $nombreTabla que contiene el nombre de la tabla

	 */

	function getNombreTabla() {

		return $this -> nombreTabla;

	}

	/**

	 * Ingresar la descripci�n del men�

	 * @param $descripcion par�metro que contiene la descripci�n del men�

	 */

	function setDescripcion($descripcion) {

		$this -> descripcion = $descripcion;

	}

	/**

	 * Retorna la descripci�n del men�

	 * @return $descrpci�n que contiene el nombre del men�

	 */

	function getDescripcion() {

		return $this -> descripcion;

	}

	/**

	 * Ingresar el grupo al cual pertenece el men�

	 * @param $grupo par�metro que contiene el grupo al cual pertenece el men�

	 */

	function setGrupo($grupo) {

		$this -> grupo = $grupo;

	}

	/**

	 * Retorna el grupo al cual pertenece el men�

	 * @return $grupo que contiene el grupo

	 */

	function getGrupo() {

		return $this -> grupo;

	}

	/**

	 * Ingresar todos los datos del men� desde la base de datos

	 * @param $db que contiene los datos del men�

	 */

	function setData($db) {

		$this -> idTablaMenu = $db -> id_tabla_menu;

		$this -> nombreTabla = $db -> nombre_tabla;

		$this -> descripcion = $db -> descripcion;

		$this -> grupo = $db -> grupo;
		
		$this -> plugin = $db -> plugin;
		
		$this -> metodoPublico = $db -> metodo_publico;
		
	}

	/**

	 *Buscar el listado de men�s perteneciente a un perfil determinado

	 *@param $idPerfil par�metro que contiene el identificador del perfil.

	 *@return $list que contiene el listado de men�s.

	 */

	function findByPerfil($idPerfil) {

		$db = new ADODB;

		$query = "SELECT DISTINCT m.* FROM admin_permisos p,admin_menu m WHERE p.id_perfil=$idPerfil AND p.nombre_tabla = m.nombre_tabla ORDER BY grupo ASC";
		
		
		$query="SELECT DISTINCT m. * , plg. *
				FROM admin_permisos p, admin_menu m
				LEFT JOIN app_plugins plg ON m.nombre_tabla = plg.`plugin`
				WHERE p.id_perfil = $idPerfil
				AND p.nombre_tabla = m.nombre_tabla
				ORDER BY grupo ASC";
		//echo $query;
		$list = new ObjList($db, $query, 1, -1, "AdminMenu");

		return $list;

	}

	/**

	 *Buscar los datos de la tabla indicada

	 */

	function findByTabla($tabla) {

		$db = new ADODB;

		$query = "SELECT * FROM admin_menu WHERE nombre_tabla = '$tabla'";

		$db -> query($query);

		if (($db -> num_rows() > 0) && ($db -> next_row()))

			$this -> setData($db);

	}

	/**

	 * Funci�n que retorna el listado de modulos en el sistema

	 * @param $order_by  que contiene el nombre de la columna por la cual se va a ordenar

	 *        $order_direction contiene el orden en el cual iran los datos ASC o DESC

	 *        $page n�mero de p�gina actual.

	 *		$num_results n�mero de resultado por p�gina

	 * @return $list que contiene el listado de modulos

	 */

	function findAll($order_by = "", $order_direction = "", $page = 1, $num_results = -1) {

		$db = $this -> Database;

		if (!$order_by)
			$order_by = "id_tabla_menu ";

		$query = "SELECT * FROM admin_menu ORDER BY $order_by $order_direction";

		$list = new ObjList($db, $query, $page, $num_results, "AdminMenu");

		return $list;

	}

	function Destroy() {

		$this -> Database -> close();

	}

}
?>