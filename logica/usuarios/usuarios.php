<?php

//**********************************************************************************

/**

*Archivo: usuarios.php</p>

*Descripción: Archivo para el manejo de la información de los usuarios

*Fecha de creación: Diciembre 12 de 2003

*Ultima modificación: Diciembre 12 de 2003

*@autor: Lucero Martínez G.

*(c) 2003 Indexcol Ltda. lmartinez@indexcol.com

**/

//**********************************************************************************



//**********************************************************************************

//HISTORIA

//

//         Autor	 	               Fecha  	   	    Cambios

//  ---------------------- 		    ------------   	  -----------

//   Lucero Martínez G.		     	     12/12/2003		   Creación

//**********************************************************************************



class Usuario {



  var $ID;

  var $Id_tabla_relacion;

  var $Id_perfil;

  var $Id_rol;

  var $Usuario;

  var $Clave;

  var $Nombre;

  var $Apellido;

  var $Email;

  var $Intentos;

  var $Caducidad;

  var $Ingreso;

  var $Administrador;

  var $Estado;

  var $Sesion;



  var $Database;



  /**

   * Constructor de la clase

   * @param $ID parámetro con ID del Usuario para llenar la clase con datos (opcional)

   */

  function Usuario($ID = 0) {



		global $db_mysql;

		if(!is_object($db_mysql)) {
		  $db_mysql = new ADODB;
		}

		$this->Database = $db_mysql;
		if($ID)
		  $this->findByPrimaryKey($ID);

	}





  function getID() {

    return $this->ID;

  }



  function setID($ID) {

    $this->ID = $ID;

  }

  function getId_tabla_relacion() {

    return $this->Id_tabla_relacion;

  }



  function setId_tabla_relacion($id_tabla_relacion) {

    $this->Id_tabla_relacion = $id_tabla_relacion;

  }




  function getId_perfil() {

    return $this->Id_perfil;

  }



  function setId_perfil($id_perfil) {

    $this->Id_perfil = $id_perfil;

  }

  function getId_rol() {

    return $this->Id_rol;

  }



  function setId_rol($id_rol) {

    $this->Id_rol = $id_rol;

  }


  function getUsuario() {

    return $this->Usuario;

  }



  function setUsuario($usuario) {

    $this->Usuario = $usuario;

  }



  function getEmail() {

    return $this->Email;

  }



  function setEmail($email) {

    $this->Email = $email;

  }



  function getClave() {

    return $this->Clave;

  }



  function setClave($clave) {

    $this->Clave = $clave;

  }



  function getNombre() {

    return $this->Nombre;

  }



  function setNombre($nombre) {

    $this->Nombre = $nombre;

  }



  function getApellido() {

    return $this->Apellido;

  }



  function setApellido($apellido) {

    $this->Apellido = $apellido;

  }



  function getIntentos() {

    return $this->Intentos;

  }



  function setIntentos($intentos) {

    $this->Intentos = $intentos;

  }



  function getCaducidad() {

    return $this->Caducidad;

  }



  function setCaducidad($caducidad) {

    $this->Caducidad = $caducidad;

  }



  function getIngreso() {

    return $this->Ingreso;

  }



  function setIngreso($ingreso) {

    $this->Ingreso = $ingreso;

  }


  function getAdministrador() {

    return $this->Administrador;

  }



  function setAdministrador($administrador) {

    $this->Administrador = $administrador;

  }


  function getEstado() {

    return $this->Estado;

  }



  function setEstado($estado) {

    $this->Estado = $estado;

  }


  function getSesion() {

    return $this->Sesion;

  }



  function setSesion($sesion) {

    $this->Sesion = $sesion;

  }





  /**

   * Función que busca los datos de un usuarion por llave primaria

   * @param $id_usuario parámetro que contiene el identificador del usuario

   */

  function findByPrimaryKey($id_usuario) {

    $db = $this->Database;



    $query = "SELECT * FROM admin_usuarios WHERE id_usuario=$id_usuario";

	$db->query($query);

	if($db->next_row())

		$this->setData($db);

  }



  /**

   * Funciòn para llenar la clase con datos

   * @param $db parámetro con la base de datos para sacar los datos

   */

