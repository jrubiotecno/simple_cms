<?php
/*
ARCHIVO
        html_control.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        HTMLControl

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      15/04/2003       Modificaciones
*/


/**
 * Clase Checkbox
 * @author Maciej Miechowicz
 */
class HTMLControl {
  var $Code;
  var $Label;

  function HTMLControl($code = "", $label = "") {
    $this->Code = $code;
    $this->Label = $label;
  }

  function getCode() {
    return $this->Code;
  }

  function setCode($code) {
    $this->Code = $code;
  }

  function getLabel() {
    return $this->Label;
  }

  function setLabel($label) {
    $this->Label = $label;
  }

}

?>