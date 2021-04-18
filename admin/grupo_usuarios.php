<?php

/***********************************************************************************/
/**
'Descripción: Archivo que edita o crea un nuevo usuario
'Fecha de creación: Diciembre 15 de 2003
/************************************************************************************/

?>
<script language="javascript">

var selectedList;
var availableList;
/*
function createListObjects(){
    availableList = document.getElementById("availableOptions");
    selectedList = document.getElementById("selectedOptions");
}
function delAttribute(){
    var selIndex = selectedList.selectedIndex;
    if(selIndex < 0)
        return;
    availableList.appendChild(selectedList.options.item(selIndex))
    selectNone(selectedList,availableList);
    setSize(availableList,selectedList);
}
function addAttribute(){
    var addIndex = availableList.selectedIndex;
    if(addIndex < 0)
        return;
    selectedList.appendChild(availableList.options.item(addIndex));
    selectNone(selectedList,availableList);
    setSize(selectedList,availableList);
}
function delAll(){
    var len = selectedList.length -1;
    for(i=len; i>=0; i--){
        availableList.appendChild(selectedList.item(i));
    }
    selectNone(selectedList,availableList);
    setSize(selectedList,availableList);

}

function addAll(){
    var len = availableList.length -1;
    for(i=len; i>=0; i--){
        selectedList.appendChild(availableList.item(i));
    }
    selectNone(selectedList,availableList);
    setSize(selectedList,availableList);

}
function selectNone(list1,list2){
    list1.selectedIndex = -1;
    list2.selectedIndex = -1;
    addIndex = -1;
    selIndex = -1;
}
function setSize(list1,list2){
    list1.size = getSize(list1);
    list2.size = getSize(list2);
}
function getSize(list){
    // Mozilla ignores whitespace, IE doesn't - count the elements in the list
    var len = list.childNodes.length;
    var nsLen = 0;
    //nodeType returns 1 for elements
    for(i=0; i<len; i++){
        if(list.childNodes.item(i).nodeType==1)
            nsLen++;
    }
    if(nsLen<2)
        return 2;
    else
        return nsLen;
}
function showSelected(){
    var optionList = document.getElementById("selectedOptions").options;
    var data = '';
    var len = optionList.length;
    for(i=0; i<len; i++){
        if(i>0)
            data += ',';
        data += optionList.item(i).value;
    }
    alert(data);
}
*/
	function onLoadingGrupo(){
		$('loadingDiv').show();
	}

	function onCompleteGrupo(){
		$('loadingDiv').hide();
	}

	function delAll(selOrigen,selDestino,grupo){

		obj1 = $(selOrigen);
		obj2 = $(selDestino);
		usuario = $('id_usuario').getValue();

		var len = obj2.length -1;

		for(i=len; i>=0; i--){


			valor=obj2.item(i).value; // almacenar value
			obj1.appendChild(obj2.item(i));

			var url = "control_usuarios.php";

			var param = {
							parameters:"Ajax=true&accion=del_grupo&grupo="+grupo+"&id_grupo="+valor+"&id="+usuario,
							onLoading:onLoadingGrupo,
							onComplete:onCompleteGrupo

						};

			var peticion = new Ajax.Request(url,param);
		}

	}

	function addAll(selOrigen,selDestino,grupo){

		obj1 = $(selOrigen);
		obj2 = $(selDestino);
		usuario = $('id_usuario').getValue();

		var len = obj1.length -1;
		for(i=len; i>=0; i--){

			valor=obj1.item(i).value; // almacenar value

			obj2.appendChild(obj1.item(i));

			var url = "control_usuarios.php";

			var param = {
							parameters:"Ajax=true&accion=add_grupo&grupo="+grupo+"&id_grupo="+valor+"&id="+usuario,
							onLoading: onLoadingGrupo,
							onComplete: onCompleteGrupo
						};

			var peticion = new Ajax.Request(url,param);

		}

	}

	function addGrupo(selOrigen,selDestino,grupo){

		obj1 = $(selOrigen);
		obj2 = $(selDestino);
		usuario = $('id_usuario').getValue();

		var addIndex = obj1.selectedIndex;
		if(addIndex < 0)
			return;

		valor=obj1.options.item(addIndex).value; // almacenar value
		obj2.appendChild(obj1.options.item(addIndex));

		var url = "control_usuarios.php";

		var param = {
						parameters:"Ajax=true&accion=add_grupo&grupo="+grupo+"&id_grupo="+valor+"&id="+usuario,
						onLoading: onLoadingGrupo,
						onComplete: onCompleteGrupo
					};

		var peticion = new Ajax.Request(url,param);

	}

	function delGrupo(selOrigen,selDestino,grupo){

		obj1 = $(selOrigen);
		obj2 = $(selDestino);
		usuario = $('id_usuario').getValue();

		var selIndex = obj2.selectedIndex;
		if(selIndex < 0)
			return;

		valor=obj2.options.item(selIndex).value; // almacenar value
		obj1.appendChild(obj2.options.item(selIndex));

		var url = "control_usuarios.php";

		var param = {
						parameters:"Ajax=true&accion=del_grupo&grupo="+grupo+"&id_grupo="+valor+"&id="+usuario,
						onLoading:onLoadingGrupo,
						onComplete:onCompleteGrupo

					};

		var peticion = new Ajax.Request(url,param);

	}

	function actualizaPermiso(obj){

		valor_permiso = $(obj.id).getValue();
		usuario = $('id_usuario').getValue();

		if (valor_permiso==null)
			valor_permiso=0;

		var url = "control_usuarios.php";

		var param = {
						parameters:"Ajax=true&accion=update_permisos_especiales&permiso="+obj.name+"&valor_permiso="+valor_permiso+"&id="+usuario,
						onLoading:onLoadingGrupo,
						onComplete:onCompleteGrupo

					};

		var peticion = new Ajax.Request(url,param);

	}

