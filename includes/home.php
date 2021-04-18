<?php
include ("plugins/menu/class_menu.php");
include ("plugins/param/class_param.php");
require_once ("plugins/sesionusuario/class_sesionusuario.php");
$menu = new menu();
$param = new param();
$param -> makeParam();
$params = $param -> getParam();
$plug = $appObj -> modulo;
require_once ("./plugins/" . $plug . "/class_" . $plug . ".php");
//INSTANCIAMOS LA CLASE SEGUN EL REQUEST
@$plugin = new $plug();
?>
<table width="100%" border="1">
	<tr>
		<td><?$menu -> getMenu();?></td>
	</tr>
	<tr>
		<td><?$plugin -> parsePublic();?></td>
	</tr>
</table>


<?php

echo $param -> getFooter();
?>
