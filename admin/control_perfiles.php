<?php
/**********************************************************************************
'Descripción: Archivo que controla las opciones de perfiles
***********************************************************************************/

require_once("session.php");

//OBTNER LOS DATOS DEL USUARIO
$id_perfil = $_SESSION["s_id_perfil"];

//VALIDAR QUE EL USUARIO ES ADMINISTRADOR
if($_SESSION['s_esadmin'] == 0){
      session_destroy();
      echo "<html><script>window.location='login.php';</script></html>";
	  exit;
}

//DETERMINAMOS LA ACCION A SEGUIR
if ($_POST['accion']=="lista" || $_POST['accion']==""){

	$perfiles = new Perfil();
	include("perfiles.php");
}
else if ($_POST['accion']=="edit"){

	$perfiles = new Perfil($_POST['id']);

	$id_perfil = $_POST['id'];

	include("editar_permisos.php");
}
if ($_POST['accion']=='save'){

	$perfiles = new Perfil($_POST['id']);
	$permisos = new AdminPermisos();

	$arrPermisos = $_POST['lista_permiso'];
	for($i=0;$i < count($arrPermisos);$i++){
		$permisos->setIdPerfil($_POST['id']);
		$permisos->setIdModulo($_POST['nombre_tabla']);
		$permisos->setIdAccion($arrPermisos[$i]);
		$permisos->create();
	}

	$id_perfil = $_POST['id'];

	include("editar_permisos.php");

}
else if ($_POST['accion']=="delete_perfil"){

	$perfiles = new Perfil();
	$permisos = new AdminPermisos();


	//DETERMINAMOS SI EL ESTA ASOCIADO A USUARIOS
	if ($perfiles->hayUsuariosAsociados($_POST['id']))
		echo alertJS("El perfil no se puede eliminar por que tiene usuarios asociados");
	else{

		$perfiles->setIdPerfil($_POST['id']);
		$perfiles->delete();

		//BORRAMOS LOS PERMISOS
		$permisos->deleteByPerfil($_POST['id']);
	}

	include("perfiles.php");


}
else if ($_POST['accion']=="cambiar_nombre"){

	$db = new ADODB;

	//DETERMINA SI ESTA CREANDO O ACTUALIZANDO EL NOMBRE DE PERFIL
	if ($_POST['id']!="")
		$strSQL = "UPDATE admin_perfiles SET perfil='".$_POST['nombre']."' WHERE id_perfil='".$_POST['id']."'";
	else
		$strSQL = "INSERT INTO admin_perfiles(perfil) VALUES ('".$_POST['nombre']."')";


	$db->query($strSQL);
}
else if ($_POST['accion']=="delete_permiso"){

	$perfiles = new Perfil();
	$permisos = new AdminPermisos();

	$permisos->setidPerfil($_POST['id']);
	$permisos->setidModulo($_POST['option']);
	$permisos->delete();

	$id_perfil = $_POST['id'];

	include("editar_permisos.php");

}
else if($_POST['accion']=='edit_permisos_tabla'){

	$id_perfil = $_POST['id'];
	$tabla = $_POST['option'];

	include("editar_permisos_tabla.php");

}
else if($_POST['accion']=='actualizar_permisos_tabla'){


	$permisos = new AdminPermisos();

	//Se seliminan todos los permisos de la tabla
	$permisos->setIdPerfil($_POST['id_perfil']);
	$permisos->setIdModulo($_POST['tabla']);
	$permisos->delete();

	//Insertar los permisos seleccionados
	$arrPermisos = $_POST['lista_permiso'];
    for($i=0;$i < count($arrPermisos);$i++){
		$permisos->setIdPerfil($_POST['id_perfil']);
		$permisos->setIdModulo($_POST['tabla']);
		$permisos->setIdAccion($arrPermisos[$i]);
        $permisos->create();
    }

    echo alertJS("Los permisos para la tabla ".$_POST['tabla']." han sido actualizados");
    echo funcionJS("window.location.href='control_usuarios.php'");


}
?>