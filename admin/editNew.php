<?php
extract($_GET);
extract($_POST);
/**********************************************************************************
'Descripci�n: Archivo que crear o actualizar un registro en la base de datos
'Fecha de creaci�n: Noviembre 14 de 2003
***********************************************************************************/

//RECIBIMOS EL NOMBRE DE LA TABLA
if ($_POST['tabla']){
	$nombre_tabla = $_POST['tabla'];
	$strAccion = $_POST['accion'];
	$pagInDiv=false;
}
else if($_GET['tabla']){
	$nombre_tabla = $_GET['tabla'];
	$strAccion = $_GET['accion'];
	$pagInDiv=true;
}

//DETERMINO SI EN EL DIV CUANDO CREA UN REGISTRO SE CHEQUEO LA OPCION DE GUARDAR Y CREAR NUEVO
//REGISTRO
if ($_POST['guardar_crear'])
	$pagInDiv=true;

require_once("session.php");

//TRAEMOS LA  CONFIGURACION ESPECIAL DE LA TABLA
$dbDataAux = new ADODB;
$strSQL = "SELECT * FROM admin_conf_tablas WHERE tabla='".$nombre_tabla."'";
$dbDataAux->query($strSQL);

$conf_ruta_archivos = "";
if ($dbDataAux->next_row()){	
	$conf_ruta_archivos = $dbDataAux->ruta_archivos;
}

$ruta_archivos = "../galeria/".$conf_ruta_archivos;



?>
<script language="javascript">

function validacionCustom(){

	var forma = document.forma;
	if (forma.objetos_selected.value!=''){
		var strValores = forma.objetos_selected.value;
		var objetos = strValores.split(';');
		for (i=0;i<objetos.length;i++){

			var objeto = objetos[i];
			if (objeto!=''){

				var optionList = document.getElementById(objeto).options;
				var data = '';
				var len = optionList.length;

				for(j=0; j<len; j++){
					optionList.item(j).selected=true;
				}

			}

		}
	}

	//VERIFICAMOS LOS CAMPOS EDITOR
	if (forma.objetos_editor.value!=''){
		var strValores = forma.objetos_editor.value;
		var objetos = strValores.split(';');
		for (i=0;i<objetos.length;i++){

			if (objetos[i]!=""){
				
				var objetoEditor = eval("forma.editor_" + objetos[i]);
				var objetoEditorOculto = $("editor_oculto_" + objetos[i]);

				objetoEditorOculto.value = tinyMCE.activeEditor.getContent();
				objetoEditor.value = objetoEditorOculto.value;

			}	
		}			
	}

	if (validarForma(forma))
		forma.submit();


}
</script>
<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form method="post" action="control_procesos.php" enctype="multipart/form-data" name="forma" onsubmit="return validarForma(this);">
<table width="100%" border="0" cellspacing="" cellpadding="" align="center">
<?php
	//DETERMINA SI LA PAGINA SE ABRE EN UN DIV PROTOTYPE
	if ($pagInDiv==false){
		echo "<tr>";
		echo "<td class='textos'>";
		echo "<table width='100%' bgcolor='#FFFFFF' height='41' >";
		echo "<tr>";
		echo "<td height='35'>";
				include("includes/general/encabezado.php");
		echo "</td>";
		echo "</tr>";
		echo "</table>";
		echo "</td>";
		echo "</tr>";
	}
