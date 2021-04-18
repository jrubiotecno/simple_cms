<?php
/*
ARCHIVO
        hidden.php

DESCRIPCION
    Clase para utilizar el control hidden
                Clases:        Hidden

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      17/06/2003       Modificaciones
*/


/**
 * Clase Hidden
 * @author Maciej Miechowicz
 */
class Hidden extends Textbox
{

  /**
   * Constructor de la clase
   */
  function Hidden($field_name = "", $name = "", $is_obligatory = 1, $default = "", $print_only = "")
  {
	$this->Textbox($field_name, $name, $is_obligatory, $default, "", "", "", "", "", $print_only);

	$this->ID .= "__CHidden__".$this->FieldName;
	$this->Type = "hidden";
	$this->AddID = 0;

	return $this->genCode();

  }

}

?>