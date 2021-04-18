<?php

/***********************************************************************************/
/**
'Descripci�n: Archivo que muestra el listado de usuarios existentes en el sistema
'Fecha de creaci�n: Diciembre 15 de 2003
/************************************************************************************/

//$db->query("INSERT INTO admin_auditoria VALUES ('',NOW(),'$s_usuario','Consulta de Usuarios')");
?>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td class="textos" >

     <?php
     	include("includes/general/encabezado.php");
     ?>

    </td>
  </tr>
  <tr>
     <td>

     <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr align="center" valign="top">
		  <?php

			echo "<td colspan='3'>";

			$strTablaDatos .= "<table width='100%' cellpadding='0' align='center' border=0  cellspacing='0'>\n";
			$strTablaDatos .= "<tr><td class='titletable' height='33'>&nbsp;<b>".$TITULO_ADMINISTRAR. " " . $TITULO_USUARIOS . "</b></td></tr>\n";
			$strTablaDatos .= "</table>\n";
			$strTablaDatos .= "<table width='100%' celspace='2' align='center' border=0>\n";

			$strTablaDatos .= "<tr><td></td></tr>";
			$strTablaDatos .= "<tr><td></td></tr>";
			$strTablaDatos .= "</table>";

			//SE IMPRIME LOS DATOS INICIALES
			echo $strTablaDatos;


			echo "</td>";

	      ?>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td colspan="2" align="center">
				<form name="forma_archivos" method="post" action="control_ventas.php" enctype="multipart/form-data" onsubmit="return validarForma(this);">
					<table width="450" border="0" cellspacing="1" cellpadding="1" align="center" id="tabla">
						<tr>
						  <?php

						  	if($P_TIPO_LINK == "icono"){
								echo "<td colspan=\"3\">&nbsp;&nbsp;<a href=\"javascript:details('control_usuarios','edit','0','');\" class=\"links2\"><img src=\"../images/".$P_IMAGEN_INSERTAR."\" border=\"0\" alt=\"".$GUARDAR_CREAR."\" valign=\"middle\">Nuevo Usuario</a>";
								if (!$_SESSION['TRABAJA_PERFILES_USUARIO']){
									echo "&nbsp;<a href=\"javascript:details('control_perfiles','lista','','');\" class=\"links2\">Ver Perfiles</a>";
								}
								echo "</td>";
							}

						  ?>
						</tr>
						<tr>
							<td colspan="4" align="center" class="title7"><br /><br /><center><b>Filtrar usuarios activos:</b>
							<?php

								//TRAEMOS LA CIUDADES
								$c_selectEstados = new Select;
								$c_selectEstados->enableBlankOption(":: Todos ::");
								$c_selectEstados->Select("tipo_usuarios","state",$db,"SELECT admin_estado.id_estado, admin_estado.estado FROM admin_estado",0,$_POST['option'],"textfields","","","details('control_usuarios','lista','0',this.value);");
								echo $c_selectEstados->genCode();
							?>
							</center><br /><br />
							</td>
						</tr>

						<?php

						  if(!$pagina) $pagina = 1;



						  //TRAE LA LISTA DE USURIOS

						  //DETERMINA SI SE CARGA LOS USUARIOS INACTIVOS O ACTIVOS
						  $tipoUsuarios = 1;
						  if ($_POST['option'])
						  	$tipoUsuarios = $_POST['option'];

						  $strSQL = "SELECT * FROM admin_usuarios WHERE estado='".$tipoUsuarios."'";

						  //REVISA OPCIONES DE ORDENAR
						  $orderBy="";
						  $orderDirection = "";
						  if ($_POST['id']){
								$orderBy = $_POST['id'];
								$orderDirection = $_POST['campo'];
						  }

						  $list_usuarios = $usuarios->findSQL($strSQL,$orderBy,$orderDirection,$pagina,$P_NUM_RESULTS);


						  if ($list_usuarios->num_results() > 0 ){
							echo "<tr class='title7'>";
							echo "<td align='left' >Pagina ".$pagina." de ".$list_usuarios->num_pages()."</td>";
							echo "<td align='right' colspan='3'>Total: ".$list_usuarios->num_results()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td colspan='2' width='50%' align='center' class='titlecolumns'><b>".$TITULO_OPCIONES."</b>";
							echo "<td width='25%' class='titlecolumns' align='center'><b>".$TITULO_USUARIOS_LISTA."</b>&nbsp;<a href=\"javascript:detailsAdmin('control_usuarios','lista','','nombre','ASC','".$_POST['option']."');\"><img src='../images/up.gif' border='0'></a>&nbsp;<a href=\"javascript:detailsAdmin('control_usuarios','lista','','nombre','DESC','".$_POST['option']."');\"><img src='../images/down.gif' border='0'></td>";
							echo "<td width='25%' class='titlecolumns' align='center'><b>".$TITULO_USUARIOS_LOGIN."</b>&nbsp;<a href=\"javascript:detailsAdmin('control_usuarios','lista','','usuario','ASC','".$_POST['option']."');\"><img src='../images/up.gif' border='0'></a>&nbsp;<a href=\"javascript:detailsAdmin('control_usuarios','lista','','usuario','DESC','".$_POST['option']."');\"><img src='../images/down.gif' border='0'></td>";
							echo "</td>";
							echo "</tr>";

							//RECORRE EL LISTADO DE USUARIOS
							while($usuario = $list_usuarios->next_entry()){
							  echo "<tr class='fila_datos'>";
							  echo "<td align='center' colspan='2'>";
							  if($P_TIPO_LINK == "icono"){
								echo "<a href=\"javascript:details('control_usuarios','edit','". $usuario->getID() ."','');\" class='links2'><img src=\"../images/$P_IMAGEN_EDITAR\" border=\"0\" alt=\"".$TITLE_EDITAR."\"> Edit</a>&nbsp;";

								if ($_SESSION['TRABAJA_PERFILES_USUARIO']){
									echo "<a href=\"javascript:details('control_perfiles','edit','". $usuario->getId_perfil() ."','');\" class='links2'>Profile</a>&nbsp;";
								}

								//echo "<a href=\"javascript:details('control_usuarios','delete','". $usuario->getID() ."','');\" class='links2'><img src=\"../images/$P_IMAGEN_BORRAR\" border=\"0\" alt=\"".$TITLE_BORRAR."\"></a>&nbsp;";
							  }
							  else if($P_TIPO_LINK == "texto"){
								echo "<a href=\"javascript:details('control_usuarios','edit','". $usuario->getID() ."','');\" class='links2'>".$TITLE_EDITAR."</a>";
								//echo "<a href=\"javascript:details('control_usuarios','delete','". $usuario->getID() ."','');\" class='links2'>".$TITLE_BORRAR."</a>";
							  }
							  echo "</td>";
							  $strUsuario =  $usuario->getNombresUser($usuario->getID(),$usuario->getId_tabla_relacion());
							  echo "<td width=25% height=30 class='font8'>" . $strUsuario . "</td>";
							  echo "<td width=25% height=30 class='font8' align='center'>" . $usuario->getUsuario() . "</td>";
							}
						  }
						  else
							echo "<tr><td colspan=3 class='title8' height=30>".$TITULO_SIN_DATOS."</td></tr>";

					  ?>
                	</table>
				</form>
			</td>
		</tr>
	 </table>
	 </td>
  </tr>
</table>
<?php
	include ("includes/general/pie.php");
?>