  function setData($db) {

    $this->ID = $db->id_usuario ;

    $this->Id_tabla_relacion = $db->id_tabla_relacion ;

    $this->Id_perfil = $db->id_perfil;

    $this->Id_rol = $db->id_rol;

    $this->Usuario = $db->usuario;

    $this->Clave = $db->clave;

    $this->Nombre = $db->nombre;

    $this->Apellido = $db->apellido;

	$this->Email = $db->email;

    $this->Intentos = $db->intentos;

    $this->Caducidad = $db->caducidad;

    $this->Ingreso = $db->ingreso;

    $this->Administrador = $db->administrador;

    $this->Estado = $db->estado;

    $this->Sesion = $db->sesion;

  }



  /**

   * Funciòn para insertar la fila del Usuario en la base de datos

   */

  function create() {

    $db = $this->Database;



    $fields = "id_perfil,id_rol,id_tabla_relacion,usuario,clave,nombre,apellido,email,intentos,caducidad,ingreso,administrador,estado,sesion";

    $values = "'$this->Id_perfil','$this->Id_rol','$this->Id_tabla_relacion','$this->Usuario', '".crypt($this->Clave,"mk")."' ,'$this->Nombre','$this->Apellido','$this->Email','$this->Intentos','$this->Caducidad','$this->Ingreso','$this->Administrador','$this->Estado','$this->Sesion'";


	$strSQL = "INSERT INTO admin_usuarios ($fields) VALUES ($values)";
    $db->query($strSQL);

    $this->ID = mysql_insert_id();



  }



  /**

   * Funciòn para actualizar la fila del Usuario en la base de datos

   */

  function update() {

    $db = $this->Database;



    if($this->ID) {



      $update .= ($update?", ":"")."id_perfil = '$this->Id_perfil'";

      $update .= ($update?", ":"")."id_rol = '$this->Id_rol'";

	  if($this->Id_tabla_relacion)
     	 $update .= ($update?", ":"")."id_tabla_relacion = '$this->Id_tabla_relacion'";

      $update .= ($update?", ":"")."usuario = '$this->Usuario'";

	  if(strlen($this->Clave))
	      $update .= ($update?", ":"")."clave = '".crypt($this->Clave,"mk")."'";

      $update .= ($update?", ":"")."nombre = '$this->Nombre'";

      $update .= ($update?", ":"")."apellido = '$this->Apellido'";

	  $update .= ($update?", ":"")."email = '$this->Email'";

      $update .= ($update?", ":"")."intentos = '$this->Intentos'";

      $update .= ($update?", ":"")."caducidad = '$this->Caducidad'";

      $update .= ($update?", ":"")."administrador = '$this->Administrador'";

      $update .= ($update?", ":"")."estado = '$this->Estado'";

      $update .= ($update?", ":"")."ingreso = '$this->Ingreso'";


	  $db->query("UPDATE admin_usuarios SET $update WHERE id_usuario = '$this->ID'");

    }

  }



  /**

   * Funciòn que incrementa el número de intentos de un usuario

   * @param $usuario parámetro que contiene el usuario.

   */



  function incrementarIntentos($usuario) {

    $db = $this->Database;

    $db->query("UPDATE admin_usuarios SET intentos=(intentos+1) WHERE usuario = '$usuario'");

  }



   /**

   * Funciòn que actualiza la sesión en la base de datos.

   */



  function updateSesion() {

    $db = $this->Database;

    $db->query("UPDATE admin_usuarios SET sesion='$this->Sesion' WHERE id_usuario = '$this->ID'");

  }





  /**

   * Funciòn para borrar la fila del Usuario en la base de datos

   */

  function delete() {

    $db = $this->Database;



    if($this->ID) {

      $db->query("DELETE FROM admin_usuarios WHERE id_usuario = '$this->ID'");

    }

  }



  /**

   * Funciòn para mostrar el Usuario por pàginas

   */

  function findAll($order_by="",$order_direction="",$page = 1,$num_results = -1) {

    $db = $this->Database;



    if(!$order_by) $order_by = "id_usuario ";

    $query = "SELECT * FROM admin_usuarios ORDER BY $order_by $order_direction";

    $list = new ObjList($db,$query,$page,$num_results,"Usuario");



    return $list;

  }

