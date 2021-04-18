<ul id="menu">
	<li><a href="index.php" style="padding: 0px"><img width="64px" src="../images/tpl/logos.png"></a></li>
<?php

$hayDatos = false;
$flag = false;
$comienzo = true;
$hayUl = false;

$menus = new AdminMenu();
$listado_menu = $menus -> findByPerfil($_SESSION['s_id_perfil']);

while ($menu = $listado_menu -> next_entry()) {

	if ($menu -> getmetodoPlublico() != "") {
		$link = "plugins.php?modulo=" . $menu -> getPluginMenu() . "&accion=" . $menu -> getmetodoPlublico() . "";
	} else {
		$link = "index.php?tabla=" . $menu -> getNombreTabla() . "";
	}

	$sb = "<a href=\"" . $link . "\">" . $menu -> getDescripcion() . "</a>";

	$a++;
	$menuData[$a][0] = count(explode('.', $menu -> getGrupo()));
	$menuData[$a][1] = $sb;

}

$ulAbierto = false;

for ($a = 1; $a <= count($menuData); $a++) {
	$b = $a + 1;

	if ($menuData[$a][0] == 1) {
		echo "<li>" . $menuData[$a][1];
	} else {
		if ($ulAbierto == false) {
			echo "<ul>";
			$ulAbierto = true;
		}

		echo "<li>" . $menuData[$a][1] . "</li>";

	}

	if ($menuData[$b][0] == 1) {
		if ($ulAbierto == true) {
			echo "</ul>";
			$ulAbierto = false;
		}

		echo "</li>";

	}

}
?>
<? if($_SESSION['s_esadmin'] == 1){?>	
<li>
	<a href="#">Administracion</a>
	<ul>
		<li><a href="javascript:details('control_usuarios','','','')">Usuarios</a></li>
	</ul>
</li>
<? } ?>
<li>
	<a href="salir.php">Salir</a>
</li>
</ul>