<?php
/**
* Adminsitración de tabla registro
* @author Andres Bravo
* @version 1.0
* El constructor de esta clase es {@link Registro()}
*/
class admin{

  
	var $Database;
	var $table;
  	
  	/**
	  * Constructor de la Clase
	  */
  	function admin() {
  	
  		global $db,$id,$accion,$option,$option2;
  	
  	}
  	
  	/**
      * Funciòn para seleccionar opciones de administrador
      */
  	function parseAdmin() {
 
 		global $db,$id,$accion,$option,$option2;
 	
 		switch($accion){

			case "administrador":
							$this->administrador();
							break;		 			
			case "validarUsuario":
							$this->validarUsuario();
							break;			
			case "listDatos":
							$this->listDatos();
							break;							
			case "editDatos":
							$this->editDatos();
							break;							
			case "saveDatos":
							$this->saveDatos();
							break;							
 		} 
     
  	}

  	/**
      * Funcion que permite crear el listado de una tabla segun la configuracion creada para la tabla que llegue como parametro
      */
	function listDatos(){

		global $db,$id,$accion,$option,$option2,$pagina,$LANG;
		
		require_once ("../plugins/admin/class_dataGrid.php");
		require_once ("../plugins/".$_REQUEST['id']."/class_".$_REQUEST['id'].".php");
		
		//INSTANCIAMOS LA CLASE SEGUN EL REQUEST
		$objGenerico = new $_REQUEST['id'];

		//GUARDAMOS LA TABLA QUE SE ESTA REVISANDO
		$this->table = $objGenerico->_table;	  		
	
		//INSTANCIAMOS LA CLASE DATA GRID	
		$dataGrid = new DataGrid($objGenerico);		

		//TRAEMOS ARREGLO CON ALGUNOS DATOS DE CONFIGURACION DE LA TABLA
		$arrConfTable = $this->getConfTable();
		
		//INSTANCIAMOS EL TITULO DEL ADMINISTRADOR
		$dataGrid->titleList=$LANG["titleAdminTable"]." ".$arrConfTable['descripcionTabla'];
		
		//TRAEMOS LAS OPCIONES QUE EXISTEN PARA LA TABLA 
		$dataGrid->arrOptionsHeader = $this->getOptionsHeader();
		
		//TRAEMOS LAS OPCIONES QUE EXISTE PARA CADA REGISTRO
		$dataGrid->posOptionsTable = "right";	
		$dataGrid->arrOptionsTable = $this->getOptionsRegister();	
		
		//TRAEMOS LOS TITULOS PARA LA TABLA
		$dataGrid->arrTitlesHeader = $this->getTitlesHeader();
		
		//TRAEMOS LA CONSULTA A EJECUTAR
		$dataGrid->SQL = $this->getSQL();	
		
		$dataGrid->generarDataGrid();		

	}


  	/**
      * Funcion que permite abrir la pagina donde se va a mostrar la seccion del administrador de la aplicacion
      */
  	function administrador(){
  
  		global $db,$id,$accion,$option,$option2;  	
  		
  		$menu = $this->doMenu();
		include_once("../plugins/admin/templates/administrador.php");  	
		
  	}

  
  	/**
      * Funcion que permite validar el usuario administrador de la aplicacion
      */
  	function validarUsuario(){
  
  		global $db,$id,$accion,$option,$option2;  	
  	
		//VALIDAR DATOS DEL USUARIO
		//CREAR UNA CLASE PARA USUARIOS
		$strSQL = "";
		
		$_SESSION['LOGUEADO'] = true;
		$_SESSION['ES_ADMIN'] = true;
		$_SESSION['NOMBRES_USUARIO'] = "Administrador";
		$_SESSION['USUARIO'] = "admin";
		$_SESSION['ID_PERFIL'] = 1;
		
		echo "logueado";
		
  	}


  	/**
      * Funcion que permite cerrar la session de usuario destruyendo todas las variables registradas para el usuario
      */  	
  	function salir(){
  	
  		session_destroy();
  	}