  /**

   * Funciòn para mostrar el Usuario por pàginas segun un SQL

   */

  function findSQL($strSQL="", $order_by="",$order_direction="",$page = 1,$num_results = -1) {

    $db = $this->Database;

    if(!$order_by) $order_by = "id_usuario ";

    $query = $strSQL . " ORDER BY $order_by $order_direction";

    $list = new ObjList($db,$query,$page,$num_results,"Usuario");

    return $list;

  }

  /**

   * Función que verifica si el usuario existe, y si existe almacena los datos.

   * @param $usuario parámetro que contiene el id del usuario, $clave parámetro que contiene la clave

   * @return True en caso de que se encuentre algun registro, False en caso de lo contrario.

   */

  function existUsuario($usuario,$clave) {

    $db = $this->Database;
	$clave = crypt($clave,"mk");
    $query = "SELECT * FROM admin_usuarios WHERE usuario='$usuario' AND clave='$clave'";
    
	$db->query($query);

	if($db->next_row()){

		$this->setData($db);

		return true;

	}
	else
		return false;

  }

function NombreUsuario($usuario) {

    $db = $this->Database;



    $query = "SELECT * FROM admin_usuarios WHERE usuario='$usuario' ";

	$db->query($query);

	if($db->next_row()){
		$this->setData($db);

		return true;

	}

	else

		return false;

  }

  /**

   * Función que verifica que el usuario y la sesión existan

   * @param $usuario parámetro que contiene el usuario, $sesiom parámetro que contiene la sesion

   * @return True en caso de que se encuentre algun registro, False en caso de lo contrario.

   */

  function existSesion($usuario,$sesion) {

    $db = $this->Database;



    $query = "SELECT * FROM admin_usuarios WHERE id_usuario='$usuario' AND sesion='$sesion'";

	$db->query($query);

	if($db->next_row())

		return true;

	else

		return false;

  }



    /**

   * Funciòn que verifica si existe el usuario

   */

  function exist() {

    $db = $this->Database;



    $query = "SELECT * FROM admin_usuarios WHERE usuario='$this->Usuario'";

	$db->query($query);

	if($db->next_row())

		return true;

	else

		return false;

  }



    /**

   * Funciòn que verifica si existe un usuario diferente que use el mismo usuario

   */

  function existOther() {

    $db = $this->Database;



    $query = "SELECT * FROM admin_usuarios WHERE usuario='$this->Usuario' AND id_usuario <> '$this->ID'";

	$db->query($query);

	if($db->next_row())

		return true;

	else

		return false;

  }



	function recordar_clave($login,$proviene)

	{
		if(!$proviene)
			$proviene=0;

		$db = $this->Database;

		$db->query("select nombre, apellido, email, id_usuario from admin_usuarios where usuario='$login'");

		$db->next_row();

		$usu_nombre = $db->nombre;

		$usu_apellidos = $db->apellido;

		$usu_email = $db->email;

		$usu_id = $db->id_usuario;




		srand ((double) microtime() * 1000000);

		$clavetmp='';

		$Pool = "1234567890";

		for($index = 0; $index < 6; $index++)

			{

			$clavetmp.= substr($Pool,(rand()%(strlen($Pool))),1);

			}

		$db->query("update admin_usuarios set clave = '".crypt($clavetmp,"mk")."' where id_usuario = '$usu_id'");


		if($proviene==0)
			require_once ("../logica/usuarios/class.phpmailer.php");
		else
			require_once ("admin/logica/usuarios/class.phpmailer.php");
		$mail = new phpmailer();

		$mail->From = "Administrador de Datos";

		$mail->FromName = "Administrador de Datos";

		$mail->AddAddress($usu_email,$usu_email);

		$mail->IsHTML(TRUE);

		$mail->IsMail();

		$mail->Subject = "Recordar Clave";



		//mensaje

		$mailBody = "<BR><center><b>ADMINISTRADOR DE DATOS</b><BR><BR>";

		$mailBody .= "<center><b>OLVIDÓ SU CLAVE</b><BR><BR><BR>";

		$mailBody .= "<table border='0' cellspacing='0' cellpadding='1' align='center'>";

		$mailBody .= "<tr><td>$usu_nombre $usu_apellidos</td></tr>";

		$mailBody .= "<tr><td>Su nueva clave es: <b>$clavetmp</b></td></tr>";

		$mailBody .= "</table> ";



		$mail->Body = $mailBody;

		$mail->Send();

	}



