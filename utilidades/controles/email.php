<?php
/*
ARCHIVO
        email.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        Email

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      16/04/2003       Modificaciones
*/


/**
 * Clase Email
 * @author Maciej Miechowicz
 */
class Email extends Textbox
{

  /**
   * Constructor de la clase
   */
  function Email($field_name = "", $name = "", $is_obligatory = 1, $default = "", $style = "", $size = "", $max_length = "", $on_blur_script = "", $read_only = "", $print_only = "")
  {
	$this->Textbox($field_name, $name, $is_obligatory, $default, $style, $size, $max_length, "verificarEmail(this);$on_blur_script;", $read_only, $print_only);

	$this->ID .= "__CEmail__".$this->FieldName;
	$this->AddID = 0;

	return $this->genCode();

  }

}

?>