  	/**
      * Funcion que permite crear el menu de los datos a administrar
      */
  	function doMenu(){
  
  		global $db;  	
  		
  		
  		
  		$strMenu .= "<script>";
	
		$strMenu .= "var myMenu =\n";
		$strMenu .= "[\n";
		
		//ARMAMOS EL MENU SEGUN LA CONFIGURACION DE LA TABLA
		$strMenu .= "['<img src=\"../images/llave.gif\" valign=\"absmiddle\" width=\"20\" height=\"20\">', 'Menu Registro', 'javascript:details(\'admin\',\'listDatos\',\'registro\',\'\');', '_top', 'Menu Registro'],";

		//MENU SOLO CUANDO EL USUARIO ES ADMINISTRADOR
		if($_SESSION['ES_ADMIN'] == true){
  			$strMenu .= "['<img src=\"../images/secure.gif\" valign=\"absmiddle\" width=\"20\" height=\"20\">', 'Titulo Administracion', '#', '_top', 'Titulo Administracion',";
  			$strMenu .= "['<img src=\"../images/gente.gif\" valign=\"absmiddle\" width=\"20\" height=\"20\">', 'Titulo Usuarios', 'javascript:details(\'control_usuarios\',\'\',\'\',\'\');', '_top', 'Titulo Usuarios']";
			$strMenu .= "],_cmSplit,";
		}

		$strMenu .= "['<img src=\"../images/llave.gif\" valign=\"absmiddle\" width=\"20\" height=\"20\">', 'Titulo Cambiar Clave', 'javascript:details(\'control_usuarios\',\'cambiar_clave\',\'\',\'\');', '_top', 'Titulo Cambiar Clave'],";
		$strMenu .= "['<img src=\"../images/exit.gif\" valign=\"absmiddle\" width=\"20\" height=\"20\">', 'Tiulo Salir', 'salir.php', '_top', 'Titulo Salir']";

		$strMenu .= "];";


		$strMenu .= "cmDraw ('contenedorMenu', myMenu, 'hbr', cmThemeOffice);";


		$strMenu .= "</script>";
		
		return $strMenu;
						
  	}
  	  
 	/**
 	 * Funciòn para obtener el campo llave de la tabla
 	 */
 	function getCampoClave() {
   		
   		global $db;
   		
   		//TRAEMOS EL CAMPO CLAVE DE LA TABLA SELECCIONADA SEGUN EL ADMINISTRADOR CONFIGURADO
   		$strSQL = "SELECT nombre_campo FROM admin_tablas WHERE nombre_tabla='".$this->table."' AND campo_es_id=1";
   		$lista = $db->Execute($strSQL);
   		if (!$lista->EOF)
   			$campoClave = $lista->fields["nombre_campo"];
   		else{
   			echo "La tabla <b>".$this->table."</b> no tiene configurado campo clave. Verifique.";
   			exit;
   		}
   
   		return $campoClave;
  	}
  
 	/**
 	 * Funciòn para obtener un arreglo con algunos datos de configuracion de una tabla configurada en el administrador de datos
 	 */
 	function getConfTable() {
   		
   		global $db;
   		
   		$arrConfTable = array();   		
   		
   		//TRAEMOS LA DESCRIPCION DE LA TABLA
   		$strSQL = "SELECT descripcion FROM admin_menu WHERE nombre_tabla='".$this->table."'";
   		$lista = $db->Execute($strSQL);
   		if (!$lista->EOF)
   			$arrConfTable["descripcionTabla"] = $lista->fields["descripcion"];
   		else
   			$arrConfTable["descripcionTabla"] = "";
   
   		return $arrConfTable;
  	}

 	/**
 	 * Funciòn para retornar un arreglo con las opciones del header para la tabla administrada
 	 * Se validaran opciones de Insertar = 1, Consultar = 4, Exportar = 5;
 	 */
 	function getOptionsHeader() {
   		
   		global $db,$LANG;
   		  		
   		   		
   		//TRAEMOS LAS OPCIONES QUE TIENE EL PERFIL DEL USUARIO CONFIGURADO EN EL ADMINISTRADOR SEGUN LA TABLA   		
   		$strSQL = "SELECT id_tipo FROM admin_permisos WHERE nombre_tabla='".$this->table."' AND id_perfil='".$_SESSION['ID_PERFIL']."' AND (id_tipo=1 OR id_tipo=4 OR id_tipo=5)";
   		$lista = $db->Execute($strSQL);
   		$arrOptionsHeader = array();
   		while (!$lista->EOF){
   			
   			//SI TIENE PERMISO DE INSERTAR
   			if ($lista->fields["id_tipo"]==1){
   				$arrOptionsHeader["<img src='../images/ico_insertar.gif' border='0' title='".$LANG["nuevo"]."' align='absmiddle'> ".$LANG["nuevo"]]="Link Nuevo";
   			}
   			
   			//SI TIENE PERMISO DE CONSULTAR
   			if ($lista->fields["id_tipo"]==4)
   				$arrOptionsHeader["<img src='../images/ico_buscar.gif' border='0' title='".$LANG["consultar"]."' align='absmiddle'> ".$LANG["consultar"]]="javascript:alert(\"Link a \");";
   			
   			//SI TIENE PERMISO DE EXPORTAR
   			if ($lista->fields["id_tipo"]==5)
   				$arrOptionsHeader["<img src='../images/ico_exportar.gif' border='0' title='".$LANG["exportar"]."' align='absmiddle'> ".$LANG["exportar"]]="Link Exportar";   			
   			
   			$lista->MoveNext();
   		}	
   		
   		return $arrOptionsHeader;
  	}

