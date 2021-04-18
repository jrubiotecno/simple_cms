<?php
/*
ARCHIVO
        password.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        Password

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      16/04/2003       Modificaciones
*/


/**
 * Clase Password
 * @author Maciej Miechowicz
 */
class Password extends Textbox
{

  /**
   * Constructor de la clase
   */
  function Password($field_name = "", $name = "", $is_obligatory = 1, $default = "", $style = "", $size = "", $max_length = "", $on_blur_script = "", $read_only = "", $print_only = "")
  {
	$this->Textbox($field_name, $name, $is_obligatory, $default, $style, $size, $max_length, "verificarPassword(this);$on_blur_script;", $read_only, $print_only);

	$this->ID .= "__CPassword__".$this->FieldName;
	$this->Type = "password";
	$this->AddID = 0;

	return $this->genCode();

  }

}

?>