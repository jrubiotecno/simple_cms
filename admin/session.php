<?php

/***********************************************************************************
							INCLUDES
*********************************************************************************/

session_start();

require_once ("../conf/config.php");
require_once ("../conf/language_admin_es.php");

require_once ("../utilidades/adodb.php");
require_once ("../utilidades/adodb/adodb.inc.php");
require_once ("../utilidades/adodb/adodb-pager.inc.php");
require_once ("../utilidades/adodb/adodb-active-record.inc.php");

require_once ("../utilidades/funciones.php");
require_once ("../utilidades/obj_list.php");
require_once ("../utilidades/class_paginador.php");
require_once ("../logica/general/generico.php");
require_once ("../logica/general/admin_permisos.php");
require_once ("../logica/general/admin_tipo_permiso.php");
require_once ("../logica/general/admin_tablas.php");
require_once ("../logica/general/admin_menu.php");

require_once ("../logica/usuarios/usuarios.php");
require_once ("../logica/usuarios/perfil.php");

require_once ("../utilidades/controles/textbox.php");
require_once ("../utilidades/controles/autocomplete.php");
require_once ("../utilidades/controles/password.php");
require_once ("../utilidades/controles/password_confirm.php");
require_once ("../utilidades/controles/textarea.php");
require_once ("../utilidades/controles/email.php");
require_once ("../utilidades/controles/date_box.php");
require_once ("../utilidades/controles/number_integer.php");
require_once ("../utilidades/controles/number_real.php");
require_once ("../utilidades/controles/filebox.php");
require_once ("../utilidades/controles/radio.php");
require_once ("../utilidades/controles/html_control.php");
require_once ("../utilidades/controles/select.php");
require_once ("../utilidades/controles/checkbox.php");
require_once ("../utilidades/class_hcemd5.php");

$c_textbox = new Textbox;
$c_autocomplete = new Autocomplete;
$c_checkbox= new Checkbox;
$c_email = new Email;
$c_n_integer = new NumberInteger;
$c_n_real = new NumberReal;
$c_password = new Password;
$c_passwordConfirm = new PasswordConfirm;
$c_radio = new Radio;
$c_select = new Select;
$c_textarea = new Textarea;
$c_filebox = new FileBox;
$c_datebox = new DateBox;

extract($_POST);
extract($_GET);


if(!is_object($db)){
	$db = NewADOConnection($CONF['CONF_DB_TYPE']);
	$db->Connect($CONF['CONF_DB_HOST'],$CONF['CONF_DB_USER'],$CONF['CONF_DB_PASS'],$CONF['CONF_DB_NAME']);
	ADOdb_Active_Record::SetDatabaseAdapter($db);
}

if (!$_POST['Ajax'] && !$_GET['Ajax']){
	echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
	';
	echo "<head>\n";
	echo "<title>::: Administrador :::</title>\n";
	//echo "<meta http-equiv='refresh' content='".(30*60)." URL=salir.php'>\n";
	echo "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>\n";
	
	//Hoja estilos gridtable
	echo "<link href=\"../styles/gridstyles/dhtmlx_custom.css\" rel=\"stylesheet\" type=\"text/css\">";

	//Hoja de estilo del calendario
	echo "<link rel=\"stylesheet\" type=\"text/css\" media=\"all\" href=\"../javascript/jscalendar-1.0/calendar-win2k-cold-1.css\" title=\"win2k-cold-1\" />";

	//Hoja de estilos para ventanas prototype
	echo "<link href=\"../styles/default.css\" rel=\"stylesheet\" type=\"text/css\">";

	echo "<link href=\"../styles/estilos.css\" rel=\"stylesheet\" type=\"text/css\">";
	
	echo '<script src="../javascript/jquery.js" async=""></script>';


}

