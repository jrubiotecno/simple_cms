<script>

	function validarPagina(){

		var forma = document.formaBoletin;
		var msj = "";		

		//VERIFICAMOS LOS CAMPOS EDITOR
		if (forma.objetos_editor.value!=''){
			var strValores = forma.objetos_editor.value;
			var objetos = strValores.split(';');
			for (i=0;i<objetos.length;i++){

				if (objetos[i]!=""){

					var objetoEditor = eval("forma.editor_" + objetos[i]);
					var objetoEditorOculto = $("editor_oculto_" + objetos[i]);

					objetoEditorOculto.value = tinyMCE.activeEditor.getContent();
					objetoEditor.value = objetoEditorOculto.value;

				}	
			}			
		}


		if (validarForma(forma)){
			
			if (msj!="")
				alert(msj);
			else
				forma.submit();
		}

	}
	
</script>
	
</script>	
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
	<td class="textos" >
			<?php include("includes/general/encabezado.php");?>
	</td>
</tr>
<tr >
	<td>
	<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr class="Normal">
		<td align="left" valign="middle" class="titletable">
		Administrar informacion del boletin
		</td>	
	</tr>	
	<tr>
		<td align="center" valign="top">
			<br><br>
			<form name="formaBoletin" action="plugins.php" method="post" enctype="multipart/form-data">		
			<input type="text" name="id_boletin" value="<?=$this->id_boletin?>">
			<input type="text" name="modulo" value="multidioma">
			<input type="text" name="accion" value="guardarTraduccion">
			
			<table border="0" cellspacing="3" cellpadding="3" align="center">
			
			<tr class="Normal">
				<td>Subject:</td>
				<td>
				<?php
					$c_textbox = new Textbox;
					echo $c_textbox->Textbox ("subject", "Subject", 1, $this->subject, "textfields", 30, "", "", "","","");
				?>
				</td>
			</tr>			
			<tr class="Normal">
				<td>Plantilla:</td>
				<td>
				<?php
					$c_textarea = new Textarea;
					echo $c_textarea->Textarea("contenido", "Plantilla contenido", 1, $this->contenido_boletin, "mceEditor", 35, 5);
				?>								
				</td>
			</tr>			
			<tr class="Normal">
				<td colspan="2" align="center">
					<input type="hidden" name="objetos_editor" value="contenido;">
					<input type=button name=btn_guardar value="Guardar" class=buttons onclick="validarPagina();">
					<input type=button name=btn_guardar value="Volver al listado" class=buttons onclick="location.href='plugins.php?modulo=multidioma&accion=verListado&tablaTraducir=<?=$_REQUEST["id_tabla"]?>'">
				</td>
			</tr>						
			</table>
			
		</td>
	</tr>
	</table>
	</td>
</tr>
</table>
<?php

include("includes/general/pie.php");

?>
