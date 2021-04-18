<div class="titulo">

	<h1>Contactenos para asesorarle</h1>

	<p>

		<b>

		Teléfonos de Contacto: (57) (1) 4762444

		<br />

		Solicitud de información: <a href="mailto: comercial@hbp.net.co" title="Mas Informacion">comercial@hbp.net.co</a>

		<br />



		Ventas: <a href="mailto:ventas@hbp.net.co">ventas@hbp.net.co</a>

		<br />

		Bogotá, Colombia

		</b>

	</p>

</div>

<h2>Para poder ampliar la información que requiere por favor diligencie el siguiente formulario:</h2>

<br />

<div class="formcontactenos">



	<form action="index.php?page=contactenos" method="post" id="contactform">

		<ol>

			<li>

				<label for="empresa">

					Nombre:

				</label>

				<input id="nombre" name="nombre" class="text validate[required]">

			</li>

			<li>

				<label for="nit">

					APELLIDO:

				</label>

				<input id="apellido" name="apellido" class="text validate[required]">

			</li>

			<li>

				<label for="nombres">

					Empresa:

				</label>

				<input id="empresa" name="empresa" class="text validate[required]">

			</li>

			<li>

				<label for="apellidos">

					NIT:

				</label>

				<input id="nit" name="nit" class="text validate[required,custom[integer]]">

			</li>

			<li>

				<label for="apellidos">

					NUMERO DE PERSONAS EN LA EMPRESA:

				</label>

				<input id="numpersonas" name="numpersonas" class="text validate[required,custom[integer]]">

			</li>

			<li>

				<label for="apellidos">

					CARGO:

				</label>

				<input id="cargo" name="cargo" class="text validate[required]">

			</li>

			<li>

				<label for="apellidos">

					E-MAIL:

				</label>

				<input id="email" name="email" class="text validate[required,custom[email]]">

			</li>

			<li>

				<label for="apellidos">

					PAIS:

				</label>

				<input id="pais" name="pais" class="text validate[required]">

			</li>

			<li>

				<label for="apellidos">

					CIUDAD:

				</label>

				<input id="ciudad" name="ciudad" class="text validate[required]">

			</li>			

			<li>

				<label for="apellidos">

					TELEFONO:

				</label>

				<input id="telefono" name="telefono" class="text validate[required,custom[integer]]">

			</li>

			<li>

				<label for="message">

					COMENTARIOS:

				</label>

				<textarea id="message" name="message" rows="6" cols="50" class="text validate[required]"></textarea>

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

