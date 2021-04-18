<?//header("Location: admin");?><?php//DETERMINO SI ESTA LOGUEADO PARA MOSTRAR LINK DE ADMINISTRADORif($_SESSION['LOGUEADO']) {
	echo "<div class=\"admin\">";	echo $_SESSION['NOMBRES_USUARIO'] . " - " . $_SESSION['USUARIO'] . " - ";	echo "<a href=\"javascript:details('admin','administrador');\" class=\"linkAdmin\">Entrar</a> - Salir";	echo "</div>";
}?><?phpif ($appObj->modulo){}
?>