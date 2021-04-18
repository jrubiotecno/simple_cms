<?php
/***********************************************************************************/
/**
'Descripci�n: Archivo que edita o crea un nuevo permiso de un perfil
'Fecha de creaci�n: Diciembre 15 de 2003
/************************************************************************************/

//Crear objetos para el manejo de perfiles y permisos
$v_permisos = new AdminPermisos();

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

    		echo "<td colspan='2'>";


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
          <td colspan="2" height="30" class="textolink">
            <form method="post" action="control_perfiles.php" name="forma" onsubmit="return validarForma(this);">
              <input type="hidden" name="accion" value="actualizar_permisos_tabla">
              <input type="hidden" name="id_perfil" value="<?=$id_perfil?>">
              <input type="hidden" name="tabla" value="<?=$tabla?>">
              <table width="300" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                  <td>
                    <table width=100% border=0 cellspacing=0 cellpadding=0 align=center>

                      <tr  class=contenido>
                        <td class="font8"><b><?=$TITULO_TABLA?> *&nbsp;&nbsp;:</b></td>
                        <td class="font8"><?print $tabla;?></td>
                      </tr>
					  <tr><td>&nbsp;</td></tr>
                      <tr class=contenido>
                        <td class="font8"><b><?=$TITULO_PERMISOS?> *&nbsp;&nbsp;:</b></td>
                        <td class="font8">
							  <?
							  	 //Cargar el listado de valores de los permisos.
								 $list_permisos = $v_permisos->findbyPerfilTabla($id_perfil,$tabla);
								 $sentencia = "";
								 //Se crea el arreglo con los valores de los permisos para poder seleccionar
								 //los permisos que ya tiene el perfil para la tabla
								 while($permiso = $list_permisos->next_entry()){
								 	if(!strlen($sentencia))
										$sentencia .= "\"" . $permiso->getIdAccion() . "\" => \"" . $permiso->getIdAccion() . "\"";
									else
										$sentencia .= ",\"" . $permiso->getIdAccion() . "\" => \"" . $permiso->getIdAccion() . "\"";
								 }
								 $sentencia = "\$arreglo = array(" . $sentencia . ");";
								 //SE ejecuta la sentencia que crea el arreglo
								 eval($sentencia);

							  	 //Mostrar el listado de permisos
								 $datasource = new ADODB;
								 $c_checkbox = new Checkbox("lista_permiso","Permisos", $datasource, "SELECT id_tipo,nombre_tipo FROM admin_tipo_permiso ORDER BY id_tipo", 1,$arreglo, 1, "textfields", 0);
			             		  while($tmp_html = $c_checkbox->next_entry()) {
									print $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."<br>";
								  }
  								  $datasource->close();
					          ?>
		  				</td>
                      </tr>
					  <tr><td>&nbsp;</td></tr>
					  <tr>
						<td colspan="2" class="font7" align="center">
						  <?=$MSJ_CAMPOS_OBLIGATORIOS?>
						</td>
					  </tr>
                      <tr>
                        <td align="center" colspan="2" height="30">
                          <input type="Submit" name='enviar' value='<?=$INSERTAR_BOTON?>' class="buttons">
                          <input type="button" name="cancelar" value="<?=$CANCEL?>" class="buttons" onClick="javascript:details('control_perfiles','edit','<?=$id_perfil?>','');">
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </form>
          </td>
        </tr>
</table>
<?php

	include ("includes/general/pie.php");

	//Destruir objetos
	$v_permisos->Destroy();
?>