<?php

class AppObj{

	var $paramGral = array();
	var $paramCustom = array();
	var $aliasPage = 0;
	var $idPagePadre = 0;
	var $nombre = "";
	var $tituloHtml = "";	
	var $modulo = "";
	var $accion = "";
	var $id = "";
	var $Lightbox = false;
	var $Ajax = false;
	var $xml = false;
	var $metasPlugin = false;
	var $scriptsIncludesHeader = "";	
	var $scriptsIncludesFooter = "";	
	var $scriptsCodeHeader = "";	
	var $scriptsCodeFooter = "";	


	function AppObj(){
		
		//CONSTRUCTOR VACIO
	}

	/*
	 *Funcion que permite chequear la informacion que tiene una pagina
	 */
	function checkPage(){
		
		global $db;
		
		$this->aliasPage = $_REQUEST["page"];
		
		if(count($_GET)==0){
			$this->aliasPage = "Inicio";
		}
	
		if ($this->aliasPage){
			//TRAEMOS LA INFORMACION DEL PAGE
			$strSQL = "SELECT app_paginas.id_pagina, app_paginas.id_pagina_padre, app_paginas.nombre, app_paginas.titulo_html, app_paginas.id_tipo, app_paginas.target, app_paginas.modulo, app_paginas.accion, app_paginas.id, app_paginas.descripcion, app_paginas.palabras_clave, app_paginas.scripts_includes_ini, app_paginas.scripts_includes_fin, app_paginas.scripts_code_ini, app_paginas.scripts_code_fin FROM app_paginas WHERE alias='".$this->aliasPage."' AND oculto=-1";
			$rsPage = $db->Execute($strSQL);		
			if(!$rsPage->EOF){

				$nombre = $rsPage->fields["nombre"];	
				$tituloHtml = $rsPage->fields["titulo_html"];
				$this->idPagePadre = $rsPage->fields["id_pagina_padre"];	
				$this->nombre = $rsPage->fields["nombre"];	
				$this->tituloHtml = $rsPage->fields["titulo_html"];
				$this->modulo = $rsPage->fields["modulo"];
					
				$this->accion = ($_REQUEST["accion"]!="") ? $_REQUEST["accion"] : $rsPage->fields["accion"] ;
					
				$this->id = $rsPage->fields["id"];	

				$tituloPagina = $nombre;			
				if ($tituloHtml)
					$tituloPagina = $tituloHtml;
				$description = $rsPage->fields["descripcion"];	
				$keywords = $rsPage->fields["palabras_clave"];	


				$this->paramGral["P_TITULO_PAGINAS"] = $this->paramGral["P_TITULO_PAGINAS"] . " - " . $tituloPagina;	

				if ($description)
					$this->paramGral["DESCRIPTION_META"] = $description;	

				if ($keywords)
					$this->paramGral["KEYWORDS_META"] = $keywords;
				
				//INCLUDES DINAMICOS
				$this->scriptsIncludesHeader = $rsPage->fields["scripts_includes_ini"];	
				$this->scriptsIncludesFooter = $rsPage->fields["scripts_includes_fin"];	
				$this->scriptsCodeHeader = $rsPage->fields["scripts_code_ini"];	
				$this->scriptsCodeFooter = $rsPage->fields["scripts_code_fin"];					
				
				$this->Ajax = $_REQUEST["Ajax"];  			
				$this->xml = $_REQUEST["xml"];  				
				
				if ($rsPage->fields["target"]=="lightbox"){
					$this->Lightbox = true;
					$this->Ajax = false;
					$this->xml = false;
				}
			}
		}
		else{					
			
			if ($_REQUEST["Ajax"] || $_REQUEST["xml"]){
			
				//VALIDAMOS INFORMACION QUE LLEGA EN EL REQUEST
				if ($_REQUEST["Ajax"])
					$this->Ajax = $_REQUEST["Ajax"];  			

				if ($_REQUEST["xml"])
					$this->xml = $_REQUEST["xml"];  			

				if ($this->Ajax || $this->xml){
					$this->modulo = $_REQUEST["modulo"];
					$this->accion = $_REQUEST["accion"];				  					
				}	
			}
			else if ($_REQUEST["modulo"] && $_REQUEST["accion"]){
				$this->metasPlugin = true;
				$this->modulo = $_REQUEST["modulo"];
				$this->accion = $_REQUEST["accion"];
				$this->Ajax = false;
				$this->xml = false;	
				if ($_REQUEST["lightbox"])
					$this->Lightbox = true;
			}
		}
		
	}	
	