	function cambiar_clave($id_usuario,$clave_actual,$clave_nueva)

	{

		$db = $this->Database;

		$db->query("select usuario from admin_usuarios where id_usuario='$id_usuario' AND clave = '".crypt($clave_actual,"mk")."' ");

		$db->next_row();

		if($db->num_rows() == 0)

			$error = "La clave actual digitada es incorrecta";

		elseif(($db->usuario == $clave_nueva))

			$error = "La nueva clave no puede ser igual al nombre de usuario";

		else

		{

			$db->query("update admin_usuarios set clave = '".crypt($clave_nueva,"mk")."' where id_usuario = '$id_usuario'");
			$error = "La clave ha sido actualizada satisfactoriamente";

		}

		return $error;

	}



	function Destroy(){

  		$this->Database->close();

    }


    //FUNCION QUE DETERMINA SI EL USUARIO ADMINISTRADOR ESTA RELACIONADO A OTRA TABLA
    function traeRelacion(){

		$dbAux = new ADODB;
		$hayRelacion=false;

		$strSQL = "SELECT * FROM admin_parametros WHERE parametro like '%rel_usuarios%'";
		$dbAux->query($strSQL);

		while ($dbAux->next_row()){

			$parametro = $dbAux->parametro;
			if ($parametro=="tabla_rel_usuarios"){
				$tabla = $dbAux->valor;
				if ($tabla)
					$hayRelacion=true;
			}
			else if ($parametro=="campo_rel_usuarios")
				$campo_rel = $dbAux->valor;
			else if ($parametro=="label_rel_usuarios")
				$label = $dbAux->valor;
			else if ($parametro=="where_order_rel_usuarios")
				$where = $dbAux->valor;
		}

		$selectRelacion = "SELECT ".$campo_rel ."," . $label . " FROM " . $tabla;

		//ARMA WHERE
		$selectRelacion .= " WHERE 1=1";

		if ($where)
			$selectRelacion .=  " AND " . $where;



		return array("sql"=>$selectRelacion,"hayRelacion"=>$hayRelacion,"tabla"=>$tabla,"campo_rel"=>$campo_rel,"label"=>$label);

	}

	//FUNCION QUE PERMITE TRAER LOS NOMBRES DEL USUARIO DEPENDIENDO SI VIENE DE LA TABLA RELACION
	//O VIENE DE LA TABLA LOCAL DE EMPLEADOS
	function getNombresUser($idUser=0,$idUserRelation=0){

		$dbAux = new ADODB;

		$arrExisteRelacion = $this->traeRelacion();
		if ($arrExisteRelacion['hayRelacion']){

			//TRAEMOS EL VALOR DE RELACION DEL USUARIO
			$strSQL = "SELECT ".$arrExisteRelacion['label'] ." FROM " . $arrExisteRelacion['tabla'] . " WHERE " . $arrExisteRelacion['campo_rel'] ."='".$idUserRelation."'";
			$dbAux->query($strSQL);

			if ($dbAux->next_row())
				//NOTA: RECORDAR SE TRAE EL CAMPO 'USUARIO' POR QUE EN LA TABLA DE PARAMETROS EN LA PARAMETRO LABEL_USUARIO ESTE DEBE TENER UN AS Usuario para que se identifique mejor
				$usuarioNombres = $dbAux->Usuario;
		}
		else{

			//TRAEMOS EL VALOR DE TABLA GENERICA DE USUARIOS
			$usuarioNombres = $this->getNombre() . " " .$this->getApellido();
		}

		return $usuarioNombres;
	}

	//FUNCION QUE PERMITE CREAR LAS SESSIONES DE A QUE GRUPO DE INFORMACION PERTENECE EL USUARIO
	function setSessionsGroup($idUser){



	}

}



?>