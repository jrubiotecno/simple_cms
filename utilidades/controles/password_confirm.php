<?php
/*
ARCHIVO
        password_confirm.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        PasswordConfirm

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      16/04/2003       Modificaciones
*/


/**
 * Clase PasswordConfirm
 * @author Maciej Miechowicz
 */
class PasswordConfirm extends Textbox
{

  /**
   * Constructor de la clase
   */
  function PasswordConfirm($field_name = "", $name = "", $field_password = "", $is_obligatory = 1, $default = "", $style = "", $size = "", $max_length = "", $on_blur_script = "", $read_only = "", $print_only = "")
  {
	$this->Textbox($field_name, $name, $is_obligatory, $default, $style, $size, $max_length, "verificarCamposIguales(this,$field_password);$on_blur_script;", $read_only, $print_only);

	$this->ID .= "__CPassword__".$field_password;
	$this->Type = "password";
	$this->AddID = 0;

	return $this->genCode();

  }

}

?>