  	/**
  	 * Funci�n traer los parametros generales de la aplicacion
  	 */ 	
	function getParamGral(){
		
		global $db;		
		
		//TRAEMOS LOS PARAMETROS GENERALES DE LA APLICACION
		$strSQL = "SELECT app_param_global.id_parametro, app_param_global.parametro, app_param_global.valor FROM app_param_global";
		$rsParamGral = $db->Execute($strSQL);		
		
		while (!$rsParamGral->EOF){
			$arrParamGral[$rsParamGral->fields["parametro"]] = $rsParamGral->fields["valor"];
			$rsParamGral->MoveNext();
		}
		
		//GUARDAMOS LOS MESES EN EL OBJETO GENERAL
		$arrParamGral["arrMeses"] = $this->getMeses();
		
		//GUARDAMOS LOS ANIOS EN EL OBJETO GENERAL
		$arrParamGral["arrAnios"] = $this->getAnios(5,2);
		
		$this->paramGral = $arrParamGral;
		return;
	}

	//TRAE MESES
	function getMeses(){
	
		$arrMeses[1] = "Enero"; 
		$arrMeses[2] = "Febrero"; 
		$arrMeses[3] = "Marzo"; 
		$arrMeses[4] = "Abril"; 
		$arrMeses[5] = "Mayo"; 
		$arrMeses[6] = "Junio"; 
		$arrMeses[7] = "Julio"; 
		$arrMeses[8] = "Agosto"; 
		$arrMeses[9] = "Septiembre"; 
		$arrMeses[10] = "Octubre"; 
		$arrMeses[11] = "Noviembre"; 
		$arrMeses[12] = "Diciembre"; 
		
		return $arrMeses;
		
	}
	
	
	//TRAE A�OS
	function getAnios($inicial,$final){
	
		$anioInicial = date("Y") - $inicial;
		$anioFin = date("Y") + $final;
		
		for ($i=$anioInicial;$i<=$anioFin;$i++){
		
			$arrAnios[$i] = $i;
		}
		
		return $arrAnios;
	}


  	/**
  	 * Funci�n generar el path de la pagina visitada
  	 */  	
  	function getPathContent($separador="/",$estilo=""){
  	
  		global $db;
  	
  		$_SESSION["arrPath"] = null;
  		
  		$idContenidoPadre = $this->idPagePadre; 
  		  		
  		if ($idContenidoPadre=="0"){
  		
  			$tituloPath = $this->nombre;
			if ($this->tituloHtml)
				$tituloPath = $this->tituloHtml;
  		
  			$urlLink = "index.php?".htmlentities("page=". $this->aliasPage);
			$link = $separador . " <a href='".$urlLink."' class='".$estilo."'>".$tituloPath."</a> ";			  			
			$strPath = $link;
  		}
  		else{
  			$this->getGenealogia($this->aliasPage,$separador,$estilo);  			
  			
  			$arrPath = array_reverse($_SESSION["arrPath"]);  			
			for ($i=0;$i<count($arrPath);$i++){
				$strPath .= $arrPath[$i];			
			}  			
  		}  		
  		
  		return $strPath;
  	}

  	/**
  	 * Funci�n generar la genealogia de la contenido visitada
  	 */  	
  	function getGenealogia($aliasPage="0",$separador,$estilo){
  	
		global $db;
		$db_class = $db;

		if ($aliasPage=="0"){
			return $_SESSION["arrPath"];
		}
		
		$strSQL = "SELECT id_pagina_padre, nombre, titulo_html , alias FROM app_paginas WHERE alias='" . $aliasPage . "'";
		$rsConsulta = $db_class->Execute($strSQL);				
				
		if(!$rsConsulta->EOF){
		
			$aliasPagina = $rsConsulta->fields["alias"];
			$idPaginaPadre = $rsConsulta->fields["id_pagina_padre"];
			
			$tituloLink = $rsConsulta->fields["nombre"];
			//if ($rsConsulta->fields["titulo_html"])
			//	$tituloLink = $rsConsulta->fields["titulo_html"];
			
			$urlLink = "index.php?".htmlentities("page=". $aliasPagina);
			$link = $separador . " <a href='".$urlLink."' class='".$estilo."'>".$tituloLink."</a> ";			
			$_SESSION["arrPath"][] = $link;
			$this->getGenealogia($idPaginaPadre,$separador,$estilo);
			
		}
		
  	
  	}

