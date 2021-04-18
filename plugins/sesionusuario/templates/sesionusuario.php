<? if($_SESSION[at]==""){

$ac="index.php";

	if($_GET[page])	

		$ac=$ac."?page=".$_GET[page];

?>

<span style="color:RED;font-weight:bold"><?=$result?></span>

<div class="box ads">

	<div class="wtitle">

		<h2>Inicie Sesion en HBP</h2>

	</div>

	<div class="content">

		<form name="f1" id="f1" action="<?=$ac?>" method="post">

			<p>

				<label class="formTxt">

					-Usuario-

				</label>

				<input type="text" name="user" id="user" value="" class="txtBox1 validate[required]" />

				<label class="formTxt">

					-Password-

				</label>

				<input type="password" name="pas" id="pas" value="" class="txtBox1 validate[required]" />

				<label class="fp">

					<a href="index.php?page=recordar">

					<span>Recordar contrase&ntilde;a</span>

					</a>

					

				</label>

				<input type="submit" name="login" value="" class="login" />

				<label class="reg">

					<a href="index.php?page=registro">

					<span>Registrarse Ahora</span>

					</a>

				</label>

				<br />

			</p>

			<p>

				<br class="spacer" />

			</p>

			<input type="hidden" name="logUsuario" value="1" id="logUsuario" />

		</form>

	</div>

	<!--/content -->

</div>

<script type="text/javascript">

jQuery("#f1").validationEngine();

</script>

<?

	}

	else

	{

?>	

<div class="box ads">

	<div class="wtitle">

		<h2><?=$_SESSION[hbpreg_nombreempresa]?></h2>

	</div>

	<div class="content">

	<ul>

	  <li>

		<a href="index.php?modulo=misordenes&accion=int&processGet=true" class="active" rel="tabs_archive">Instructivo Sesion</a>

	  </li>

	  <li>

		<a href="index.php?modulo=crearorden&accion=ini&processGet=true" class="active" rel="tabs_archive">Crear Orden Por Niveles</a>

	  </li>

	  <li>

		<a href="index.php?modulo=crearordenpr&accion=ini&processGet=true" class="active" rel="tabs_archive">Crear Orden Por Producto</a>

	  </li>

	  <li>

		<a href="index.php?modulo=misordenes&accion=ini&processGet=true" class="active" rel="tabs_archive">Mis Ordenes</a>

	  </li>	  

	  <li>

		<a href="index.php?modulo=sesionusuario&accion=cerrar&processGet=true&pg=<?=$_GET[page]?>" class="active" rel="tabs_archive">Cerrar Sesion</a>

	  </li>

	</ul>

	</div><br />

	<!--/content -->

</div>

<?

	}

?>