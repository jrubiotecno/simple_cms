<?php
/**
* Adminsitraci�n de paginas de la aplicacion
* @version 1.0
* El constructor de esta clase es {@link paginas()}
*/
class paginas {


	var $Database;
  	var $ID;


  	/**
      * Funci�n para seleccionar opciones de administrador
      */
  	function parseAdmin() {

 		global $db,$id,$accion,$option,$option2;

		switch($accion){

 			case "verListado":
							$this->listadoAdmin();
 							break;
 			case "editarPagina":
							$this->editarPagina();
 							break;
 			case "guardarPagina":
							$this->guardarPagina();
 							break; 
 			case "eliminarPagina":
							$this->eliminarPagina();
 							break;  
 			case "verficarAlias":				
							$this->verficarAlias();
 							break; 
 			case "cambiarOrden":				
							$this->cambiarOrden();
 							break;  							
 		}

  	}


  	/**
  	  * Funci�n para eliminar paginas de posicion
  	  */
  	function eliminarPagina() {

  		global $db,$id,$accion,$option,$option2,$appObj,$msjProcesoRealizado;

		//INCLUIMOS ARCHIVOS NECESARIOS
		require_once("class_paginas_extended.php");

		//INSTANCIAMOS LA CLASE DE LA TABLA
  		$pagina = new app_paginas();

		$loadReg = $pagina->load("id_pagina=".$_REQUEST['id_pagina']);

		//DETERMINAMOS SI LA PAGINA TIENE PAGINAS HIJAS
		$strSQL = "SELECT count(*) as total FROM app_paginas WHERE id_pagina_padre='".$pagina->alias."'";
		$rs = $db->Execute($strSQL);
		
		$totalHijos = 0;
		if (!$rs->EOF){
			$totalHijos = $rs->fields["total"];
		}
		
		if ($totalHijos<=0){
			$pagina->Delete();
			$msjProcesoRealizado = "Proceso realizado con exito";
		}
		else
  			$msjProcesoRealizado = "La pagina no se puede eliminar por que tiene sub paginas asociadas.";
  			
  		$this->listadoAdmin();
  	}

  	/**
  	  * Funci�n para mover las paginas de posicion
  	  */
  	function cambiarOrden() {
  		
  		global $db,$id,$accion,$option,$option2,$appObj,$msjProcesoRealizado;
		
		//INCLUIMOS ARCHIVOS NECESARIOS		
		require_once("class_paginas_extended.php");

		//INSTANCIAMOS LA CLASE DE LA TABLA
  		$pagina1 = new app_paginas();
  		$pagina2 = new app_paginas();
  		
  		$loadReg = $pagina1->load("id_pagina=".$_REQUEST['id_pagina']);  		
  		$ordenPag1 = $pagina1->orden;
  		
  		$strSQL = "SELECT id_pagina FROM app_paginas WHERE orden < " . $ordenPag1 . " AND id_pagina_padre='".$_REQUEST["id_padre"]."'";  		  		
	    $rsPaginaAnterior = $this->findSQL($strSQL, "orden","DESC",1,1);
	    if (!$rsPaginaAnterior->EOF){	    	
	    	$loadRegPagina = $pagina2->load("id_pagina=".$rsPaginaAnterior->fields["id_pagina"]);
	    	$ordenPag2 = $pagina2->orden;    	
	    }  		
	    else
	    	$ordenPag2 = $ordenPag1;    	
  		
  		//SI HAY UN ORDEN PARA EL SEGUNDO REGISTRO SE ACTUALIZAN LOS DATOS
  		if ($pagina2->orden>0){
  			$pagina1->orden = $ordenPag2;  		
  			$pagina2->orden = $ordenPag1;
  		 		
			$pagina1->Save();
			$pagina2->Save();	
			
			$msjProcesoRealizado = "Proceso realizado con exito";
		}
  		
  		$this->listadoAdmin();
  		
  	}