  	/**
  	 * Funci�n para incluir librerias y codigo de forma dinamica dependiendo de la pagina
  	 */  	
  	function scriptsInclude($seccion,$tipo){
	
	
	}

  	/**
  	 * Funci�n generar las metas dependiendo del plugin
  	 */  	
  	function checkMetasPlugin(){
  		
		$plug = $this->modulo;
		
		if (file_exists("./plugins/".$plug ."/class_".$plug .".php")){
			require_once ("./plugins/".$plug ."/class_".$plug .".php");

			//TRAEMOS LOS METAS GENERALES DEL PLUGIN
			$condicion = "plugin='" . $plug."'";
			$arrMetasGeneral = $this->getMetas("titulo_pagina, palabras_clave, descripcion","app_plugins_seo",$condicion);

			//DETERMINAMOS SI LOS METAS GENERALES SON DIFERENTES DE VACIO
			if ($arrMetasGeneral["keywords"]!="")
				$this->paramGral["KEYWORDS_META"] = $arrMetasGeneral["keywords"];

			if ($arrMetasGeneral["description"]!="")
				$this->paramGral["DESCRIPTION_META"] = $arrMetasGeneral["description"];

			if ($arrMetasGeneral["titulo_pagina"]!="")
				$tituloPagina = $arrMetasGeneral["titulo_pagina"] . "-" .  $this->paramGral["P_TITULO_PAGINAS"];			

			//INSTANCIAMOS LA CLASE SEGUN EL REQUEST		
			@$plugin = new $plug;
			if (method_exists($plugin,"checkMetas")){
				$arrMetas = $plugin->checkMetas();

				//DETERMINAMOS SI LOS METAS SON DIFERENTES DE VACIO
				if ($arrMetas["keywords"]!="")
					$this->paramGral["KEYWORDS_META"] = $arrMetas["keywords"];	

				if ($arrMetas["description"]!="")
					$this->paramGral["DESCRIPTION_META"] = $arrMetas["description"];

				if ($arrMetas["titulo_pagina"]!="")
					$tituloPagina = $arrMetas["titulo_pagina"] . "-" . $this->paramGral["P_TITULO_PAGINAS"]; 

							
			}
			
			$this->paramGral["P_TITULO_PAGINAS"] = $tituloPagina;
		}
  	
  	}

  	/**
  	 * Funci�n para obtener los metas por tabla, campos y condicion
  	 */
	function getMetas($campos,$tabla,$condicion){
	
		global $db,$id,$accion,$option,$option2,$appObj;		

		$arrMetasOptions = array();

		$strSQL = "SELECT ".$campos." FROM ".$tabla." WHERE ".$condicion;
		$metas = $db->Execute($strSQL);
		if (!$metas->EOF){				
			($metas->fields["palabras_clave"])?$arrMetasOptions["keywords"] = $metas->fields["palabras_clave"]:"";
			($metas->fields["descripcion"])?$arrMetasOptions["description"] = $metas->fields["descripcion"]:"";
			($metas->fields["titulo_pagina"])?$arrMetasOptions["titulo_pagina"] = $metas->fields["titulo_pagina"]:"";
		}		
		return $arrMetasOptions;
	}  	

  	/**
  	 * Funci�n para cambiar los caracteres que hacen XSS
  	 */
	function removeXSS($texto=""){
		
		$strTexto = str_replace("<","",$texto);
		$strTexto = str_replace(">","",$strTexto);
		$strTexto = str_replace("&","",$strTexto);
		$strTexto = str_replace("script","",$strTexto);
		$strTexto = str_replace("javascript","",$strTexto);
		
		return $strTexto;
		
	}  	
	
}

?>