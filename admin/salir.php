<?
require_once ("../utilidades/adodb.php");
require_once ("../conf/config.php");
require_once ("../logica/usuarios/usuarios.php");
session_start();
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
*/
$db = new ADODB;
$db->query("INSERT INTO admin_auditoria VALUES (0,NOW(),'$_SESSION[s_usuario]','Sale del Sistema')");	
session_destroy();
print "<html><script>window.location='login.php';</script></html>";
//header("Location: login.php");
?>