  	/**
  	  * Funci�n para verificar el alias
  	  */
  	function verficarAlias() {
  	
  		global $db,$id,$accion,$option,$option2,$appObj;
  		
  		$alias = $id;
  		$strSQL = "SELECT alias FROM app_paginas WHERE alias='".$alias."'";
  		$rsAlias = $db->Execute($strSQL);
  		
  		if (!$rsAlias->EOF)
  			echo "<span id='verificado'>false</span>";
  		else
  			echo "<span id='verificado'>true</span>";  		
  		
  		exit;
  	}


  	/**
  	  * Funci�n para guardar la informacion de la pagina
  	  */
  	function guardarPagina() {
  	
  		global $db,$id,$accion,$option,$option2,$appObj,$msjProcesoRealizado;
		
		//INCLUIMOS ARCHIVOS NECESARIOS
		require_once("../utilidades/class_upload.php");
		require_once("class_paginas_extended.php");
				
		//INSTANCIAMOS LA CLASE DE LA TABLA
  		$pagina = new app_paginas();
  		
  		
		$loadReg = $pagina->load("id_pagina=".$_POST['id_pagina']);
				
		//DETERMINAMOS SI EL ALIAS CAMBIA PARA ACTUALIZAR TODAS SUS PAGINAS HIJAS
		if ($_POST["alias"]!=$pagina->alias){			
			$strSQL = "UPDATE app_paginas SET id_pagina_padre='".$_POST["alias"]."' WHERE id_pagina_padre='".$pagina->alias."'";
			$db->Execute($strSQL);
		}
		
		
		$pagina->alias=$_POST['alias'];
		$pagina->id_pagina_padre=($_POST['id_pagina_padre'])?$_POST['id_pagina_padre']:0;
		$pagina->nombre=$_POST['nombre'];
		$pagina->titulo_html=$_POST['titulo_html'];
		$pagina->id_tipo=$_POST['tipo_contenido'];
		$pagina->oculto=$_POST['oculto'];
		$pagina->aplica_menu=$_POST['aplica_menu'];
		$pagina->link_externo=$_POST['link_externo'];
		$pagina->target=$_POST['target'];
		$pagina->ancho=$_POST['ancho'];
		$pagina->alto=$_POST['alto'];
		
		//DETERMINAMOS QUE TIPO DE CONTENIDO CARGA LA PAGINA PRA CAMBIAR SU MODULO Y ACCION
		if ($pagina->id_tipo=="contenido"){			
			$pagina->modulo="contenido";
			$pagina->accion="verContenido";
			$pagina->id=$_POST['contenido'];
			$pagina->link_externo="";
		}
		else if($pagina->id_tipo=="plugin"){
			
			$idPlugin = $_POST['plugin'];
			$strSQL = "SELECT plugin,metodo_publico FROM app_plugins WHERE id_plugin=".$idPlugin;
			$rsPlugin = $db->Execute($strSQL);
			
			if (!$rsPlugin->EOF){
				$pagina->modulo=$rsPlugin->fields["plugin"];
				$pagina->accion=$rsPlugin->fields["metodo_publico"];
				$pagina->id=$idPlugin;	
				$pagina->link_externo="";
			}
		}
		
		$pagina->requiere_logueo=$_POST['requiere_logueo'];
		$pagina->descripcion=$_POST['descripcion'];
		$pagina->palabras_clave=$_POST['palabras_clave'];

		//CARGAMOS LA IMAGEN DEL MENU
		if ($_FILES["imagen_menu"]["name"]!=""){
		
			$upload = new Upload($_FILES,150*1048576);

			$strNameArchivoReal = $pagina->alias."_".$upload->getFilename('imagen_menu');
			$strNameArchivoReal = str_replace (' ','',$strNameArchivoReal);
			$pagina->imagen_menu = $strNameArchivoReal;
			
			//SUBE ARCHIVOS
			$upload->saveAs($strNameArchivoReal, "../galeria/menu/", 'imagen_menu', true, 0777);		
			
		}
		
		//DETERMINAMOS SI EL REGISTRO SE INSERTA PARA ACTUALIZAR SU ORDEN AL MAXIMO DE LA PAGINA
		if ($_POST['id_pagina']==""){
			$strSQL = "SELECT (orden + 1) as nuevoOrden FROM app_paginas WHERE id_pagina_padre='".$pagina->id_pagina_padre."' ORDER BY orden DESC LIMIT 0,1";
			$rsOrden = $db->Execute($strSQL);
			
			$nuevoOrden = 1;
			if(!$rsOrden->EOF)
				$nuevoOrden = $rsOrden->fields["nuevoOrden"];
			
			$pagina->orden = $nuevoOrden;	
		}
  				
  		$pagina->Save();		
  		
  		$msjProcesoRealizado = "Proceso realizado con exito";
  		$this->listadoAdmin();
  	}

