<?php
/***********************************************************************************/
/**
'Descripción: Archivo que edita o crea un nuevo permiso de un perfil
'Fecha de creación: Diciembre 15 de 2003
/************************************************************************************/

//Crear objetos para el manejo de perfiles y permisos
$v_perfiles = new Perfil();
$v_modulos = new AdminMenu();
$v_permisos = new AdminPermisos();
$v_tipos = new AdminTipoPermiso();

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
        <tr align="center">
          <td colspan="3" height="30" align="center">
              <table width="581" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
                      <tr>
                        <td class="subtitulo" colspan="2"> <br>
                          <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
                            <tr>
                              <td colspan="3" class="titletable" align="center"><b><?=$TITULO_INFO_BASICA?></b></td>
                            </tr>
                            <tr>
                              <td colspan="2" class="font8" height="30"><b><?=$TITULO_NOMBRE_PERFIL?>:</b>
                              <span id="nombrePerfil">
							  <?php

								//***  Mostrar datos del perfil
							   	//Buscar el perfil seleccionado por el usuario
                               	$v_perfiles->findbyPrimaryKey($id_perfil);
							   	echo $v_perfiles->getPerfil();
                              ?>
                              </span>
							</td>
                              <td width="203" class="font8"><a href="javascript:editPerfil(false);" class="links2"><?=$TITULO_NOMBRE_CAMBIAR?></a></td>
                            </tr>
                            <tr>
                              <td colspan="2" class="font8" height="20">&nbsp;</td>
                              <td width="203" class="font8">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="3" class="titletable" align="center"><b><?=$TITULO_PERMISOS_ACTUALES?></b></td>
                            </tr>
                            <tr>
                              <td colspan="3"><br>
                                <table width="600" border="0" cellspacing="1" cellpadding="1" id="permisos_t">
                                  <tr>
                                    <td width="25%" align="center" class="titlecolumns"><b><?=$TITULO_TABLA?></b></td>
                                    <td width="55%" align="center" class="titlecolumns"><b><?=$TITULO_PERMISOS?></b></td>
                                    <td width="20%" align="center" colspan="4" class="titlecolumns"><b><?=$TITULO_OPCIONES?></b></td>
                                  </tr>
                                  <?

								  $list_permisos = $v_permisos->findByPerfil($id_perfil);
                                  if ($list_permisos->num_results() > 0 )
                                  {
                                    while($permiso = $list_permisos->next_entry()){
                                      echo("<tr class='contenido'><td height=30 class='font8' width='25%'>" . $permiso->getidModulo() . "</td><td height=30 width='55%' class='font8'>&nbsp;");
									  //Obtener el listado de permisos sobre la tabla
									  $list_tipos = $v_tipos->buscarPorTablaPerfilNPer($permiso->getidModulo(),$id_perfil);
									  //Mostrar los permisos
									  $permisos_imp = "";
                                      while($tipo = $list_tipos->next_entry()){
									    if(strlen($permisos_imp))
                                       	 $permisos_imp .=  " - " . $tipo->getNombre();
										else
										 $permisos_imp .= $tipo->getNombre();
									  }
									  echo $permisos_imp;
									  if($P_TIPO_LINK == "icono"){
										echo "<td align='center' width='10%'><a href=\"javascript:details('control_perfiles','edit_permisos_tabla','". $id_perfil ."','" . $permiso->getidModulo() . "');\" class='$links'><img src=\"../images/$P_IMAGEN_EDITAR\" border=\"0\" alt=\"Editar\"></a></td>";
										echo "<td align='center' width='10%'><a href=\"javascript:details('control_perfiles','delete_permiso','". $id_perfil ."','" . $permiso->getidModulo() . "');\" class='$link'><img src=\"../images/$P_IMAGEN_BORRAR\" border=\"0\" alt=\"Borrar\"></a></td>";
									  }
									  else if($P_TIPO_LINK == "texto"){
										echo "<td align='center' width='10%'><a href=\"javascript:quehacer(". $id_perfil .",'editar','" . $permiso->getidModulo() ."');\" class='links2'>Editar</a></td>";
										echo "<td align='center' width='10%'><a href=\"javascript:details('control_perfiles','delete_permiso','". $id_perfil ."','" . $permiso->getidModulo() . "');\" class='links2'>Borrar</a></td>";
									  }
                                    }
                                  }
                                  else
                                  {
                                    echo("<tr><td colspan=4 class='title8' height=30>No hay permisos creados</td></tr>");
                                  }
                                  ?>
                                </table>
						    	<br>
                              </td>
                            </tr>
                            <tr>
                              <td colspan="3" bgcolor="<?echo $color_corpo1;?>"><img src="../../../images/spacer_3x3.gif" width="3" height="3"></td>
                            </tr>
                            <tr>
                              <td colspan="3" bgcolor="<?echo $color_corpo1;?>"><img src="../../../images/spacer_3x3.gif" width="3" height="3"></td>
                            </tr>
                            <tr>
								<td colspan="3" class="titletable" align="center"><b><?=$TITULO_ADICIONAR_PERMISOS?>
								  </b></td>
                            </tr>
                            <tr>
                              <td colspan="3">

                                <form method="post" action="control_perfiles.php" name="forma" onsubmit="return validarForma(this);">
								<input type="hidden" id="id_perfil" name="id" value="<?=$id_perfil?>">
			  					<input type="hidden" name="accion" value="save">
                                <table width=100% border=0 cellspacing=0 cellpadding=0 align=center>
                                  <tr  class=contenido>
                                    <td height="30" width="23%" class="font8"><?=$TITULO_TABLA?> *&nbsp;&nbsp;:</td>
                                    <td width="3%">&nbsp; </td>
                                    <td width="74%" class="font8">
                                  	<?php
								  		//Mostrar el listado de tablas
										$c_select = new Select("nombre_tabla", "Tabla", $db, "SELECT nombre_tabla,descripcion FROM admin_menu WHERE nombre_tabla NOT IN (SELECT nombre_tabla FROM admin_permisos WHERE id_perfil='".$id_perfil."')", 1, "", "textfields", 0, "", "", 0);
										$c_select->enableBlankOption();

										echo $c_select->genCode();

										$list_modulos = $v_modulos->findAll();
									?>
                                    </td>
                                  </tr>
								  <tr><td>&nbsp;</td></tr>
                                  <tr  class="font8">
                                    <td height="30" width="23%" class="font8"><?=$TITULO_PERMISOS?> *&nbsp;&nbsp;:</td>
                                    <td width="3%">&nbsp; </td>
                                    <td width="74%" class="font8">
									<?php
										//Mostrar el listado de permisos existentes
										
										$datasource = new ADODB;
										
									  	$c_checkbox = new Checkbox("lista_permiso","Permisos", $datasource, "SELECT id_tipo,nombre_tipo FROM admin_tipo_permiso ORDER BY id_tipo", 1,"", 1, "textfields", 0);

				             		  	while($tmp_html = $c_checkbox->next_entry())
											echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."<br>";

	  								  	$datasource->close();
								  ?>
								    </td>
                                  </tr>
								  <tr><td>&nbsp;</td></tr>
								  <tr>
									<td colspan="3" class="font7" align="center">
									  <?=$MSJ_CAMPOS_OBLIGATORIOS?>
									</td>
								  </tr>
                                  <tr height=100 valign=middle>
                                    <td align=center colspan="3" height="30">
                                      <input type="Submit" name='enviar' value='<?=$INSERTAR_BOTON?>' class="buttons">
                                      <input type="button" name="cancelar" value="<?=$CANCEL?>" class="buttons" onClick="javascript:details('control_usuarios','','','');">
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
                  </td>
                </tr>
              </table>
			<br>
          </td>
        </tr>
</table>
<?php

	include ("includes/general/pie.php");

	//Destruir objetos
	$v_perfiles->Destroy();
	$v_modulos->Destroy();
	$v_permisos->Destroy();
	$v_tipos->Destroy();
?>