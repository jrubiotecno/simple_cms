<?php

class CargarLibrerias{

	function CargarLibrerias(){

		
	}

	function DBConnect($path="./"){

		require_once ($path."conf/config.php");
		require_once ($path."conf/language_es.php");
		require_once ($path."utilidades/adodb/adodb.inc.php");
		require_once ($path."utilidades/adodb/adodb-active-record.inc.php");

		$ref = getenv('HTTP_REFERER');  
		if ($_REQUEST['Ajax'] && (!$ref || $ref=="") && !$_REQUEST["persistenceAjax"]){
			echo "No hay referencia";
			exit;
		}
		
		if(!is_object($db)){
			Global $db;
			$db = NewADOConnection($CONF['CONF_DB_TYPE']);
			$db->Connect($CONF['CONF_DB_HOST'],$CONF['CONF_DB_USER'],$CONF['CONF_DB_PASS'],$CONF['CONF_DB_NAME']);			
			ADOdb_Active_Record::SetDatabaseAdapter($db);
		}
	

	}

	function PHPInit(){		

		require_once ("./utilidades/funciones.php");	
	
	}

	function PHPEnd(){

		return;
	}


	function JSInit(){
		echo "<script type=\"text/javascript\" src=\"./javascript/appscript.js\"></script>\n";
	}

	function JSEnd(){
				
	}

	function CSSInit(){
		echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"styles/style.css\" media=\"screen\" />\n";
	}

	function HTMInit(){
		
		Global $appObj;

		//DETERMINAMOS SI LAS METAS VIENEN DE UN PLUGN
		if ($appObj->metasPlugin){
			$appObj->checkMetasPlugin();
		}

		echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";		
		echo "<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"es\" xml:lang=\"es\">\n";						
		echo "<head>\n";
		echo "<title>". $appObj->paramGral["P_TITULO_PAGINAS"] ."</title>\n";
		echo "<meta http-equiv=\"refresh\" content=\"".($appObj->paramGral["P_TIME_SESSION"]*200)." URL=index.php\" />\n";
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\n";				
		echo "<meta http-equiv=\"Content-Language\" content=\"es\" />\n";
		echo "<meta name=\"DC.Language\" scheme=\"RFC1766\" content=\"Spanish\" />\n";				
		echo "<meta name=\"generator\" content=\"".$appObj->paramGral["GENERATOR_META"]."\" />\n";		
		echo "<meta name=\"description\" content=\"".$appObj->paramGral["DESCRIPTION_META"]."\" />\n";
		echo "<meta name=\"keywords\" content=\"".$appObj->paramGral["KEYWORDS_META"]."\" />\n";		
		echo "<meta name=\"robots\" content=\"all\" />\n";
		echo "<link href=\"./images/ico.ico\" rel=\"shortcut icon\"/>\n";
		$this->CSSInit();
		$this->JSInit();
		echo "</head>\n";
		echo "<body>\n";

	}

	function HTMEnd(){
		
		Global $appObj;
		
		$this->JSEnd();
		echo $appObj->paramGral["ESTADISTICAS"]. "\n";		
		echo "</body>\n";		
		echo "</html>\n";		

	}
	

	
}

?>