?>
<tr>
    <td>
     <table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
	 <tr align="center" valign="top">
     <td colspan="2">
		<?php
			//Hace la b�squeda para armar el formulario correspondiente
			$dbData = new ADODB;
			$dbData->query("SELECT * FROM admin_tablas WHERE nombre_tabla = '$nombre_tabla' ORDER BY id_tabla");

			$row = $dbData->num_rows();
			if ($row > 0){
				echo "<table width=\"80%\" align='center' border='0'>\n";
				echo "<tr>";
				echo "<td colspan=2>";
					echo "<table border='0' width=100%  cellpadding='0' cellspacing='0'>";
					echo "<tr>";
					echo "<td class='titletable' height='33'>&nbsp;<b>";
					if ($strAccion=="search")
						echo $BUSCAR_EN.":&nbsp; ".ucfirst($descripcion_tabla)."</td>";
					else
						echo $TITULO_ADMINISTRAR." ".ucfirst($descripcion_tabla)."</td>";
					echo "</tr>";
					echo "</table>";
				echo "</b>";
				echo "</td>";
				echo "</tr>\n";

				$titulo = $INSERTAR_REGISTRO;
				$titulo_boton = $INSERTAR_BOTON;
				//DETERMINA SI ESTA INSERTANDO O EDITANDO UN REGISTRO
				if ($strAccion=="update"){
					$titulo = $EDITAR_REGISTRO;
					$titulo_boton = $ACTUALIZAR_BOTON;
				}
				else if ($strAccion=="search"){
					$titulo = $BUSCAR_DATOS;
					$titulo_boton = $BUSCAR_BOTON;
				}



				//DETERMINA SI LA PAGINA SE ABRE EN UN DIV PROTOTYPE PARA NO UTILIZAR ESTE TITULO
				if ($pagInDiv==false)
					echo "<tr><td colspan=\"2\" class=\"Normal\">&nbsp;".$titulo."</td></tr>\n";



				$datasource = new ADODB;
				while($dbData->next_row()){

					$iId = $dbData->id_tabla;
					$iNombre_tabla = $dbData->nombre_tabla;
					$iNombre_campo = $dbData->nombre_campo;
					$iCampo_es_id = $dbData->campo_es_id;
					$iTipo_campo = $dbData->tipo_campo;
					$iTabla_relacion = $dbData->tabla_relacion;
					$iCampo_relacion = $dbData->campo_relacion;
					$iCampo_imprimir = $dbData->campo_imprimir;
					$iCondicion_select = $dbData->condicion_select;
					$iValidacion = $dbData->validacion;
					$iTipo_validacion = $dbData->tipo_validacion;
					$iTamano = $dbData->tamano;
					$iLongitud = $dbData->longitud;
					$iMostrar = $dbData->mostrar;
					$iRotulo = $dbData->rotulo;
					$iCampo_confirmar = $dbData->campo_confirmar;
					$iNombre_estado1 = $dbData->estado1;
					$iNombre_estado2 = $dbData->estado2;
					$iSelectSelRelation = $dbData->select_avaible;
					$iCondicionSelRelation = $dbData->condicion_avaible;
					$iCampoCondicionSelRelation = $dbData->campo_condicion_avaible;
					$iOrderSelRelation= $dbData->order_avaible;

					$objeto = new Generico();

					//DETERMINA SI ESTA EDITANDO UN REGISTRO
					if ($strAccion=="update"){
						$objeto->setTabla($nombre_tabla);

						$v_id = $_POST['id'];
						$v_id_campo = $_POST['campo'];
						//DETERMINA SI SE ACTUALIZA UN DIV PROTOTYPE PARA TOMAR LOS DATOS POR GET
						if ($pagInDiv){
							$v_id = $_GET['id'];
							$v_id_campo = $_GET['campo'];
						}
						else
							$objeto->findByCondition($_POST['campo']."=".$_POST['id'],$iNombre_campo);

						$objeto->findByCondition($v_id_campo."=".$v_id,$iNombre_campo);
					}

					//DETERMINA SI SE ESTA LA ACCION ES BUSCAR PARA NO SER OBLIGATORIOS LOS CAMPOS
					if ($strAccion=="search")
						$iValidacion = 0;

					if ($iCampo_es_id == 0 && $iTipo_campo != "autonumerico"){

						echo "<tr class=\"fila_formularios\"><td class=\"font_formularios\">&nbsp;";
						if ($iValidacion == 1)
							echo "* ";

						echo $iRotulo;

						switch ($iTipo_campo){

							case "text":

									echo "<td align='left'>&nbsp;";
									$c_textbox = new Textbox;
									echo $c_textbox->Textbox ($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "");
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "autocomplete":

									echo "<td align='left'>&nbsp;";

									//DETERMINA SI ESTA CREANDO, EDITANDO O BUSCANDO
									if ($strAccion=="update" || $strAccion=="insert"){
										$c_textbox = new Textbox;
										echo $c_textbox->Textbox ($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "");
									}
									else{
										$c_autocomplete = new Autocomplete;
										echo $c_autocomplete->Autocomplete ($iNombre_campo, $iNombre_campo, $nombre_tabla, $iNombre_campo, "textfields", $iTamano, $iLongitud, "", "");
									}

									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "password":
									
									$validar = $iValidacion;
									if ($strAccion=="update")
										$validar = 0;

									echo "<td align='left'>&nbsp;";
									$c_password = new Password;
									echo $c_password->Password ("pass_" . $iNombre_campo, $iRotulo, $validar, "", "textfields", $iTamano, $iLongitud, "", "");

			
									//DETERMINA SI ESTA CREANDO, EDITANDO O BUSCANDO
									if ($strAccion=="update"){
										$clave_actual=$objeto->getValores();
										$EncryptionKey = "IndexcolProductos";
										$hcemd5 = new Crypt_HCEMD5($EncryptionKey, '');
										$clavetmp= $hcemd5->decodeMime($clave_actual);

										echo "<input type='hidden' name='password' value='".$clavetmp."'>";
										echo "<b class='font7'>Clave Actual: $clavetmp</b>";
									}

									echo "</td></tr>";

									if(!isset($campos))
										$campos="pass_$iNombre_campo";
									else
										$campos.=",pass_$iNombre_campo";
									break;

							case "file":

									echo "<td align='left'>&nbsp;";
									$c_file = new FileBox;

									//DETERMINA SI ESTA CREANDO, EDITANDO O BUSCANDO
									if ($strAccion=="update"){
										if(strlen($objeto->getValores())){
											$iValidacion = 0;
											echo $c_file->FileBox ("file_" . $iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "","",1,0,"Mostrar",$v_id_campo,$v_id,$objeto->getTabla(),$iNombre_campo,$ruta_archivos);
										}
										else
											echo $c_file->FileBox ("file_" . $iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "","",$ruta_archivos);

										echo "<input type='hidden' name='file_" . $iNombre_campo . "_c' value='" . $objeto->getValores() . "'>";
									}
									else
										echo $c_file->FileBox ("file_" . $iNombre_campo, $iRotulo, $iValidacion, "", "textfields", $iTamano, $iLongitud, "", "");

									print "</td></tr>";
									if(!isset($campos))
										$campos="file_$iNombre_campo";
									else
										$campos.=",file_$iNombre_campo";
									break;

							case "imagen":

									echo "<td align='left'>&nbsp;";
									$c_file = new FileBox;
									echo $c_file->FileBox ("imagen_" . $iNombre_campo, $iRotulo, $iValidacion, "", "textfields", $iTamano, $iLongitud, "", "");
									echo "</td></tr>";
									if(!isset($campos))
										$campos="imagen_$iNombre_campo";
									else
										$campos.=",imagen_$iNombre_campo";
									break;

							case "textarea":

									echo "<td align='left'>&nbsp;";
									$c_textarea = new Textarea;
									echo $c_textarea->Textarea($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "");
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "textarea_editor":

									echo "<td align='left'>&nbsp;";
									$c_textarea = new Textarea;
									echo $c_textarea->Textarea($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "mceEditor", 80, $iLongitud, "", "");
									echo "</td></tr>";
									if(!isset($campos))
										$campos="editor_$iNombre_campo";
									else
										$campos.=",editor_$iNombre_campo";
										
									$objetosEditor .= $iNombre_campo.";";	
										
									break;									


							case "numero_entero":

									echo "<td align='left'>&nbsp;";
									$c_numberinteger = new NumberInteger;
									echo $c_numberinteger->NumberInteger ($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "");
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "numero_real":

									echo "<td align='left'>&nbsp;";
									$c_numbereal = new NumberReal;
									echo $c_numbereal->NumberReal ($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "");
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "email":

									echo "<td align='left'>&nbsp;";
									$c_email = new Email;
									echo $c_email->Email($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", $iTamano, $iLongitud, "", "", "");
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "fecha":

									//DETERMINA SI ESTA CREANDO, EDITANDO O BUSCANDO
									if ($strAccion=="search"){

										echo "</td>";
										echo "<td class=\"font_formularios\">&nbsp; Desde&nbsp;";
										$c_datebox = new DateBox("fecha1_" . $iNombre_campo, $iRotulo, 0, "", "textfields", 13, 13, "", 1);
										echo $c_datebox->genTextbox();
										echo "&nbsp;".$c_datebox->genCalendar();

										if(!isset($campos))
											$campos="$iNombre_campo";
										else
											$campos.=",$iNombre_campo";

										echo "&nbsp;&nbsp;&nbsp;&nbsp;<br>Hasta&nbsp;";
										$c_datebox = new DateBox("fecha2_" . $iNombre_campo, $iRotulo, 0, "", "textfields", 13, 13, "", 1);
										echo $c_datebox->genTextbox();
										echo "&nbsp;".$c_datebox->genCalendar();
										echo "</td></tr>";
										if(!isset($campos))
											$campos="fecha1_$iNombre_campo,fecha2_$iNombre_campo";
										else
											$campos.=",fecha1_$iNombre_campo,fecha2_$iNombre_campo";
										break;

									}
									else{
										echo "<td align='left'>&nbsp;";
										$datolocalfechahoy=date("Y-m-d H:i:00");
										$c_fecha = new Textbox;
										echo $c_fecha->Textbox ($iNombre_campo, $iRotulo, $iValidacion, $datolocalfechahoy, "textfields", 25, $iLongitud,"", 1);
										echo "</td></tr>";
										if(!isset($campos))
											$campos="$iNombre_campo";
										else
											$campos.=",$iNombre_campo";
										break;
									}

							case "fecha_calendario":

									//DETERMINA SI ESTA CREANDO, EDITANDO O BUSCANDO
									if ($strAccion=="search"){
										echo "</td>";
										echo "<td class=\"font_formularios\">&nbsp; Desde&nbsp;";
										$c_datebox = new DateBox("fecha1_" . $iNombre_campo, $iRotulo, 0, "", "textfields", 13, 13, "", 1);
										echo $c_datebox->genTextbox();
										echo "&nbsp;".$c_datebox->genCalendar();
										if(!isset($campos))
											$campos="$iNombre_campo";
										else
											$campos.=",$iNombre_campo";
										echo "&nbsp;&nbsp;<br>Hasta&nbsp;";
										$c_datebox = new DateBox("fecha2_" .$iNombre_campo, $iRotulo, 0, "", "textfields", 13, 13, "", 1);
										echo $c_datebox->genTextbox();
										echo "&nbsp;".$c_datebox->genCalendar();
										echo "</td></tr>";
										if(!isset($campos))
											$campos="fecha1_$iNombre_campo,fecha2_$iNombre_campo";
										else
											$campos.=",fecha1_$iNombre_campo,fecha2_$iNombre_campo";
										break;
									}
									else{
										echo "<td align='left'>&nbsp;";
										$c_datebox = new DateBox($iNombre_campo, $iRotulo, $iValidacion, $objeto->getValores(), "textfields", 30, 13, "", 1);
										echo $c_datebox->genTextbox();
										echo "&nbsp;".$c_datebox->genCalendar();
										echo "</td></tr>";
										if(!isset($campos))
											$campos="$iNombre_campo";
										else
											$campos.=",$iNombre_campo";
										break;
									}

							case "radio":

									echo "<td class=\"font7\">";
									$c_radio = new Radio($iNombre_campo, $iRotulo, $datasource, "SELECT $iCampo_relacion".",". "$iCampo_imprimir FROM $iTabla_relacion ORDER BY $iCampo_imprimir", $iValidacion, $objeto->getValores(), "textfields", 0);
									while($tmp_html = $c_radio->next_entry()) {
										echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."<br>";
									}
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "bi_radio":

									//Armar el array que debe ingresar al radio
									$c_valores = explode("|",$iNombre_estado1);
									$c_nombres = explode("|",$iNombre_estado2);

									$limite = 0;
									//Verificar cual de los listados es el mas corto
									//Para realizar el ciclo que genera el arreglo.
									if(count($c_valores) <= count($c_nombres))
										$limite = count($c_valores);
									else
										$limite = count($c_nombres);

									//Cargar el arreglo con los valores
									$sentencia = "\$arreglo = array(";
									for($i=0;$i<$limite;$i++){
										if($i == ($limite - 1))
											$sentencia .= "\"$c_valores[$i]\" => \"$c_nombres[$i]\");";
										else
											$sentencia .= "\"$c_valores[$i]\" => \"$c_nombres[$i]\",";
									}
									//Ejecutar la sentencia
									eval($sentencia);

									//Mostrar el radiobutton
									echo "<td class=\"font7\">";
									$c_radio = new Radio($iNombre_campo, $iRotulo,$arreglo,"", $iValidacion, $objeto->getValores(), "textfields", 0);
									while($tmp_html = $c_radio->next_entry()) {
										echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."<br>";
									}
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "select_estatico":

									//Armar el array que debe ingresar al radio
									$c_valores = explode("|",$iNombre_estado1);
									$c_nombres = explode("|",$iNombre_estado2);

									$limite = 0;
									//Verificar cual de los listados es el mas corto
									//Para realizar el ciclo que genera el arreglo.
									if(count($c_valores) <= count($c_nombres))
										$limite = count($c_valores);
									else
										$limite = count($c_nombres);

									//Cargar el arreglo con los valores
									$sentencia = "\$arreglo = array(";
									for($i=0;$i<$limite;$i++){
										if($i == ($limite - 1))
											$sentencia .= "\"$c_valores[$i]\" => \"$c_nombres[$i]\");";
										else
											$sentencia .= "\"$c_valores[$i]\" => \"$c_nombres[$i]\",";
									}
									//Ejecutar la sentencia
									eval($sentencia);

									//Mostrar el select
									echo "<td align='left'>&nbsp;";

									$c_select = new Select($iNombre_campo, $iRotulo, $arreglo, "", $iValidacion, $objeto->getValores(), "textfields", 0, "", "", 0);
									$c_select->enableBlankOption();
									echo $c_select->genCode();
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "select":

									echo "<td align='left'>&nbsp;";

									$strSQL = "SELECT $iCampo_relacion".",". "$iCampo_imprimir FROM $iTabla_relacion ";
									
									//DETERMINA SI HAY CONDICION CONFIGURADA PARA EL SELECT
									if ($iCondicion_select || $iNombre_campo=="id_publicacion"){
										eval("\$iCondicion_select = \"$iCondicion_select\";");										
										
										$strSQL .= " WHERE " .$iCondicion_select;
										
										//DETERMINAMOS SI LA TABLA ES PUBLICACIONES DETALLE PARA CONDICIONAR AL CAMPO WHERE
										//DE LA PUBLICACION QUE ESTA VIENDO

										if ($_SESSION["WHERE_CAMPO_ID"] && $_SESSION["WHERE_CAMPO_VALOR"] && $iNombre_campo=="id_publicacion")
											$strSQL .= str_replace($nombre_tabla.".","",$_SESSION["WHERE_CAMPO_ID"]) ."=" . $_SESSION["WHERE_CAMPO_VALOR"]; 
										
									}

									$strSQL .= " ORDER BY $iCampo_imprimir";									
									$c_select = new Select($iNombre_campo, $iRotulo, $db, $strSQL, $iValidacion, $objeto->getValores(), "textfields", 0, "", "", 0);

									$c_select->enableBlankOption();
									echo $c_select->genCode();
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "select_relation":

									//ESTE PROCESO ES PARA CONTROLAR EL NOMBRE DEL ID YA QUE EL CONTROL SELECT GENERA SU PROPIO NOMBRE CUANDO ES OBLIGATORIO O NO.
									$idCampoAvailableList = "__CLista__".$iNombre_campo;
									$idCampoSelectedList = "__CLista__";
									if ($iValidacion)
										$idCampoSelectedList = "_O___CLista__";


									//SQL DATOS NO SELECCIONADOS
									$strSQLAvaible = $iSelectSelRelation ." WHERE 1=1 ". $iCondicionSelRelation;

									//DETERMINAMOS SI HAY VALORES PARA LIMITAR LA LISTA DE DATOS
									if ($objeto->getValores()){
										$strSQLAvaible .= " AND ".$iCampoCondicionSelRelation." NOT IN (".$objeto->getValores().")";
									}

									$strSQLAvaible .= " " .$iOrderSelRelation;
	
									//SQL DATOS SELECCIONADOS
									$strSQLSelected = $iSelectSelRelation ." WHERE 1=1 ". $iCondicionSelRelation;

									//DETERMINAMOS SI HAY VALORES PARA LIMITAR LA LISTA DE DATOS
									if ($objeto->getValores())
										$strSQLSelected .= " AND ".$iCampoCondicionSelRelation." IN (".$objeto->getValores().")";
									else
										$strSQLSelected .= " AND ".$iCampoCondicionSelRelation." IN (0)";

									$strSQLSelected .= " " .$iOrderSelRelation;



									$idCampoSelectedList .= $iNombre_campo;

									echo "<td align='left'>&nbsp;";

										echo "<table border='0' cellpadding='0' cellspacing='0'>";
										echo "<tr>";
										echo "<td>";
										$c_select = new Select($iNombre_campo,$iRotulo, $dbData, $strSQLAvaible,0, "", "textfields", 1, 10);
										echo $c_select->genCode();
										echo "</td>";
										echo "<td align='center' width='20'>&nbsp;</td>";
										echo "<td align='center'>";
										echo "<input type='button' value='>>' onclick=\"addAll('".$idCampoAvailableList."','".$idCampoSelectedList."_selected','');\"><br>";
										echo "<input type='button' value='->' onclick=\"addItem('".$idCampoAvailableList."','".$idCampoSelectedList."_selected','');\"><br>";
										echo "<input type='button' value='<-' onclick=\"delItem('".$idCampoAvailableList."','".$idCampoSelectedList."_selected','');\"><br>";
										echo "<input type='button' value='<<' onclick=\"delAll('".$idCampoAvailableList."','".$idCampoSelectedList."_selected','');\">";
										echo "</td>";
										echo "<td align='center' width='20'>&nbsp;</td>";
										echo "<td>";
										$c_select = new Select($iNombre_campo."_selected",$iRotulo, $dbData, $strSQLSelected,1, "", "textfields", 1, 10);
										echo $c_select->genCode();
										$objetosSelect .= $idCampoSelectedList."_selected;";
										echo "</td>";
										echo "</tr>";
										echo "</table>";

									echo "</td></tr>";

									if(!isset($campos))
										$campos=$iNombre_campo."_selected";
									else
										$campos.=",".$iNombre_campo."_selected";
									break;

							case "check":

									echo "<td align='left' class='font7'>";
									$c_checkbox = new Checkbox($iNombre_campo, $iRotulo, $datasource, "SELECT $iCampo_relacion".",". "$iCampo_imprimir FROM $iTabla_relacion ORDER BY $iCampo_imprimir", $iValidacion,$objeto->getValores(), 0, "textfields", 0);
									while($tmp_html = $c_checkbox->next_entry()) {
										echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."<br>";
									}
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

							case "checkbox_estatico":

									//Armar el array que debe ingresar al radio
									$c_valores = explode("|",$iNombre_estado1);
									$c_nombres = explode("|",$iNombre_estado2);

									$limite = 0;
									//Verificar cual de los listados es el mas corto
									//Para realizar el ciclo que genera el arreglo.
									if(count($c_valores) <= count($c_nombres))
										$limite = count($c_valores);
									else
										$limite = count($c_nombres);

									//Cargar el arreglo con los valores
									$sentencia = "\$arreglo = array(";
									for($i=0;$i<$limite;$i++){
										if($i == ($limite - 1))
											$sentencia .= "\"$c_valores[$i]\" => \"$c_nombres[$i]\");";
										else
											$sentencia .= "\"$c_valores[$i]\" => \"$c_nombres[$i]\",";
									}
									//Ejecutar la sentencia
									eval($sentencia);

									//Mostrar el radiobutton
									echo "<td align='left' class='font7'>";
									$c_checkbox = new Checkbox($iNombre_campo, $iRotulo, $arreglo, "", $iValidacion,$objeto->getValores(), 0, "textfields", 0);
									while($tmp_html = $c_checkbox->next_entry()) {
										echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."<br>";
									}
									echo "</td></tr>";
									if(!isset($campos))
										$campos="$iNombre_campo";
									else
										$campos.=",$iNombre_campo";
									break;

						}
					}else{
						echo "<input type=\"hidden\" nombre=\"$iNombre_campo\">";
						echo "</tr>\n";
					}
				}
				$datasource->close();

				if ($strAccion!="search")
					echo "<tr><td colspan='3' class='font7' align='center'>".$MSJ_CAMPOS_OBLIGATORIOS."</td></tr>";

				echo "<tr height=\"30\"><td colspan=\"2\" align='center' class='font8'><br>";

				echo "<input type=\"button\" name=\"btn_guardar\" value=\"".$titulo_boton."\" class=\"buttons\" onclick=\"validacionCustom();\">&nbsp;&nbsp;";
				
				//DETERMINA SI LA PAGINA SE ABRE EN UN DIV PROTOTYPE
				if (!$pagInDiv)
					echo "<input type=\"button\" name=\"btn_regresar\" value=\"".$CANCEL."\" class=\"buttons\" onClick=\"volver();\">\n";
				else
					echo "<input type=\"button\" name=\"btn_regresar\" value=\"".$CANCEL."\" class=\"buttons\" onClick=\"window.parent.frames[0].closeDivFrame();\">\n";

				//if ($strAccion!="update" && $strAccion!="search")
				//	echo "<br><input type=\"checkbox\" name=\"guardar_crear\" value=\"1\">" . $GUARDAR_CREAR;


				echo "<input type=\"hidden\" name=\"tabla\" value=\"$nombre_tabla\">\n";
				echo "<input type=\"hidden\" name=\"campos\" value=\"$campos\">\n";
				echo "<input type=\"hidden\" name=\"accion\" value=\"$strAccion\">\n";
				echo "<input type=\"hidden\" name=\"v_id\" value=\"$v_id\">\n";
				echo "<input type=\"hidden\" name=\"v_id_campo\" value=\"$v_id_campo\">\n";
				echo "<input type=\"hidden\" name=\"objetos_selected\" value=\"$objetosSelect\">\n";
				echo "<input type=\"hidden\" name=\"objetos_editor\" value=\"$objetosEditor\">\n";
				echo "<input type=\"hidden\" name=\"pagInDiv\" value=\"".$pagInDiv."\">\n";
				echo "</td></tr><br>";
				echo "</table>";
			}
			$dbData->close();
		?>
     </td>
     </tr>
     </table>
</td>
</tr>
</table>
</form>
<script>
function prueba(){

	var forma = document.forma;

	alert(tinyMCE.activeEditor.getContent());

}



</script>
<?php
	include ("includes/general/pie.php");
?>
