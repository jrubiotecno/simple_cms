<?php
error_reporting(0);
//**********************************************************************************/
/*Archivo: login.php</p>
/*Descripci�n: Archivo de ingreso al sistema
/*************************************************************************************/


require_once("session.php");

if($accion == "recordar_clave"){
	$usuario = new Usuario();
	$proviene=0;
	$usuario->recordar_clave($_POST["login"],$proviene);
}
else if($accion == "validar"){
	
	require_once ("../logica/usuarios/perfil.php");
	$clave = str_replace("'","\'",$password);
	//Verificar que el usuario y la clave existen
	//Si existen verificar que la clave no haya caducado
	$usuarios = new Usuario();
	if($usuarios->existUsuario($_POST["login"],$_POST["password"])){
		
		//Verificar si la clave se encuentra bloqueada.
		if($usuarios->getIntentos() >= 3 || $usuarios->getEstado()==2)
			$mensaje = $MSJ_USER_INACTIVE;
		else{
			//Verificar si la clave del usuario a caducado
			if($usuarios->getCaducidad() < date("Y-n-d") && 0==1)
				$mensaje = "Su clave ha caducado.<br>Por favor comuniquese con el administrador.";
			else{

				//Verificar si debe cambiar la clave (Pendiente nueva versi�n)
				//Crear variables de sesion, s_usuario y s_id_perfil

				$s_usuario = $usuarios->getID();
				$s_id_perfil = $usuarios->getId_perfil();
							
				$s_nombre_usuario = $usuarios->getNombresUser($usuarios->getID(),$usuarios->getId_tabla_relacion());
				$s_esadmin = $usuarios->getAdministrador();
				$s_sesionid = session_id();

				$_SESSION['s_usuario']=$s_usuario;
			    $_SESSION['s_id_perfil']=$s_id_perfil;
			    $_SESSION['s_sesionid']=$s_sesionid ;
			    $_SESSION['s_nombre_usuario']=$s_nombre_usuario;
			    $_SESSION['s_esadmin']=$s_esadmin;
			    
				//GUARDAMOS REGISTRO DE AUDITORIA
				creaRegistroAuditoria("Ingresa al sistema");

				//Guardar el identificador de la sesi�n en la base de datos
				$usuarios->setSesion($s_sesionid);
				$usuarios->updateSesion();

				$usuarios->Destroy();

				print "<html><script>window.location='index.php';</script></html>";
				exit;

			}
		}
	}
	else{
		//Adcionar un n�mero de intento al usuario
		$usuarios->incrementarIntentos($login);
		$mensaje = "El usuario o la clave son invalidos.";
	}
	$usuarios->Destroy();
}
//Destruir la sesi�n
session_destroy();
?>

<script language="JavaScript">
<!--
function recordar_clave()
{
 if(document.forma.login.value=="")
    {
	 alert("Debe ingresar el Nombre del Usuario");
	}
 else
    {
	 document.forma.accion.value = "recordar_clave";
	 alert("La clave ser� enviada a su correo electronico.");
	 document.forma.submit();
	}
}
//-->
</script>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
		<div style="padding-top: 100px">
			<form method="post" action="login.php" name="forma" onsubmit="return validarForma(this);">
				<table border="0" cellpadding="0" cellspacing="0" align="center">
					<tr>
						<td><img name="left" src="../images/tpl/left.png" width="17" height="237" border="0" id="left" alt="" /></td>
						<td style="width: 344px; height: 237px; background: url(../images/tpl/center.png)">
						<table cellspacing="2" cellpadding="2" border="0" align="center" width="344px" class="background11">
							<tbody>
								<tr>
									<td class="text_naranja" align="center" colspan="2"><?
											if(isset($mensaje) && $mensaje != '')
							  				print "$mensaje\n";
							  			?>&nbsp;</td>
								</tr>
								<tr>
									<td class="font_login"><?=$USUARIO?>:</td>
									<td>
										<?$c_textbox = new Textbox;
									  print $c_textbox->Textbox ("login", "Usuario", 1, "", "text_login", 35, 50, "", "");?>
									
									</td>
								</tr>
								<tr>
									<td class="font_login"><?=$PASSWORD?>:</td>
									<td>
									<input type="password" size="35" class="text_login" value="" name="password">
									</td>
								</tr>
								<tr>
									<td>&nbsp;</td>
								</tr>
								<tr align="center">
									<td colspan="2">
									<input type="submit" class="button_login " value="Entrar" name="Submit">
									</td>
								</tr>
							</tbody>
						</table></td>
						<td><img name="right" src="../images/tpl/right.png" width="17" height="237" border="0" id="right" alt="" /></td>
						<td><img src="spacer.gif" width="1" height="237" border="0" alt="" /></td>
					</tr>
				</table>
				<input type="hidden" name="accion" value="validar">
			</form>
		</div>
		<div class="foot_login">
		Desarrollado por snicol.com<br />
		Copyright &copy; 2011 Guards & Angels. All rights reserved.
	</div>
<?php
	include("includes/general/pie.php");
?>



