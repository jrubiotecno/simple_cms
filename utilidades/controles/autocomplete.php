<?php
/*
ARCHIVO
        autocomplete.php

DESCRIPCION
    Clase para utilizar el control de autocomplete
                Clases:        Autocomplete

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------

*/


/**
 * Clase Autocomplete
 * @author Andres Bravo
 */

class Autocomplete extends Textbox
{

  /**
   * Constructor de la clase
   */
  function Autocomplete($field_name = "", $id_name = "", $table = "", $campo = "", $style = "", $size = "", $max_length = "", $default="",$on_blur_script = "", $on_change_script = "", $is_obligatory = "", $texto="",$where="")
  {

	$this->Textbox($field_name, $texto, $is_obligatory, $default, $style, $size, $max_length, $on_blur_script, $read_only, $print_only);

	$this->ID = $id_name.($this->IsObligatory?"_O_":"");;

	$tmp = $this->genCode();


	$tmp .= "<span id=\"spinner\" style=\"display: none\">\n";
	//$tmp .= "<img src=\"imagenes/loading1.gif\" />\n";
	$tmp .= "</span>\n";

	$tmp .= "<div id=\"lista_opciones_".$this->ID."\" class=\"autorelleno\" >\n";
	$tmp .= "</div>\n";

	$tmp .= "<script>\n";
	$tmp .= "new Ajax.Autocompleter(\"".$this->ID."\", \"lista_opciones_".$this->ID."\", \"autocomplete.php?tabla=".$table."&campo=".$campo."&where=".$where."\", {method: \"post\", paramName: \"value\", minChars: 1, indicator: \"spinner\"});\n";
	$tmp .= "</script>\n";

	return $tmp;

  }

}

?>