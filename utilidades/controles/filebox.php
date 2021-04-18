<?php
/*
ARCHIVO
        filebox.php

DESCRIPCION
    Clase para utilizar el control de archivos
                Clases:        FileBox

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      02/05/2003       Modificaciones
*/


/**
 * Clase FileBox
 * @author Maciej Miechowicz
 */
class FileBox extends Textbox
{

  /**
   * Constructor de la clase
   */
  function FileBox($field_name = "", $name = "", $is_obligatory = 1, $default = "", $style = "", $size = "", $max_length = "", $on_blur_script = "", $read_only = "", $print_only = "")
  {
	$this->Textbox($field_name, $name, $is_obligatory, $default, $style, $size, $max_length, "$on_blur_script;", $read_only, $print_only);

	$this->ID .= "__CFile__".$this->FieldName;
	$this->AddID = 0;
	$this->Type = "file";

	return $this->genCode();

  }

}

?>