 	/**
 	 * Funciòn para retornar un arreglo con las opciones de cada registro para la tabla administrada
 	 * Se validaran opciones de Editar = 3, Eliminar = 2
 	 */
 	function getOptionsRegister() {
   		
   		global $db,$LANG;
   		  		
   		   		
   		//TRAEMOS LAS OPCIONES QUE TIENE EL PERFIL DEL USUARIO CONFIGURADO EN EL ADMINISTRADOR SEGUN LA TABLA   		
   		$strSQL = "SELECT id_tipo FROM admin_permisos WHERE nombre_tabla='".$this->table."' AND id_perfil='".$_SESSION['ID_PERFIL']."' AND (id_tipo=2 OR id_tipo=3) ORDER BY id_tipo DESC";
   		$lista = $db->Execute($strSQL);
   		$arrOptionsRegister = array();
   		while (!$lista->EOF){
   			
   			//SI TIENE PERMISO DE EDITAR
   			if ($lista->fields["id_tipo"]==3){
   				$arrOptionsRegister["<img src='../images/ico_editar.gif' border='0' title='".$LANG["editar"]."' align='absmiddle'> ".$LANG["editar"]]="Link Editar";
   			}
   			
   			//SI TIENE PERMISO DE ELIMINAR
   			if ($lista->fields["id_tipo"]==2)
   				$arrOptionsRegister["<img src='../images/icon_borrar.gif' border='0' title='".$LANG["eliminar"]."' align='absmiddle'> ".$LANG["eliminar"]]="javascript:alert(\"Link a Eliminar\");";   			
   			   			
   			$lista->MoveNext();
   		}	
   		
   		return $arrOptionsRegister;
  	}

 	/**
 	 * Funciòn para retornar un arreglo con los rotulos de la tabla segun el administrador configurado
 	 */
 	function getTitlesHeader() {
   		
   		global $db,$LANG;   		  		
   		   		
		//TRAEMOS LOS CAMPOS A MOSTRAR EN EL ADMINISTRADOR SEGUN EL ADMINISTRADOR CONFIGURADO
   		$strSQL = "SELECT rotulo FROM admin_tablas WHERE nombre_tabla='".$this->table."' AND mostrar=1 ORDER BY id_tabla";
   		$lista = $db->Execute($strSQL);		   		
		while (!$lista->EOF){
  			$arrTitlesHeader[] = $lista->fields["rotulo"]; 			
  			$lista->MoveNext();  			
		}
		
  		return $arrTitlesHeader;
  	}

 	/**
 	 * Funciòn para retornar una cadena con el query a ejcutar para el grid segun el administrador configurado
 	 */
 	function getSQL() {
   		
   		global $db,$LANG;   		  		
   		   		
		//TRAEMOS LOS CAMPOS A MOSTRAR EN EL ADMINISTRADOR SEGUN EL ADMINISTRADOR CONFIGURADO
   		$strSQL = "SELECT nombre_campo, tabla_relacion, alias_tabla_relacion, campo_relacion, campo_imprimir FROM admin_tablas WHERE nombre_tabla='".$this->table."' AND mostrar=1 ORDER BY id_tabla";
   		$lista = $db->Execute($strSQL);		   		
		while (!$lista->EOF){
  			
  			//DETERMINAMOS SI HACE JOIN CON OTRAS TABLAS
  			if ($lista->fields["tabla_relacion"]){
  				
  				$strAliasTabla = $lista->fields["tabla_relacion"];  				
  				//DETERMINAMOS SI HAY UN ALIAS PARA LA TABLA RELACION
  				if ($lista->fields["alias_tabla_relacion"])
  					$strAliasTabla = $lista->fields["alias_tabla_relacion"];
  					
  				$strFROM .= " LEFT JOIN " . $lista->fields["tabla_relacion"] . " AS " . $strAliasTabla . " ON (".$this->table.".".$lista->fields["nombre_campo"]."=".$strAliasTabla.".".$lista->fields["campo_relacion"].")";
  				
  				$strSELECT .= $strAliasTabla.".".$lista->fields["campo_imprimir"]. " AS " . $strAliasTabla."_".$lista->fields["campo_imprimir"]." , ";
  				
  			}
  			else{
  				$strSELECT .= $this->table.".".$lista->fields["nombre_campo"]. " AS " . $this->table."_".$lista->fields["nombre_campo"]." , ";
  			}
  			
  			$lista->MoveNext();  			
		}
		
		$strQuery .= " SELECT ";
		$strQuery .= $strSELECT;
		
		//ADICIONAMOS EL CAMPO LLAVE DE LA TABLA
		$strQuery .= $this->table.".".$this->getCampoClave() . " AS " .$this->table."_".$this->getCampoClave();
		
		$strQuery .= " FROM ";
		$strQuery .= $this->table;
		$strQuery .= $strFROM;
		
		return $strQuery;
  	}



  //Campo llave
  //Array campos mostrar
  //Array campos rotulos
  //Array campos editar
  //Array campos editar
  //Condicion Consulta
  //Total filas mostrar
  //Ruta archivos
  //Edicion Ajax
  //Creacion 0=Normal , 1=Div
  //Ordernar default
  //Orientacion default
  
  

}

?>