  	/**
  	  * Funci�n para mostrar el formulario de editar una pagina en el administrador
  	  */
  	function editarPagina() {
  	
  		global $db,$id,$accion,$option,$option2,$appObj;
		
		//INCLUIMOS ARCHIVOS NECESARIOS
		require_once("class_paginas_extended.php");
				
		//INSTANCIAMOS LA CLASE DE LA TABLA
  		$pagina = new app_paginas();  		 		
		
 		
 		$idPagina = $_REQUEST["id_pagina"];
 		$idPadre = $_REQUEST["id_padre"];
 		$idPaginaPadre = $_REQUEST["id_pagina_padre"];
		
		$loadReg = $pagina->load("id_pagina=".$idPagina);		
		
		//DETERMINAMOS SI EL TIPO DE CONTENIDO CARGA UN PLUGIN
		if($pagina->id_tipo=="plugin"){
			
			$plugin = $pagina->modulo;
			$metodoPublico = $pagina->accion;
			
			//TRAEMOS EL ID DEL PLUGIN SEGUN EL METODO PUBLICO
			$strSQL = "SELECT id_plugin,plugin,metodo_publico FROM app_plugins WHERE plugin='".$plugin."' AND metodo_publico='".$metodoPublico."'";			
			$rsPlugin = $db->Execute($strSQL);
			
			if (!$rsPlugin->EOF){
				$idPlugin=$rsPlugin->fields["id_plugin"];					
			}
		}
 		
 		//TRAEMOS LAS PAGINAS PADRE
  		$arrPaginas = $this->getPaginasPadre();  		   		
   		
  		$arrTiposContenido = array("contenido"=>"Contenido",
  								   "plugin"=>"Plugin",
  								   "externo"=>"Link Externo"
  								  );
  								  
  		$arrSiNo = array("1"=>"Si","-1"=>"No");

  		$arrTarget = array("_self"=>"En la misma ventana","_blank"=>"En una ventana nueva","lightbox"=>"En un Lightbox");  		
  		
  		include("../plugins/paginas/templates/admin_editar_paginas.php"); 
  		
  	}

