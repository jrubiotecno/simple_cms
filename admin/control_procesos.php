<?php
/**********************************************************************************
'Descripci�n: Archivo que trae la lista de resultados segun la tabla consultada
***********************************************************************************/
require_once("session.php");

//RECIBE DATOS
$nombre_tabla = $_POST['tabla'];

//TRAEMOS LA  CONFIGURACION ESPECIAL DE LA TABLA
$dbAux = new ADODB;
$strSQL = "SELECT * FROM admin_conf_tablas WHERE tabla='".$nombre_tabla."'";
$dbAux->query($strSQL);

$conf_ruta_archivos = "";
if ($dbAux->next_row()){	
	$conf_ruta_archivos = $dbAux->ruta_archivos;
}

$ruta_archivos = "../galeria/".$conf_ruta_archivos."/";

//DETERMINAMOS LA ACCION A SEGUIR
if ($_POST['accion']=='insert'){

	//Crear objeto para el manejo de datos
	$objeto = new Generico();

	//Se carga los valores del formulario
	$arr_campos = explode(",", $_POST['campos']);

	for($i=0;$i<count($arr_campos);$i++){

		//Se verifica si el campo es un archivo
		if(substr($arr_campos[$i],0,5) == "file_"){
		
			$variabletmp1 = $arr_campos[$i];			
			$variabletmp2 = $variabletmp1."_name";
			$variable = $variabletmp2;
			
			//Si hay informaci�n sobre el archivo se carga el contenido
			if($_FILES[$variabletmp1]['name']){

				//Se carga el nombre que se le va ha dar al archivo
				$nombre_def = $tabla."_".$_FILES[$variabletmp1]['name'];

				//Si existe ya se cambia el nombre del archivo
				$cont = 1;
				while(file_exists($ruta_archivos.$nombre_def)){
					$nombre_def = $tabla.$cont."_".$_FILES[$variabletmp1]['name'];
					$cont++;
				}

				//Cargar el archivo en la carpeta de uploads
				//En caso de que el archivo se pueda mover guardar el nombre del
				//archivo en la base de datos.
				if(copy($_FILES[$variabletmp1]['tmp_name'],$ruta_archivos.$nombre_def)){
					$valor = $nombre_def;
					$arr_campos[$i] = substr($arr_campos[$i],5);
				}

			}
			else{
				$arr_campos[$i] = substr($arr_campos[$i],5);
			}
			
		}
		else if(substr($arr_campos[$i],0,5) == "pass_"){

			$new_clave=$$arr_campos[$i];
			$EncryptionKey = "IndexcolProductos";
			$hcemd5 = new Crypt_HCEMD5($EncryptionKey, '');
			$encrypted_password = $hcemd5->encodeMime($new_clave);
			$arr_campos[$i] = substr($arr_campos[$i],5);
			$valor=$encrypted_password;
		}
		else if(stristr($arr_campos[$i], 'editor_')) {					
			$campo = substr($arr_campos[$i],7);
			$arr_campos[$i] = $campo;
			$valor=$_POST["editor_oculto_" . $campo];			
		}
		else if(stristr($arr_campos[$i], '_selected')) {

			//OPCION PARA SELECT CON VARIOS VALORES
			$valor = implode(",",$$arr_campos[$i]);
			$arr_campos[$i] = substr($arr_campos[$i], 0, -9);
		}
		else
			$valor=$$arr_campos[$i];

		$campos = join(",",$arr_campos);

		//Se carga el valor del campo
		$objeto->setValor($valor);
	}
	

	//Se carga el listado de campos
	$objeto->setTabla($nombre_tabla);
	$objeto->setCampos($campos);

	$objeto->create();
	$objeto->Destroy();

	//GUARDAMOS REGISTRO DE AUDITORIA
	creaRegistroAuditoria("Inserta registro en ".$nombre_tabla);

	//DETERMINAMOS POR QUE PAGINA HIZO EL PROCESO DE INSERCION
	if ($_POST['pagInDiv']){
		echo alertJS($MSJ_CREAR_REGISTRO);
		echo funcionJS("window.parent.paginadorAjaxAdmin(1,'','','".$MSJ_CARGANDO_NEW_DATA."','resultados_tablaXML','')");
		echo funcionJS("window.parent.frames[0].closeDivFrame()");

	}
	else{
		echo "<font color='white'>Texto para reenvio</font>";
		echo funcionJS("detailsAdmin('index','Cargar','".$nombre_tabla."','','','".$MSJ_CREANDO_CARGANDO."')");
	}


}
if ($_POST['accion']=='update'){

	//Crear objeto para el manejo de datos
	$objeto = new Generico();

	//Se carga los valores del formulario
	$arr_campos = explode(",", $_POST['campos']);
	for($i=0;$i<count($arr_campos);$i++){

		//Se verifica si el campo es un archivo o es una imagen
		if(substr($arr_campos[$i],0,5) == "file_"){

			$variabletmp1 = $arr_campos[$i];			
			$variabletmp2 = $variabletmp1."_name";
			$variable = $variabletmp2;
			
			//Si hay informaci�n sobre el archivo se carga el contenido
			if($_FILES[$variabletmp1]['name']){

				//Se carga el nombre que se le va ha dar al archivo
				$nombre_def = $tabla."_".$_FILES[$variabletmp1]['name'];

				//Si existe ya se cambia el nombre del archivo
				$cont = 1;
				while(file_exists($ruta_archivos.$nombre_def)){
					$nombre_def = $tabla.$cont."_".$_FILES[$variabletmp1]['name'];
					$cont++;
				}

				//Cargar el archivo en la carpeta de uploads
				//En caso de que el archivo se pueda mover guardar el nombre del
				//archivo en la base de datos.
				if(copy($_FILES[$variabletmp1]['tmp_name'],$ruta_archivos.$nombre_def)){
					$valor = $nombre_def;
					$objeto->setValorUpdate(substr($arr_campos[$i],5),$valor);
				}

			}
			else{
				$arr_campos[$i] = substr($arr_campos[$i],5);
			}

		}
		else if(stristr($arr_campos[$i], '_selected')) {

			//OPCION PARA SELECT CON VARIOS VALORES
			$valor = implode(",",$$arr_campos[$i]);
			$arr_campos[$i] = substr($arr_campos[$i], 0, -9);
			$objeto->setValorUpdate($arr_campos[$i],$valor);
		}
		else if(stristr($arr_campos[$i], 'editor_')) {					
			$campo = substr($arr_campos[$i],7);
			$arr_campos[$i] = $campo;
			$valor=$_POST["editor_oculto_" . $campo];		
			$objeto->setValorUpdate($arr_campos[$i],$valor);
		}		
		else if(stristr($arr_campos[$i], 'pass_')){
		
			$new_clave= $$arr_campos[$i];
			$pass_old = $_POST["password"];			
			
			$clave = $pass_old;
			if ($new_clave!="")
				$clave = $new_clave;
						
			$EncryptionKey = "IndexcolProductos";
			$hcemd5 = new Crypt_HCEMD5($EncryptionKey, '');
			$encrypted_password = $hcemd5->encodeMime($clave);
			$arr_campos[$i] = substr($arr_campos[$i],5);
			$valor=$encrypted_password;
			
			$objeto->setValorUpdate($arr_campos[$i],$valor);
		}
		else
			$objeto->setValorUpdate($arr_campos[$i],$$arr_campos[$i]);

	}

	//Se carga el listado de campos
	$objeto->setTabla($nombre_tabla);
	$objeto->update($_POST['v_id_campo'],$_POST['v_id']);
	$objeto->Destroy();


	//GUARDAMOS REGISTRO DE AUDITORIA
	creaRegistroAuditoria("Actualiza registro id: ".$_POST['v_id']." en ".$nombre_tabla);

	//DETERMINAMOS POR QUE PAGINA HIZO EL PROCESO DE ACTUALIZACION
	if ($_POST['pagInDiv']){
		echo alertJS($MSJ_ACTUALIZAR_REGISTRO);
		echo funcionJS("window.parent.paginadorAjaxAdmin(1,'','','".$MSJ_CARGANDO_NEW_DATA."','resultados_tablaXML','')");
		echo funcionJS("window.parent.frames[0].closeDivFrame()");
	}
	else{
		echo "<font color='white'>Texto para reenvio</font>";
		echo funcionJS("detailsAdmin('index','Cargar','".$nombre_tabla."','','','".$MSJ_ACTUALIZANDO_CARGANDO."')");
	}

}
else if ($_POST['accion']=='delete'){

	//RECIBE DATOS
	$campo_id = $_POST['campo'];
	$valor_id = $_POST['id'];

	$objeto = new generico();
	$objeto->setTabla($nombre_tabla);

	$boolEliminar = true;

	//DETERMINO SI LA TABLA ES EQUIPO
	if ($nombre_tabla=="camp_equipos"){
		$boolEliminar = true;
		$dbAux = new ADODB;
		$strSQL = "SELECT * FROM camp_grupos_equipos WHERE id_equipo='".$_POST['id']."'";
		$dbAux->query($strSQL);
		if ($dbAux->next_row())
			$boolEliminar = false;
	}

	if ($boolEliminar){

		$objeto->delete($campo_id,$valor_id);
		$objeto->Destroy();

		//GUARDAMOS REGISTRO DE AUDITORIA
		creaRegistroAuditoria("Elimina registro id: ".$valor_id." en ".$nombre_tabla);
	}
}
else if ($_POST['accion']=='search'){

	//Se carga los valores del formulario
	$arr_campos = explode(",", $_POST['campos']);
	$buscar = "";

	for($i=0;$i<count($arr_campos);$i++){
		if(strlen($$arr_campos[$i]) && $arr_campos[$i] != "accion"){
			//Se verifica si el campo es un archivo
			if(substr($arr_campos[$i],0,7) == "fecha1_"){
				if(strlen($buscar)){
					$buscar .= " AND $nombre_tabla." . substr($arr_campos[$i],7) . " >= '". $$arr_campos[$i] . " ";
					if($nombre_tabla=="admin_auditoria")  $buscar .= " 00:00:00'"; else $buscar .= "'";
				}
				else{
					$buscar .= "$nombre_tabla." . substr($arr_campos[$i],7) . " >= '". $$arr_campos[$i] . " ";
					if($nombre_tabla=="admin_auditoria")  $buscar .= " 00:00:00'"; else $buscar .= "'";
				}
			}elseif(substr($arr_campos[$i],0,7) == "fecha2_"){
				if(strlen($buscar)){
					$buscar .= " AND $nombre_tabla." . substr($arr_campos[$i],7) . " <= '". $$arr_campos[$i] . "";
					if($nombre_tabla=="admin_auditoria")  $buscar .= " 23:59:59'"; else $buscar .= "'";
				}
				else{
					$buscar .= "$nombre_tabla." . substr($arr_campos[$i],7) . " <= '". $$arr_campos[$i] . " ";
					if($nombre_tabla=="admin_auditoria")  $buscar .= " 23:59:59'"; else $buscar .= "'";
				}
			}
			else if(substr($arr_campos[$i],0,5) == "like_"){
				if(strlen($buscar)){
					$buscar .= " AND $nombre_tabla." . substr($arr_campos[$i],5) . " like '%". $$arr_campos[$i] . "%'";
				}
				else{
					$buscar .= "$nombre_tabla." . substr($arr_campos[$i],5) . " like '%". $$arr_campos[$i] . "%'";
				}
			}
			else{
				if(strlen($buscar)){
					$buscar .= " AND $nombre_tabla." . $arr_campos[$i] . " = '". $$arr_campos[$i] . "'";
				}
				else{
					$buscar .= "$nombre_tabla."."$arr_campos[$i] = '". $$arr_campos[$i] . "'";
				}
			}
			$campos = join(",",$arr_campos);
		}
	}

	if ($buscar)
		$_SESSION["WHERE"]=$buscar;
	else
		$_SESSION["WHERE"]="";

	//GUARDAMOS REGISTRO DE AUDITORIA
	creaRegistroAuditoria("Consulta datos en ".$nombre_tabla);

	//DETERMINAMOS POR QUE PAGINA HIZO EL PROCESO DE ACTUALIZACION
	if ($_POST['pagInDiv']){
		echo "Close window....";
		echo funcionJS("window.parent.paginadorAjaxAdmin(1,'','','".$MSJ_BUSCANDO."','resultados_tablaXML','')");
		echo funcionJS("window.setTimeout(\"window.parent.frames[0].closeDivFrame();\",1500);");

	}
	else
		echo funcionJS("detailsAdmin('index','Cargar','".$nombre_tabla."','','','".$MSJ_BUSCANDO."')");

}
?>