if (!$bandera_sin_javascript && !$_POST['Ajax'] && !$_GET['Ajax']){

	//DETERMINAMOS SI LA PAGINA SE ABRE POR UN DIV
	if (!$pagInDiv) {
		echo "<script>";
		echo "var ventana;";
		echo "</script>";
	}

	echo "<script language=\"JavaScript\" src=\"../javascript/varGlobals.js\"></script>\n";
	echo "<script language=\"JavaScript\" src=\"../javascript/validationscripts.js\"></script>\n";
	echo "<script language=\"JavaScript\" src=\"../javascript/prototype.js\"></script>\n";
	echo "<script type=\"text/javascript\" src=\"../javascript/scriptaculous.js?load=effects\"></script>\n";
	echo "<script type=\"text/javascript\" src=\"../javascript/controls.js\"></script>\n";
	echo "<script type=\"text/javascript\" src=\"../javascript/effects.js\"></script>\n";
	echo "<script type=\"text/javascript\" src=\"../javascript/window.js\"></script>\n";
	echo "<script type=\"text/javascript\" src=\"../javascript/jsvalidate.js\"></script>\n";
	echo "<script language=\"JavaScript\" src=\"../javascript/jscalendar-1.0/calendar.js\"></script>";
	echo "<script language=\"JavaScript\" src=\"../javascript/jscalendar-1.0/lang/calendar-es.js\"></script>";
	echo "<script language=\"JavaScript\" src=\"../javascript/jscalendar-1.0/calendar-setup.js\"></script>";
	echo "<script language=\"JavaScript\" src=\"../javascript/ajaxfunctions.js\"></script>\n";
	echo "<script language=\"JavaScript\" src=\"../javascript/JSCookMenu/JSCookMenu.js\"></script>";
	echo "<script language=\"JavaScript\" src=\"../javascript/JSCookMenu/effect.js\"></script>";
	echo "<script language=\"JavaScript\">var myThemeOfficeBase = \"../javascript/JSCookMenu/ThemeOffice2003/\";</script>";
	echo "<script language=\"JavaScript\" src=\"../javascript/tiny_mce/tiny_mce.js\"></script>";
	echo "<link rel=\"stylesheet\" href=\"../javascript/JSCookMenu/ThemeOffice/theme.css\" type=\"text/css\">";
	echo "<script language=\"JavaScript\" src=\"../javascript/JSCookMenu/ThemeOffice/theme.js\"></script>";


	echo "
	<script language=\"javascript\" type=\"text/javascript\">
		tinyMCE.init({
			// General options
			mode : \"specific_textareas\",
			editor_selector : \"mceEditor\",
			theme : \"advanced\",
			plugins : \"safari,pagebreak,style,layer,table,save,advimage,advlink,preview,media,contextmenu,paste,fullscreen,noneditable,nonbreaking,template,inlinepopupS\",

			// Theme options
			theme_advanced_buttons1 : \"save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,fontselect,fontsizeselect\",
			theme_advanced_buttons2 : \"cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor\",
			theme_advanced_buttons3 : \"tablecontrols,|,visualaid,|,charmap,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen\",
			theme_advanced_buttons4 : \"insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak\",
			theme_advanced_toolbar_location : \"top\",
			theme_advanced_toolbar_align : \"left\",
			theme_advanced_statusbar_location : \"bottom\",
			theme_advanced_resizing : true,
			content_css : \"../styles/estilos.css\",
			file_browser_callback : \"ajaxfilemanager\",
			external_link_list_url : \"tinymce_link_list.php\",
			external_image_list_url : \"example_image_list.js\",
			media_external_list_url : \"example_media_list.js\"
		});	


		function ajaxfilemanager(field_name, url, type, win) {
			var ajaxfilemanagerurl = \"../../plugins/plugins/ajaxfilemanager/ajaxfilemanager.php\";
			switch (type) {
				case \"image\":
					break;
				case \"media\":
					break;
				case \"flash\": 
					break;
				case \"file\":
					break;
				default:
					return false;
			}
            tinyMCE.activeEditor.windowManager.open({
                url: \"../../plugins/ajaxfilemanager/ajaxfilemanager.php\",
                width: 782,
                height: 440,
                inline : \"yes\",
                close_previous : \"no\"
            },{
                window : win,
                input : field_name
            });
            
		}


	</script>
	 
	 
	";

	echo "</head>\n";
	echo "<body bgcolor='#FFFFFF'>\n";
	echo "<div id=\"fade\" class=\"fadebox\" style=\"-moz-opacity: 0.5; opacity:0.50; filter: alpha(opacity=50);\">&nbsp;</div>";
}

if (!$_POST['Ajax'] && !$_GET['Ajax']){

	//SE CREAN FORMAS PARA ENVIAR DATOS
	echo "<form name='generico' method='post' action=''>";
	echo "<input type='hidden' name='modulo'>";
	echo "<input type='hidden' name='accion'>";
	echo "<input type='hidden' name='id'>";
	echo "<input type='hidden' name='option'>";
	echo "<input type='hidden' name='option2'>";
	echo "</form>";

	//SE CREAN FORMAS PARA ENVIAR DATOS
	echo "<form name='generico_admin' method='post' action=''>";
	echo "<input type='hidden' name='modulo'>";
	echo "<input type='hidden' name='accion'>";
	echo "<input type='hidden' name='tabla'>";
	echo "<input type='hidden' name='id'>";
	echo "<input type='hidden' name='campo'>";
	echo "<input type='hidden' name='option'>";
	echo "<input type='hidden' name='option2'>";
	echo "</form>";

	//SE CREAN FORMAS PARA PAGINADOR
	echo "<form name='paginador' method='post' action=''>";
	echo "<input type='hidden' name='modulo'>";
	echo "<input type='hidden' name='accion'>";
	echo "<input type='hidden' name='pagina'>";
	echo "<input type='hidden' name='id'>";
	echo "<input type='hidden' name='option'>";
	echo "<input type='hidden' name='option2'>";
	echo "</form>";

}


?>