  	/**
  	  * Funci�n para mostrar el listado de paginas en el administrador
  	  */
  	function listadoAdmin() {
  		
  		global $db,$id,$accion,$option,$option2,$appObj,$msjProcesoRealizado;;
  	
		include("../utilidades/class_dataGrid.php");
	
		
		//INSTANCIAMOS LA CLASE DATA GRID	
		$dataGrid = new DataGrid($this);	

		$dataGrid->idDataGrid = "resultDatos";
		$dataGrid->heightDG = "300";

		
		$idPadre = 0;		
		if ($_REQUEST["Ajax"]){
			$idPadre = $_REQUEST["id"];		
			$idPaginaPadre = $_REQUEST["option"];		
		}
		else if ($_REQUEST["id_padre"]){
			$idPadre = $_REQUEST["id_padre"];		
			$idPaginaPadre = $_REQUEST["id_pagina_padre"];		
		}
			
		//TRAEMOS LA CONSULTA DE DATOS PARA EL DATA GRID
		$strSQL = "SELECT id_pagina,id_pagina_padre,alias,nombre,titulo_html,id_tipo,oculto,aplica_menu FROM app_paginas WHERE id_pagina_padre='".$idPadre."' ORDER BY orden";			
	
		//TRAEMOS LA CONSULTA A EJECUTAR
		$dataGrid->SQL = $strSQL;

		//INSTANCIAMOS EL TITULO DEL ADMINISTRADOR
		if ($idPadre!="0")
			$dataGrid->titleList="Administrar paginas de la aplicaci&oacute;n: <a href='plugins.php?modulo=paginas&accion=verListado' class='titletableLink'>Primer nivel</a>=><a href='plugins.php?modulo=paginas&accion=verListado&id_padre=".$idPaginaPadre."' class='titletableLink'>Nivel anterior</a>";
		else
			$dataGrid->titleList="Administrar paginas de la aplicaci&oacute;n";
			
		$dataGrid->classTitleList="titletable";

		//INSTANCIAMOS EL MENSAJE DE PROCESO REALIZADO
		$dataGrid->titleProcess = $msjProcesoRealizado;
		
		//CREAR OPCIONES DE ENCABEZADO EN EL DATA GRID
		$dataGrid->optionsHeader=true;
		$dataGrid->addOptionsHeader("<img src='../images/ico_insertar.gif' alt='Nuevo' border='0'/> Nuevo","plugins.php?id_pagina=0&modulo=paginas&accion=editarPagina&id_padre=" . $idPadre . "&id_pagina_padre=" . $idPaginaPadre);

		//CREAR OPCIONES DE PIE EN EL DATA GRID
		$dataGrid->optionsFooter=false;
		
		//IMPRIMIMOS LOS ENCABEZADOS DE COLUMNAS DEL DATA GRID
		$dataGrid->addTitlesHeader(array("Alias","Nombre","Titulo HTML","Tipo","Oculto","Aplica menu"));
		
		//OCULTAMOS COLUMNAS O CAMPOS DEL DATA GRID
		$dataGrid->addColumnHide(array("id_pagina","id_pagina_padre"));

		//CAMPOS DE SOLO DOS VALORES		
		$arrValues = array("1","-1");
		$arrText = array("SI","NO");
		$dataGrid->addFieldTwoValues("oculto",$arrValues,$arrText); 
		$dataGrid->addFieldTwoValues("aplica_menu",$arrValues,$arrText); 
		
		//CREAMOS UN COLOR QUE SE ALTERNA POR CADA REGISTRO
		$dataGrid->classTrRegisterData = null;
		$dataGrid->arrAltBgcolor = array("#ffffff","#CECECE");		
		
		
		//CREAR UNA COLUMNA CON LINK PASANDO VARIABLES POR METODO GET		
		$arrVarGet1 = Array("id_pagina"=>"ID_PAGINA","id_padre"=>$idPadre,"modulo"=>"paginas","accion"=>"editarPagina","id_pagina_padre"=>$idPaginaPadre);
		$arrVarGet2 = Array("id_padre"=>"ALIAS","modulo"=>"paginas","accion"=>"verListado","id_pagina_padre"=>$idPadre);
		$arrVarGet3 = Array("id_pagina"=>"ID_PAGINA","id_padre"=>$idPadre,"modulo"=>"paginas","accion"=>"cambiarOrden","id_pagina_padre"=>$idPaginaPadre);
		$arrVarGet4 = Array("id_pagina"=>"ID_PAGINA","id_padre"=>$idPadre,"modulo"=>"paginas","accion"=>"eliminarPagina","id_pagina_padre"=>$idPaginaPadre);
		$dataGrid->addColLink("Editar","<center>Editar</center>","plugins.php",$arrVarGet1,"","left"); 
		$dataGrid->addColLink("Eliminar","<center>Eliminar</center>","plugins.php",$arrVarGet4,"","left"); 		
		$dataGrid->addColLink("Sub Paginas","<center><img src='../images/ico_ver.gif' alt='Ver sub paginas' border='0'/></center>","plugins.php",$arrVarGet2,"","right"); 		
		$dataGrid->addColLink("Subir nivel","<center><img src='../images/ico_subir.gif' alt='Subir' border='0'/></center>","plugins.php",$arrVarGet3,"","right"); 		
		
		//CREAR LA PAGINACION
		$dataGrid->page = $_POST["pagina"];
		$dataGrid->totalRegPag = 25;
		$dataGrid->paginadorFooter = false;
		$dataGrid->paramMensajePaginador = "Buscando...";
		$dataGrid->paramModuloPaginador = "plugins";
		$dataGrid->paramModulo1Paginador = "paginas";
		$dataGrid->paramAccionPaginador = "verListado";
		$dataGrid->paramIdPaginador = $idPadre;
		$dataGrid->paramOptionPaginador = $idPaginaPadre;
		$dataGrid->paramOption2Paginador = "option2";							  		
  		
  		include("../plugins/paginas/templates/admin_listado_paginas.php"); 
  		
  	}

