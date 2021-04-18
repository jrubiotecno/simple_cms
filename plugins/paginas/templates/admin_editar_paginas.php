<script>
	function activarSelect(objeto){

		var tipo = objeto.value;	
		var len = objeto.length -1;
		
		for(i=len; i>=0; i--){						
			if ($("tr_" + objeto.item(i).value)!=null)
				$("tr_" + objeto.item(i).value).hide();
		}
		
		$("tr_" + tipo).show();
	}

	function mostrarTamanio(target){
	
		$("datosTamanios").hide();
		if (target=="lightbox"){
			$("datosTamanios").show();
		}	
	}

	function validarPagina(){

		var forma = document.formaPagina;
		var msj = "";	
		
		if (forma.tipo_contenido.value=="contenido" && (forma.contenido.value=="" || forma.contenido.value=="0"))
			msj += "Si selecciono en el tipo de contenido 'Contenido', debe seleccionar el contenido a cargar.\n";

		if (forma.tipo_contenido.value=="plugin" && (forma.plugin.value=="" || forma.plugin.value=="0"))
			msj += "Si selecciono en el tipo de contenido 'Plugin', debe seleccionar el plugin a cargar.\n";

		if (forma.tipo_contenido.value=="externo" && forma.link_externo.value=="")
			msj += "Si selecciono en el tipo de contenido 'Link externo', debe diligenciar el campo Link Externo.\n";
		
		if (forma.target.value=="lightbox" && (forma.ancho.value=="" || forma.ancho.value==0 || forma.alto.value=="" || forma.alto.value==0))
			msj += "Si selecciono abrir la pagina en un Lightbox, debe diligenciar los campos ancho y alto.\n";
		
		if (validarForma(forma)){
			
			if (msj!="")
				alert(msj);
			else
				forma.submit();
		}


	}
	
	function actualizarRuta(ruta){
		$("ruta").innerHTML = ruta;
	}
	
	function verificaAlias(alias){
		
		procesoAjaxAdmin('plugins', 'paginas','verficarAlias',alias,'','','verificar','');

		new PeriodicalExecuter(function(pe) {

			//VALIDAMOS ESTE OBJETO PARA HACER REDIRECCION
			if ($('verificado')!=null){				
				var aliasActual = $('aliasActual').innerHTML;
				if ($('verificado').innerHTML=="false" && aliasActual!=alias){
					document.formaPagina.alias.value="";
					alert("El alias asignado a esta pagina ya existe. Por favor cambielo.");					
				}
					
				pe.stop();
			}

		}, 1);
	
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
		Administrar informaci&oacute;n de la pagina
		</td>	
	</tr>	
	<tr>
		<td align="center" valign="top">
			<br><br>
			<form name="formaPagina" action="plugins.php" method="post" enctype="multipart/form-data">		
			<input type="hidden" name="id_pagina" value="<?=$pagina->id_pagina?>">
			<input type="hidden" name="id_padre" value="<?=$idPadre?>">
			<input type="hidden" name="id_pagina_padre" value="<?=$idPaginaPadre?>">			
			<input type="hidden" name="modulo" value="paginas">
			<input type="hidden" name="accion" value="guardarPagina">
			
			<table border="0" cellspacing="3" cellpadding="3" align="center">
			<tr class="Normal">
				<td>Pagina padre:</td>
				<td>
				<?php
				
					$idPaginaPadreAux = $pagina->id_pagina_padre;	
					if (!$idPaginaPadreAux)
						$idPaginaPadreAux = $idPadre;
				
					$c_select = new Select;
					$c_select->Select("id_pagina_padre", "Pagina padre", $arrPaginas, "", 0,$idPaginaPadreAux , "textfields", 0, "", "", 0);
					$c_select->enableBlankOption();				
					echo $c_select->genCode();				
				?>
				</td>
			</tr>
			<tr class="Normal">
				<td>Alias:</td>
				<td>
				<?php
					$c_textbox = new Textbox;
					echo $c_textbox->Textbox ("alias", "Alias", 1, $pagina->alias, "textfields", 30, "", "verificaAlias(this.value);", "","","actualizarRuta(this.value);");
				?>
				<span id="aliasActual" style="display:none"><?=$pagina->alias?></span>
				<span id="verificar" style="display:none"></span>
				Sin espacios
				</td>
			</tr>
			<tr class="Normal">
				<td>Link para llamar la pagina:</td>
				<td>http:/<?=$_SERVER["HTTP_HOST"]?>/index.php?page=<span id="ruta"><?=$pagina->alias?></span></td>
			</tr>		
			<tr class="Normal">
				<td>Nombre:</td>
				<td>
				<?php
					$c_textbox = new Textbox;
					echo $c_textbox->Textbox ("nombre", "Nombre", 1, $pagina->nombre, "textfields", 30, "", "", "");
				?>
				</td>
			</tr>
			<tr class="Normal">
				<td>Titulo HTML:</td>
				<td>
				<?php
					echo $c_textbox->Textbox ("titulo_html", "Titulo HTML", 1, $pagina->titulo_html, "textfields", 30, "", "", "");					
				?>
				</td>
			</tr>
			<tr class="Normal">
				<td>Tipo contenido:</td>
				<td>
				<?php
					$c_select->Select("tipo_contenido", "Tipo contenido para la pagina", $arrTiposContenido, "", 1,$pagina->id_tipo, "textfields", 0, "", "activarSelect(this);", 0);
					$c_select->enableBlankOption();				
					echo $c_select->genCode()
				?>				
				</td>
			</tr>
			<tr id="tr_contenido" style="display:none" class="Normal">
				<td>Contenidos creados:</td>
				<td>
				<?php
					$c_select1 = new Select;
					$strSQL = "SELECT id_contenido,titulo FROM contenido";
					$c_select1->Select("contenido", "Contenido", $db, $strSQL, 0,$pagina->id, "textfields", 0, "", "", 0);
					$c_select1->enableBlankOption();				
					echo $c_select1->genCode()
				?>				
				</td>
			</tr>
			<tr id="tr_plugin" style="display:none" class="Normal">
				<td>Plugins creados:</td>
				<td>
				<?php
					$c_select2 = new Select;
					$strSQL = "SELECT id_plugin,CONCAT(plugin,'-',descripcion_metodo) as plugin FROM app_plugins";
					$c_select2->Select("plugin", "Plugin", $db, $strSQL, 0,$idPlugin, "textfields", 0, "", "", 0);
					$c_select2->enableBlankOption();				
					echo $c_select2->genCode()
				?>				
				</td>
			</tr>	
			<tr id="tr_externo" style="display:none" class="Normal">
				<td>Link externo:</td>
				<td>
				<?php				
					echo $c_textbox->Textbox ("link_externo", "Link Externo", 0, $pagina->link_externo, "textfields", 30, "", "", "");					
				?>				
				</td>
			</tr>			
			<tr class="Normal">
				<td>Pagina oculta:</td>
				<td>
				<?php
					$c_radio = new Radio;
					$c_radio->Radio("oculto","Pagina oculta",$arrSiNo,"", 1, $pagina->oculto, "textfields", 0);
					while($tmp_html = $c_radio->next_entry()) {
						echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."&nbsp;&nbsp;";
					}
				?>
				</td>
			</tr>
			<tr class="Normal">
				<td>Aplica en el menu:</td>
				<td>
				<?php					
					$c_radio->Radio("aplica_menu","Aplica en el menu",$arrSiNo,"", 1, $pagina->aplica_menu, "textfields", 0);
					while($tmp_html = $c_radio->next_entry()) {
						echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."&nbsp;&nbsp;";
					}
				?>				
				</td>
			</tr>
			<tr class="Normal">
				<td>Imagen menu:</td>
				<td>
				<?php
					$c_file = new FileBox;
					echo $c_file->FileBox ("imagen_menu", "Imagen Menu", 0, "", "textfields", 30);					
				?>				
				<?php
					if ($pagina->imagen_menu)
						echo "<img width='60px' height='20px' src='../galeria/menu/$pagina->imagen_menu'>";
					else
						echo "No tiene imagen.";
				?>
				
				</td>
			</tr>
			<tr class="Normal">
				<td>Forma abrir pagina:</td>
				<td>				
				<?php
					$c_select->Select("target", "Abrir link en?", $arrTarget, "", 0,$pagina->target, "textfields", 0, "", "mostrarTamanio(this.value);", 0);					
					echo $c_select->genCode()
				?>		
				<span id="datosTamanios" style="display:none">
				<?php				
					echo "Ancho:" . $c_textbox->Textbox ("ancho", "Ancho", 0, $pagina->ancho, "textfields", 3, "", "", "");					
					echo "Alto:" . $c_textbox->Textbox ("alto", "Alto", 0, $pagina->alto, "textfields", 3, "", "", "");					
					
				?>	
				<br>Codigo para cerrar:<br> <xmp><a href="javascript:window.parent.cerrarContenido();">Cerrar</a></xmp>
				</span>
				</td>
			</tr>
			<tr class="Normal">
				<td>Requiere Logueo?:</td>
				<td>
				<?php					
					$c_radio->Radio("requiere_logueo","Requiere Logueo",$arrSiNo,"", 1, $pagina->requiere_logueo, "textfields", 0);
					while($tmp_html = $c_radio->next_entry()) {
						echo $tmp_html->getCode()."&nbsp;".$tmp_html->getLabel()."&nbsp;&nbsp;";
					}
				?>				
				</td>
			</tr>
			<tr class="Normal">
				<td>Descripcion:</td>
				<td>
				<?php
					$c_textarea = new Textarea;
					echo $c_textarea->Textarea("descripcion", "Descripcion MetaTags", 1, $pagina->descripcion, "textfields", 45, 5);
				?>			
				
				</td>
			</tr>
			<tr class="Normal">
				<td>Palabras clave:</td>
				<td>
				<?php
					echo $c_textarea->Textarea("palabras_clave", "Palabras Clave", 1, $pagina->palabras_clave, "textfields", 45, 5);
				?>
				</td>
			</tr>			
			<tr class="Normal">
				<td colspan="2" align="center">
					<input type=button name=btn_guardar value="Guardar" class=buttons onclick="validarPagina();">
					<input type=button name=btn_guardar value="Volver al listado" class=buttons onclick="location.href='plugins.php?modulo=paginas&accion=verListado&id_padre=<?=$idPadre?>&id_pagina_padre=<?=$idPaginaPadre?>'">
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

//DETERMINAMOS SI HAY CONTENIDO
if ($pagina->id_tipo){
	echo "<script type=\"text/javascript\">";	
	echo "setTimeout(\"activarSelect(document.formaPagina.tipo_contenido);\",1000)";
	echo "</script>";
}

if ($pagina->target){
	echo "<script type=\"text/javascript\">";	
	echo "setTimeout(\"mostrarTamanio(document.formaPagina.target.value);\",1000)";
	echo "</script>";
}

include("includes/general/pie.php");

?>
