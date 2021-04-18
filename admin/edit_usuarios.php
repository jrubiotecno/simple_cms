<?php

/***********************************************************************************/
/**
'Descripción: Archivo que edita o crea un nuevo usuario
'Fecha de creación: Diciembre 15 de 2003
/************************************************************************************/

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

     <table width="94%" border="0" cellspacing="0" cellpadding="0" align="center">
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
				<form name="forma" method="post" action="control_usuarios.php" enctype="multipart/form-data" onsubmit="return validarForma(this);">
					<input type="hidden" name="id" value="<?=$_POST['id']?>">
					<input type="hidden" name="perfil" value="<?=$usuarios->getId_perfil()?>">

					<input type="hidden" name="accion" value="save">
					<table width="450" border="0" cellspacing="0" cellpadding="0" align="center">
						<tr class="font8">
						  <td colspan="3" align="center"> <br>

							<table width="100%" border="0" cellspacing="1" cellpadding="0">
							  <tr>
								<td colspan="2" class="font7" align="center">
								 <?=$MSJ_CAMPOS_OBLIGATORIOS?>
								 <br><br>
								</td>
							  </tr>
							  <?php

								//TRAEMOS LOS DATOS DE LA RELACION DEL USUARIO
								$arrExisteRelacionTabla = $usuarios->traeRelacion();
								if ($arrExisteRelacionTabla['hayRelacion']){
									echo "<tr>";
								  	echo "<td class='font8' width='30%'><b>* ".$TITULO_RELACION_USUARIO."</b></td>";
								  	echo "<td class='font8' width='70%'>";
									$datasource = new ADODB;

									$strSQL = $arrExisteRelacionTabla['sql'];

									$c_select = new Select("id_tabla_relacion",$TITULO_RELACION_USUARIO, $datasource, $strSQL, $requerido, $usuarios->getId_tabla_relacion(), "textfields", 0, "", "", 0);
									$c_select->enableBlankOption();
									echo $c_select->genCode();

									//DETERMINA SI ESTA ACTUALIZANDO EL REGISTRO PARA NO PEDIR
									//NI ACTUALIZAR EL USUARIO RELACION
									if (!$requerido)
										echo "<script>document.forma.id_tabla_relacion.disabled=true;</script>";

									echo "</td>";
								  	echo "</tr>";
								}
								else{

								  echo "<tr>";
								  echo "<td class='font8' width='30%'><b>* ".$TITULO_NOMBRE_USUARIO."</b></td>";
								  echo "<td class='font8' width='70%'>";
								  echo $c_textbox->Textbox ("nombre", $TITULO_NOMBRE_USUARIO, 1, $usuarios->getNombre(), "textfields", 35, 150, "", "");
								  echo "</td>";
								  echo "</tr>";
								  echo "<tr>";
								  echo "<td class='font8' ><b>* ".$TITULO_APELLIDO_USUARIO."</b></td>";
								  echo "<td class='font8' >";
								  echo $c_textbox->Textbox ("apellido", $TITULO_APELLIDO_USUARIO, 1, $usuarios->getApellido(), "textfields", 35, 150, "", "");
								  echo "</td>";
								  echo "</tr>";
								  echo "<tr>";
								  echo "<td class='font8' ><b>* ".$TITULO_EMAIL_USUARIO."</b></td>";
								  echo "<td class='font8' >";
								  echo $c_email->Email("email",$TITULO_EMAIL_USUARIO, 1, $usuarios->getEmail(), "textfields", 35, 80, "", "", "");
								  echo "</td>";
								  echo "</tr>";
								}

							  ?>
							  <tr>
								<td class="font8" ><b>* <?=$TITULO_USUARIOS_LOGIN?></b></td>
								<td class="font8" >
								  <?php
								  	echo $c_textbox->Textbox ("usuario",$TITULO_USUARIOS_LOGIN, 1, $usuarios->getUsuario(), "textfields", 35, 50, "", "");?>
								</td>
							  </tr>
							  <tr>
								<td class="font8" ><b>* <?=$TITULO_CADUCIDAD_CLAVE_USUARIO?></b></td>
								<td class="font8" >
								<?php
								    $c_datebox->DateBox("caducidad",$TITULO_CADUCIDAD_CLAVE_USUARIO, 1, $usuarios->getCaducidad(), "textfields", 13, 13, "", 1);
									echo $c_datebox->genTextbox();
									echo "&nbsp;".$c_datebox->genCalendar();
								 ?>
								</td>
							  </tr>

						      <?php
							  if (!$_SESSION['TRABAJA_PERFILES_USUARIO']){
							  ?>
							  <tr>
								<td class="font8" ><b>* <?=$TITULO_PERFIL_USUARIO?></b></td>
								<td class="font8" >
								 <?php
								 	$datasource = new ADODB;
									$c_select = new Select("perfil",$TITULO_PERFIL_USUARIO, $datasource, "SELECT id_perfil,perfil FROM admin_perfiles ORDER BY id_perfil ASC", 0, $usuarios->getId_perfil(), "textfields", 0, "", "", 0);
									$c_select->enableBlankOption();
									echo $c_select->genCode();
									echo "&nbsp;<a href=\"javascript:details('control_perfiles','edit','". $usuarios->getId_perfil() ."','');\" class='links2'>Ver Perfil</a>&nbsp;";

								 ?>
								</td>
							  </tr>
							  <?}?>

							  <?php
							  if ($_SESSION['TRABAJA_PERFILES_USUARIO']){
							  ?>
							  <tr>
								<td class="font8" ><b>* <?=$TITULO_ROL_USUARIO?></b></td>
								<td class="font8" >
								 <?php
									$datasource = new ADODB;
									$c_select = new Select("rol",$TITULO_ROL_USUARIO, $datasource, "SELECT id_rol,rol FROM admin_roles WHERE estado=1 ORDER BY id_rol ASC", 1, $usuarios->getId_rol(), "textfields", 0, "", "", 0);
									$c_select->enableBlankOption();
									echo $c_select->genCode();

								 ?>
								</td>
							  </tr>
							  <?}?>


							  <tr>
								<td class="font8"><b>* <?=$TITULO_ES_ADMINISTRADOR?></b></td>
								<td class="font8" >
								<?php

								  $arr_SINO = array("1"=>"Yes","-1"=>"No");
								  $c_radio2 = new Radio("es_administrador",$TITULO_ES_ADMINISTRADOR,$arr_SINO,"", 1, $usuarios->getAdministrador(), "textfields", 0);
								  while($tmp_html = $c_radio2->next_entry()) {
									echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."&nbsp;&nbsp;";
								  }
								?>
								</td>
							  </tr>

							  <!--
							  //CAMPO SUPERUSUARIO NO IMPLEMENTADO
							  <tr>
								<td class="font8"><b>* <?=$TITULO_SUPERUSUARIO?></b></td>
								<td class="font8" >
								<?php

								  $arr_SINO = array("1"=>"Si","-1"=>"No");
								  $c_radio2 = new Radio("superusuario",$TITULO_SUPERUSUARIO,$arr_SINO,"", 1, "", "textfields", 0);
								  while($tmp_html = $c_radio2->next_entry()) {
									echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."&nbsp;&nbsp;";
								  }
								?>
								</td>
							  </tr>
							  !-->

							  <tr>
								<td class="font8"><b>* <?=$TITULO_ESTADO_USUARIO?></b></td>
								<td class="font8" >
								<?php

								  $datasource = new ADODB;
								  $c_radio = new Radio("estado",$TITULO_ESTADO_USUARIO,$datasource,"SELECT * FROM admin_estado", 1, $usuarios->getEstado(), "textfields", 0);
								  while($tmp_html = $c_radio->next_entry()) {
									echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."&nbsp;&nbsp;";
								  }
								?>
								</td>
							  </tr>
							  <tr><td colspan="2">&nbsp;</td></tr>
							  <tr>
								<td class="font8" ><b><?=$TITULO_PASS_USUARIO?></b></td>
								<td class="font8" >
								  <?php
									echo $c_password->Password ("clave",$TITULO_PASS_USUARIO, $requerido, "", "textfields", 20, 8, "", "");?>
								</td>
							  </tr>
							  <tr>
								<td class="font8" ><b><?=$TITULO_CONFIRM_PASS_USUARIO?></b></td>
								<td class="font8">
								<?php
									echo $c_passwordConfirm->PasswordConfirm ("clavec",$TITULO_CONFIRM_PASS_USUARIO, "clave" , $requerido, "", "textfields", 20, 8, "", "");?>
								</td>
							  </tr>

							</table>
						  </td>
						</tr>
						<tr>
						  <td colspan="3">&nbsp;</td>
						</tr>
						<tr>
						  <td colspan="3">
							<div align="center">
							  <input type="Submit" name='enviar' value='<?=$INSERTAR_BOTON?>' class="buttons">
							  <input type="button" name="cancelar" value="<?=$CANCEL?>" class="buttons" onClick="javascript:details('control_usuarios','','','');">
							</div>
						  </td>
						</tr>
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


