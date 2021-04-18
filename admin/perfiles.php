<?php

/***********************************************************************************/
/**
'Descripción: Archivo que muestra el listado de usuarios existentes en el sistema
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

     <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr align="center" valign="top">
		  <?php

    		echo "<td colspan='3'>";

			$strTablaDatos .= "<table width='100%' cellpadding='0' align='center' border=0  cellspacing='0'>\n";
			$strTablaDatos .= "<tr><td class='titletable' height='33'>&nbsp;<b>".$TITULO_ADMINISTRAR. " " . $TITULO_PERFILES . "</b></td></tr>\n";
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

						  	if($P_TIPO_LINK == "icono")
								echo "<td colspan=\"3\"><a href=\"javascript:editPerfil(true);\" class=\"links2\"><img src=\"../images/".$P_IMAGEN_INSERTAR."\" border=\"0\" alt=\"".$GUARDAR_CREAR."\"></a></td>";
						    else
								echo "<td colspan=\"3\"><a href=\"javascript:editPerfil(true);\" class=\"links2\"><b>".$GUARDAR_CREAR."</b></a></td>";

						  ?>
						</tr>
						<tr><td>&nbsp;</td></tr>

						<?php

						  if(!$pagina) $pagina = 1;

						  //TRAE LA LISTA DE PERFILES
						  $list_perfiles = $perfiles->findAll("","",$pagina,$P_NUM_RESULTS*4);

						  if ($list_perfiles->num_results() > 0 ){
							echo "<tr class='title7'>";
							echo "<td align='left'>Page ".$pagina." of ".$list_perfiles->num_pages()."</td>";
							echo "<td align='right' colspan='3'>Total: ".$list_perfiles->num_results()."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td colspan='2' width='50%' align='center' class='titlecolumns'><b>".$TITULO_OPCIONES."</b>";
							echo "<td width='50%' class='titlecolumns' align='center'><b>".$TITULO_PERFILES."</b></td>";
							echo "</td>";
							echo "</tr>";

							//RECORRE EL LISTADO DE PERFILES
							while($perfil = $list_perfiles->next_entry()){
							  echo "<tr>";
							  if($P_TIPO_LINK == "icono"){
								echo "<td align='center' width=25%><a href=\"javascript:details('control_perfiles','edit','". $perfil->getIdPerfil() ."','');\" class='links2'><img src=\"../images/$P_IMAGEN_EDITAR\" border=\"0\" alt=\"".$TITLE_EDITAR."\"></a></td>";
								echo "<td align='center' width=25%><a href=\"javascript:details('control_perfiles','delete_perfil','". $perfil->getIdPerfil() ."','');\" class='links2'><img src=\"../images/$P_IMAGEN_BORRAR\" border=\"0\" alt=\"".$TITLE_BORRAR."\"></a></td>";
							  }
							  else if($P_TIPO_LINK == "texto"){
								echo "<td align='center' width=25%><a href=\"javascript:details('control_perfiles','edit','". $perfil->getIdPerfil() ."','');\" class='links2'>".$TITLE_EDITAR."</a></td>";
								echo "<td align='center' width=25%><a href=\"javascript:details('control_perfiles','delete_perfil','". $perfil->getIdPerfil() ."','');\" class='links2'>".$TITLE_BORRAR."</a></td>";
							  }
							  echo "<td width=50% height=30 class='font8'>" . $perfil->getPerfil() . "</td>";
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