</script>
<style type="text/css">
select {width:200px}
</style>

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
			$strTablaDatos .= "<tr><td class='titletable' height='33'>&nbsp;<b>".$TITULO_ADMINISTRAR. " " . $TITULO_GRUPOS . ": </b></td></tr>\n";
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
				<form name="forma" id="forma" method="post" action="control_usuarios.php" enctype="multipart/form-data" onsubmit="return validarForma(this);">
					<input type="hidden" name="id" id="id_usuario" value="<?=$_POST['id']?>">
					<input type="hidden" name="accion" value="save_grupo">

					<div id="loadingDiv" align="center" style="position:absolute; left:50%; top:50%; display:none;">
              			<img src="../images/loading_trans.gif" alt="Cargando" width="100" height="100" />
            		</div>

					<table width="550" border="0" cellspacing="0" cellpadding="0" align="center">
						<tr class="font8">
						  <td colspan="3" align="center"> <br>
							<?php
								echo "<b>";
								echo $TITULO_USUARIOS.": &nbsp;";
								echo $usuarios->getNombre()." ";
								echo $usuarios->getApellido();
								echo "</b>";
							?>
							<table width="100%" border="0" cellspacing="1" cellpadding="0">

							  <tr>
								<td class="font8" ><b> <?=$TITULO_ADMIN_DISTRIBUIDOR?>: </b></td>
								<td class="font8" >
								  <table width="100%" border='0'>
								  <?php

								  	if ($secDistribuidor){

										echo "<tr>";
										echo "<td>";
										$c_select = new Select("distribuidores",$TITULO_ADMIN_DISTRIBUIDOR, $db, "SELECT DISTINCT distribuidores.id_distribuidor, distribuidores.nombre FROM distribuidores WHERE id_distribuidor NOT IN (".$_SESSION['GRUPO_DISTRIBUIDOR'].") ORDER BY nombre",0, "", "textfields", 1, 10);
										echo $c_select->genCode();
										echo "</td>";
										echo "<td align='center'>";
										echo "<input type='button' value='>>' onclick=\"addAll('__CLista__distribuidores','__CLista__distribuidor_selected','GRUPO_DISTRIBUIDOR');\"><br>";
										echo "<input type='button' value='->' onclick=\"addGrupo('__CLista__distribuidores','__CLista__distribuidor_selected','GRUPO_DISTRIBUIDOR');\"><br>";
										echo "<input type='button' value='<-' onclick=\"delGrupo('__CLista__distribuidores','__CLista__distribuidor_selected','GRUPO_DISTRIBUIDOR');\"><br>";
										echo "<input type='button' value='<<' onclick=\"delAll('__CLista__distribuidores','__CLista__distribuidor_selected','GRUPO_DISTRIBUIDOR');\">";
										echo "</td>";
										echo "<td>";
										$strSQL = "SELECT DISTINCT distribuidores.id_distribuidor, distribuidores.nombre FROM distribuidores  WHERE id_distribuidor IN (".$_SESSION['GRUPO_DISTRIBUIDOR'].") ORDER BY nombre";
										$c_select = new Select("distribuidor_selected",$TITULO_ADMIN_DISTRIBUIDOR, $db, $strSQL,0, "", "textfields", 1, 10);
										echo $c_select->genCode();
										echo "</td>";
										echo "</tr>";
									}
									else{
										echo "<tr>";
										echo "<td class='font8' valign='top'>".$MSJ_GRUPOS_ROL."</td>";
										echo "</tr>";
									}
								  ?>

								  </table>
								</td>
							  </tr>
							  <?php
							  if ($secDistribuidor){
							  ?>
								  <tr>
									<td class="font8" >&nbsp;</td>
									<td class="font8" align="center">
										<?php
											echo "<b>".$TITULO_ADMIN_CREAR_CIRCUITO.": </b> &nbsp";
											$c_check = new Checkbox("crea_circuito",$TITULO_ADMIN_CREAR_CIRCUITO, $arrSINO,"",0,$_SESSION['CREA_CIRCUITO'],0,"textfields");
											echo $c_check->genCode(1,"actualizaPermiso(this);");

										?>
									</td>
								  </tr>
							  <?php
						  	  }
							  ?>
							  <tr>
								<td class="font8" colspan="2">&nbsp;</td>
							  </tr>
							  <tr>
								<td class="font8" ><b> <?=$TITULO_ADMIN_EXHIBIDOR?>: </b></td>
								<td class="font8" >
									<table width="100%" border='0'>

									  <?php

										if ($secExhibidorMultiplex){
											echo "<tr>";
											echo "<td>";
											$c_select = new Select("exhibidor",$TITULO_ADMIN_EXHIBIDOR, $db, "SELECT DISTINCT exhibidores.id_exhibidor, exhibidores.exhibidor FROM exhibidores WHERE id_exhibidor NOT IN (".$_SESSION['GRUPO_EXHIBIDOR'].") ORDER BY exhibidor",0,"", "textfields", 1, 10);
											echo $c_select->genCode();
											echo "</td>";
											echo "<td align='center'>";
											echo "<input type='button' value='>>' onclick=\"addAll('__CLista__exhibidor','__CLista__exhibidor_selected','GRUPO_EXHIBIDOR');\"><br>";
											echo "<input type='button' value='->' onclick=\"addGrupo('__CLista__exhibidor','__CLista__exhibidor_selected','GRUPO_EXHIBIDOR');\"><br>";
											echo "<input type='button' value='<-' onclick=\"delGrupo('__CLista__exhibidor','__CLista__exhibidor_selected','GRUPO_EXHIBIDOR');\"><br>";
											echo "<input type='button' value='<<' onclick=\"delAll('__CLista__exhibidor','__CLista__exhibidor_selected','GRUPO_EXHIBIDOR');\">";
											echo "</td>";
											echo "<td>";
											$strSQL = "SELECT DISTINCT exhibidores.id_exhibidor, exhibidores.exhibidor FROM exhibidores WHERE id_exhibidor IN (".$_SESSION['GRUPO_EXHIBIDOR'].") ORDER BY exhibidor";
											$c_select = new Select("exhibidor_selected",$TITULO_ADMIN_EXHIBIDOR, $db, $strSQL,0,"", "textfields", 1, 10);
											echo $c_select->genCode();
											echo "</td>";
											echo "</tr>";
										}
										else{
											echo "<tr>";
											echo "<td class='font8' valign='top'> ".$MSJ_GRUPOS_ROL."</td>";
											echo "</tr>";
										}
									  ?>
								  	</table>
								</td>
							  </tr>

							  <tr>
								<td class="font8" ><b> <?=$TITULO_ADMIN_MULTIPLEX?>: </b></td>
								<td class="font8" ><br>
									<?php
										if ($secExhibidorMultiplex){
									?>
										<b>
											<a href="javascript:details('control_usuarios','edit_grupo','<?=$_POST['id']?>','');">Refresh multiplex relation</a>
										</b>
									<?php
										}
									?>
									<table width="100%" border='0'>
									  <?php
										if ($secExhibidorMultiplex){
											echo "<tr>";
											echo "<td>";
											$c_select = new Select("multiplex",$TITULO_ADMIN_MULTIPLEX, $db, "SELECT DISTINCT multiplex.id_multiplex, multiplex.multiplex FROM multiplex WHERE id_multiplex NOT IN (".$_SESSION['GRUPO_MULTIPLEX'].") AND id_exhibidor IN (".$_SESSION['GRUPO_EXHIBIDOR'].") ORDER BY multiplex",0,"", "textfields", 1, 10);
											echo $c_select->genCode();
											echo "</td>";
											echo "<td align='center'>";
											echo "<input type='button' value='>>' onclick=\"addAll('__CLista__multiplex','__CLista__multiplex_selected','GRUPO_MULTIPLEX');\"><br>";
											echo "<input type='button' value='->' onclick=\"addGrupo('__CLista__multiplex','__CLista__multiplex_selected','GRUPO_MULTIPLEX');\"><br>";
											echo "<input type='button' value='<-' onclick=\"delGrupo('__CLista__multiplex','__CLista__multiplex_selected','GRUPO_MULTIPLEX');\"><br>";
											echo "<input type='button' value='<<' onclick=\"delAll('__CLista__multiplex','__CLista__multiplex_selected','GRUPO_MULTIPLEX');\">";
											echo "</td>";
											echo "<td>";
											$strSQL = "SELECT DISTINCT view_multiplex_exhibidor.id_multiplex, CONCAT(view_multiplex_exhibidor.multiplex, ' (',view_multiplex_exhibidor.exhibidor,')') FROM view_multiplex_exhibidor WHERE id_multiplex IN (".$_SESSION['GRUPO_MULTIPLEX'].") ORDER BY multiplex";
											$c_select = new Select("multiplex_selected",$TITULO_ADMIN_MULTIPLEX, $db, $strSQL,0,"", "textfields", 1, 10);
											echo $c_select->genCode();
											echo "</td>";
											echo "</tr>";
										}
										else{
											echo "<tr>";
											echo "<td class='font8' valign='top'>".$MSJ_GRUPOS_ROL."</td>";
											echo "</tr>";
										}

									  ?>
								  	</table>
								</td>
							  </tr>
							  <tr>
								<td class="font8" ><b> <?=$TITULO_ADMIN_CARGA_INFO?>: </b></td>
								<td class="font8" >
									<table width="50%" border='0'>
									  <tr>
									  <?php
										$arrSINO = Array(1,0);

										if ($secExhibidorMultiplex){
											echo "<td class='font8'>".$TITULO_ADMIN_EXHIBIDOR;
											$c_check = new Checkbox("carga_info_exhibidor",$TITULO_ADMIN_EXHIBIDOR, $arrSINO,"",0,$_SESSION['CARGA_INFO_EXHIBIDOR'],0,"textfields");
											echo $c_check->genCode(1,"actualizaPermiso(this);");
											echo "</td>";

											echo "<td class='font8'>".$TITULO_ADMIN_MULTIPLEX;
											$c_check = new Checkbox("carga_info_multiplex",$TITULO_ADMIN_MULTIPLEX, $arrSINO,"",0,$_SESSION['CARGA_INFO_MULTIPLEX'],0,"textfields");
											echo $c_check->genCode(1,"actualizaPermiso(this);");
											echo "</td>";
										}

										if ($secDistribuidor){
											echo "<td class='font8'>".$TITULO_ADMIN_DISTRIBUIDOR;
											$c_check = new Checkbox("carga_info_distribuidor",$TITULO_ADMIN_DISTRIBUIDOR, $arrSINO,"",0,$_SESSION['CARGA_INFO_DISTRIBUIDOR'],0,"textfields");
											echo $c_check->genCode(1,"actualizaPermiso(this);");
											echo "</td>";
										}

									  ?>
									  </tr>
									</table>
								</td>
							  </tr>
							  <tr>
								<td class="font8" ><b> <?=$TITULO_ADMIN_VER_REPORTES?>: </b></td>
								<td class="font8" >
									<table width="100%" border='0'>
									  <tr>
									  <?php

										echo "<td class='font8'>".$TITULO_ADMIN_VER_REPORTES;
										$c_check = new Checkbox("ver_reportes",$TITULO_ADMIN_VER_REPORTES, $arrSINO,"",0,$_SESSION['VER_REPORTES'],0,"textfields");
										echo $c_check->genCode(1,"actualizaPermiso(this);");
										echo "</td>";

										echo "<td class='font8'>".$TITULO_ADMIN_TODOS_REPORTES." " . $TITULO_ADMIN_DISTRIBUIDOR;
										$c_check = new Checkbox("all_reportes_distribuidor",$TITULO_ADMIN_TODOS_REPORTES, $arrSINO,"",0,$_SESSION['ALL_REPORTES_DISTRIBUIDOR'],0,"textfields");
										echo $c_check->genCode(1,"actualizaPermiso(this);");
										echo "</td>";

										echo "<td class='font8'>".$TITULO_ADMIN_TODOS_REPORTES." " . $TITULO_ADMIN_EXHIBIDOR;
										$c_check = new Checkbox("all_reportes_exhibidor",$TITULO_ADMIN_TODOS_REPORTES, $arrSINO,"",0,$_SESSION['ALL_REPORTES_EXHIBIDOR'],0,"textfields");
										echo $c_check->genCode(1,"actualizaPermiso(this);");
										echo "</td>";


									  ?>
									  </tr>
									</table>
								</td>
							  </tr>
							  <tr>
								<td class="font8" ><b> <?=$TITULO_ADMIN_VER_REPORTES?>: </b></td>
								<td class="font8" >
									<table width="100%" border='0'>
									  <tr>
									  <?php

										echo "<td>";



										$c_select = new Select("reporte",$TITULO_REPORTE, $db, "SELECT DISTINCT admin_reportes.id_reporte, admin_reportes.titulo2 FROM admin_reportes WHERE id_reporte NOT IN (".$_SESSION['GRUPO_REPORTES'].")",0,"", "textfields", 1, 10);
										echo $c_select->genCode();
										echo "</td>";
										echo "<td align='center'>";
										echo "<input type='button' value='>>' onclick=\"addAll('__CLista__reporte','__CLista__reporte_selected','GRUPO_REPORTES');\"><br>";
										echo "<input type='button' value='->' onclick=\"addGrupo('__CLista__reporte','__CLista__reporte_selected','GRUPO_REPORTES');\"><br>";
										echo "<input type='button' value='<-' onclick=\"delGrupo('__CLista__reporte','__CLista__reporter_selected','GRUPO_REPORTES');\"><br>";
										echo "<input type='button' value='<<' onclick=\"delAll('__CLista__reporte','__CLista__reporte_selected','GRUPO_REPORTES');\">";
										echo "</td>";
										echo "<td>";
										$strSQL = "SELECT DISTINCT admin_reportes.id_reporte, admin_reportes.titulo2 FROM admin_reportes WHERE id_reporte IN (".$_SESSION['GRUPO_REPORTES'].")";
										$c_select = new Select("reporte_selected",$TITULO_ADMIN_EXHIBIDOR, $db, $strSQL,0,"", "textfields", 1, 10);
										echo $c_select->genCode();
										echo "</td>";

									  ?>
									  </tr>
									</table>
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
							  <input type="button" name="cancelar" value="<?=$VOLVER?>" class="buttons" onClick="javascript:details('control_usuarios','','','');">
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