  	/**
  	  * Funci�n para seleccionar opciones de la parte publica
  	  */
  	function parsePublic() {
		
		
 		global $db,$id,$accion,$option,$option2,$appObj;
		
		$id = $appObj->id;
		
		switch($appObj->accion){		
			
 			
 		}

  	}
  	

  	/**
  	 * Funci�n para mostrar el Contenidos por p�ginas
  	 */
  	function findSQL($strSQL, $order_by,$order_direction,$page = 1,$num_results = 20) {

		global $db,$dbAux,$id,$accion,$option,$option2;

		$db_class = $db;

		if(!$order_by) $order_by = "id_pagina";

		$strSQL = $strSQL ." ORDER BY $order_by $order_direction";

		$rsConsulta = $db_class->PageExecute($strSQL, $num_results, $page, false, 0);

		return $rsConsulta;
  	}

  	/**
  	 * Funci�n para traer el arreglo de paginas padre
  	 */
  	function getPaginasPadre(){


		include("../plugins/menu/class_menu.php");
		
		$menu = new menu();
		
		$arrPaginas = array();
		$arrItemsPadre = $menu->getItemsPadre("id_pagina_padre = 0");		
 		$totalItemsPadre = count($arrItemsPadre);
		$_SESSION["itemsMenu"] = null;
  		
  		//RECORREMOS LA PRIMERA VEZ LOS ITEMS PADRE PARA GENERAR EL ARBOL GENEALOGICO EN UN ARRREGLO
  		for ($i=0;$i<$totalItemsPadre;$i++){
  			
  			$page = $arrItemsPadre[$i]["alias"];

  			//TRAEMOS LOS ITEMS HIJOS 
  			$menu->crearArbol("app_paginas","alias","nombre","id_pagina_padre",$page,"","-","");	    
  		
  		}
  		
  		
		//RECORREMOS LA SEGUNDA VEZ LOS ITEMS PADRE PARA GUARDARLOS EN UN ARREGLO MAS SIMPLE
  		for ($i=0;$i<$totalItemsPadre;$i++){
  			
  			$page = $arrItemsPadre[$i]["alias"];
  			$nombre = $arrItemsPadre[$i]["nombre"];
 			
  			$arrPaginas[$page] = $nombre;
  			
			//GENERAMOS ARREGLO HIJOS
			$strPaginasHijas = $menu->generarCadenaHijos($_SESSION["itemsMenu"],$page,$nombre);  			
			
			//CONERTIVOS EN UN ARREGLO LA CADENA PARA PODERLA RECORRER
			$arrTempPaginasHijas = explode("#",$strPaginasHijas);
			$totalPaginas = count($arrTempPaginasHijas);
			for ($j=0;$j<$totalPaginas;$j++){
			
				//TOMAMOS LA INFORMACION DE LA PAGINA Y LA GUARDAMOS EN EL ARREGLO DE PAGINAS
				$arrPaginaHija = explode(":",$arrTempPaginasHijas[$j]);
				$idAlias = $arrPaginaHija[0];
				if ($idAlias)
					$arrPaginas[$idAlias] = $arrPaginaHija[1];
			}
  		
  		}
  		
  		if (count($arrPaginas)>0)
  			asort($arrPaginas);
  		
  		return $arrPaginas;
  	}

}

?>