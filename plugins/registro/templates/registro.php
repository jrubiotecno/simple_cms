<div class="titulo">
	<h1>Registro de nuevo usuario</h1>
</div>
<h2>Para poder registrarse por favor diligencie el siguiente formulario:</h2>
<br />
<div class="formcontactenos">

	<form action="index.php?page=registro" method="post" id="contactform">
		<ol>
			<li>
				<label for="empresa">
					Nombre empresa:
				</label>
				<input id="nombreempresa" name="nombreempresa" class="text validate[required,minSize[5]]">
			</li>
			<li>
				<label for="nit">
					Nit:
				</label>
				<input id="nit" name="nit" class="text validate[required,minSize[5],custom[integer]]">
			</li>
			<li>
				<label for="nombres">
					Nombre Persona:
				</label>
				<input id="nombrepers" name="nombrepers" class="text validate[required,minSize[5]]">
			</li>
			<li>
				<label for="apellidos">
					Apellidos Persona:
				</label>
				<input id="apellidos" name="apellidos" class="text validate[required,minSize[5]]">
			</li>
			<li>
				<label for="apellidos">
					Cargo:
				</label>
				<input id="cargo" name="cargo" class="text validate[required]">
			</li>
			<li>
				<label for="apellidos">
					Tel&eacute;fono:
				</label>
				<input id="telefono" name="telefono" class="text validate[required,custom[integer]]">
			</li>
			<li>
				<label for="apellidos">
					Tel&eacute;fono Celular:
				</label>
				<input id="celular" name="celular" class="text validate[required,custom[integer]]">
			</li>
			<li>
				<label for="apellidos">
					E-mail:
				</label>
				<input id="email" name="email" class="text validate[required]">
			</li>
			<li>
				<label for="apellidos">
					Direcci&oacute;n:
				</label>
				<input id="direccion" name="direccion" class="text validate[required]">
			</li>
			<li>
				<label for="apellidos">
					Pa&iacute;s:
				</label>
				<input id="pais" name="pais" class="text validate[required]">
			</li>
			<li>
				<label for="apellidos">
					Ciudad:
				</label>
				<input id="ciudad" name="ciudad" class="text validate[required]">
			</li>			
			<li>
				<label for="apellidos">
					N&uacute;mero de colaboradores:
				</label>
				<input id="numpersonas" name="numpersonas" class="text">
			</li>
			<li class="buttons">
				<input name="imageField" id="imageField" src="images/send.gif" class="send" type="image">
				<div class="clr">
				</div>
			</li>
		</ol>
	</form>
</div>
<script type="text/javascript">
jQuery("#contactform").validationEngine();
</script>
