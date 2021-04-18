<?php
error_reporting(0);
/**********************************************************************************
'Descripción: Archivo que trae controla los procesos de usuarios administradores
***********************************************************************************/
require_once("session.php");

//OBTNER LOS DATOS DEL USUARIO
$id_perfil = $_SESSION["s_id_perfil"];

//OBTENER ALGUNOS DATOS DE CONFIGURACION DE EL MANEJO DE USUARIOS
if ($_SESSION['PARAM_USUARIOS']==false){

	$dbAux = new ADODB;

	$strSQL = "SELECT * FROM admin_parametros WHERE parametro='trabaja_perfiles_usuario'";
	$dbAux->query($strSQL);
	$_SESSION['TRABAJA_PERFILES_USUARIO'] = 0;
	if ($dbAux->next_row())
		$_SESSION['TRABAJA_PERFILES_USUARIO'] = $dbAux->valor;


	$_SESSION['PARAM_USUARIOS']=true;
}


//VALIDAR QUE EL USUARIO ES ADMINISTRADOR
if($_SESSION['s_esadmin'] == 0){
      session_destroy();
      echo "<html><script>window.location='login.php';</script></html>";
	  exit;
}

//DETERMINAMOS LA ACCION A SEGUIR
if ($_POST['accion']=="lista" || $_POST['accion']==""){

	$usuarios = new Usuario();
	include("usuarios.php");
}
else if ($_POST['accion']=="edit"){

	$usuarios = new Usuario($_POST['id']);

	$requerido=1;
	if ($_POST['id'])
		$requerido=0;

	include("edit_usuarios.php");
}
else if ($_POST['accion']=="save"){

	$usuarios = new Usuario($_POST['id']);

	//DETERMINAMOS SI LA APLICACION TRABAJA CON PERFIL POR USUARIO
	if ($_SESSION['TRABAJA_PERFILES_USUARIO']){
		if (!$_POST['id']){
			//CREO EL PERFIL AUTOMATICO
			$strSQL = "INSERT INTO admin_perfiles(perfil) VALUES ('".$_POST['usuario']."_".$_POST['nombre']."')";
			$db->query($strSQL);
			$idPerfil = mysql_insert_id();
		}
		else
			$idPerfil = $usuarios->getId_perfil();
	}
	else
		$idPerfil = $_POST['perfil'];


	//GUARDAMOS EL ROL EN EL QUE ESTABA ANTES
	$rolOLD = $usuarios->getId_rol();

	$usuarios->setId_perfil($idPerfil);
	$usuarios->setId_rol($_POST['rol']);
	$usuarios->setId_tabla_relacion($_POST['id_tabla_relacion']);
	$usuarios->setUsuario($_POST['usuario']);
	$usuarios->setClave($_POST['clave']);
	$usuarios->setNombre($_POST['nombre']);
	$usuarios->setApellido($_POST['apellido']);
	$usuarios->setEmail($_POST['email']);
	$usuarios->setCaducidad($_POST['caducidad']);
	$usuarios->setIntentos(0);
	$usuarios->setAdministrador($_POST['es_administrador']);
	$usuarios->setEstado($_POST['estado']);

	//DETERMINA SI ACTUALIZA O INSERTA
	if ($_POST['id'])
		$usuarios->update();
	else{
		$usuarios->create();

		//CREO EL EL REGISTRO PARA LOS PERMISOS ESPECIALES
		$strSQL = "INSERT INTO admin_permisos_especiales(id_usuario) VALUES ('".$usuarios->getID()."')";
		$db->query($strSQL);

	}

	//DETERMINA SI ESTA CONFIGURADO PARA TRABAJAR ROLES
	if ($_SESSION['TRABAJA_PERFILES_USUARIO']){

		//DETERMINAMOS SI CAMBIA DE ROL PARA CAMBIAR LOS DATOS DEL PERFIL PERFIL
		if ($rolOLD != $_POST['rol']){

			$dbPerfil = new ADODB;
			$dbAux = new ADODB;
			$dbAux1 = new ADODB;

			//ARMAMOS UN ARREGLO CON TODOS LOS PERMISOS POSIBLES
			$strSQL = "SELECT id_tipo,nombre_tipo FROM admin_tipo_permiso ORDER BY id_tipo";
			$dbAux->query($strSQL);

			while ($dbAux->next_row()){
				$arrPermisos[]=$dbAux->id_tipo;
			}

			//BORRAMOS LOS PERMISOS EN TODAS LAS TABLAS DEL PERFIL
			$strSQL = "DELETE FROM admin_permisos WHERE id_perfil='".$idPerfil."'";
			$dbAux->query($strSQL);


			//TRAEMOS LAS TABLAS DE ACCESO DEL ROL
			$strSQL = "SELECT * FROM rol_tablas WHERE id_rol='".$_POST['rol']."'";
			$dbAux->query($strSQL);

			while ($dbAux->next_row()){

				$strTabla = $dbAux->tabla;

				//DETERMINAMOS SI EL ROL ESCOGIDO TIENE ASIGNADO TODAS LAS TABLAS
				if ($strTabla=="all"){

					$strSQL = "SELECT nombre_tabla,descripcion FROM admin_menu WHERE nombre_tabla NOT IN (SELECT nombre_tabla FROM admin_permisos WHERE id_perfil='".$idPerfil."')";
					$dbPerfil->query($strSQL);

					while ($dbPerfil->next_row()){

						//CREAMOS EL PERMISO A CADA TABLA
						for ($i=0;$i<count($arrPermisos);$i++){
							$strSQL = "INSERT INTO admin_permisos(id_perfil,nombre_tabla,id_tipo) VALUES ('".$idPerfil."','".$dbPerfil->nombre_tabla."','".$arrPermisos[$i]."')";
							$dbAux1->query($strSQL);
						}

					}
				}
				else{

					//CREAMOS EL PERMISO A CADA TABLA DEL ROL SELECCIONADO
					for ($i=0;$i<count($arrPermisos);$i++){
						$strSQL = "INSERT INTO admin_permisos(id_perfil,nombre_tabla,id_tipo) VALUES ('".$idPerfil."','".$strTabla."','".$arrPermisos[$i]."')";
						$dbAux1->query($strSQL);
					}

				}


			}


		}
	}

	//GUARDAMOS REGISTRO DE AUDITORIA
	creaRegistroAuditoria("Inserta un nuevo usuario para el sistema");

	include("usuarios.php");
}
else if ($_POST['accion']=="delete"){

	$perfiles = new Perfil();
	$permisos = new AdminPermisos();

	$usuarios = new Usuario($_POST['id']);

	//DETERMINAMOS SI LA APLICACION TRABAJA CON PERFIL POR USUARIO
	if ($_SESSION['TRABAJA_PERFILES_USUARIO']){

		//BORRAMOS EL PERFIL DEL USUARIO
		$perfiles->setIdPerfil($usuarios->getId_perfil());
		$perfiles->delete();

		//BORRAMOS LOS PERMISOS
		$permisos->deleteByPerfil($usuarios->getId_perfil());
	}

	//BORRAMOS PERMISOS ESPECIALES
	$strSQL = "DELETE FROM admin_permisos_especiales WHERE id_usuario='".$usuarios->getID()."'";
	$db->query($strSQL);


	//CREAMOS REGISTRO AUDITORIA
	$nombresUsuarioEliminar = $usuarios->getNombresUser($usuarios->getID(),$usuarios->getId_tabla_relacion());
	creaRegistroAuditoria("Ha Eliminado Usuario  ".$nombresUsuarioEliminar);

	//ELIMINAMOS EL USUARIO
	$usuarios->delete();

	include("usuarios.php");

}
else if ($_POST['accion']=="cambiar_clave"){

	if ($_POST['actualizar']){

		$v_usuarios = new Usuario();
		$error = $v_usuarios->cambiar_clave($_SESSION['s_usuario'],$_POST['clave_actual'],$_POST['clave_nueva']);

	}

	include("cambiar_clave.php");
}

?>