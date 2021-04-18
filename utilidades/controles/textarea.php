<?php
/*
ARCHIVO
        textarea.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        Textarea

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      16/04/2003       Modificaciones
*/

 /**modificacion de Mauricio Rios para que se pueda tener un número máximo de caracteres (los campos: $CountCharacters, $CountCharactersValue)*/

/**
 * Clase Textarea
 * @author Maciej Miechowicz
 */
class Textarea
{

  var $ID;
  var $Name;
  var $FieldName;
  var $IsObligatory;
  var $Default;
  var $Style;
  var $Rows;
  var $Cols;
  var $OnBlurScript;
  var $PrintOnly;
  var $CountCharacters;
  var $CountCharactersValue;

  /**
   * Constructor de la clase
   */

  function Textarea($field_name = "", $name = "", $is_obligatory = 1, $default = "", $style = "", $cols = "", $rows = "", $on_blur_script = "", $print_only = "", $read_only = "", $count_characters = "", $count_characters_value = "")
  {
	$this->Name         = $name;
	$this->FieldName    = $field_name;
	$this->IsObligatory = $is_obligatory;
	$this->Default      = $default;
	$this->Style        = $style;
	$this->Rows         = $rows;
	$this->Cols         = $cols;
	$this->OnBlurScript = $on_blur_script;
	$this->PrintOnly    = $print_only;
	$this->ReadOnly    = $read_only;
	$this->CountCharacters = $count_characters;
	$this->CountCharactersValue = $count_characters_value;

	$this->ID = ($this->IsObligatory?"_O_":"")."__CTextArea__".$this->FieldName;

	return $this->genCode();

  }

  function genCode() {
	if(!$this->PrintOnly) {
	  
	  if ($this->Style=="mceEditor"){
	  	$tmp .= "<input type='hidden' name='editor_oculto_".$this->FieldName."' id='editor_oculto_".$this->FieldName."'>";
	  	$this->FieldName = "editor_" . $this->FieldName;
	  }
	
	  $tmp .= "<script type=\"text/javascript\">nombres_campos['$this->FieldName'] = '$this->Name';</script>\n";
	  $tmp .= "<textarea ";
	  $tmp .= " id=\"$this->ID\"";
	  $tmp .= " name=\"$this->FieldName\"";
	  if($this->Style)
	    $tmp .= " class=\"$this->Style\"";
	  if($this->Rows)
	    $tmp .= " rows=\"$this->Rows\"";
	  if($this->Cols)
	    $tmp .= " cols=\"$this->Cols\"";
	  if($this->OnBlurScript)
	    $tmp .= " onblur=\"$this->OnBlurScript\"";
	  if($this->ReadOnly)
	    $tmp .= " readonly";


	  if($this->CountCharacters)
		$tmp .= " onKeyUp=\"ContarCaracteres($this->FieldName,$this->CountCharactersValue)\"";


	$this->CountCharacters = $count_characters;
	$this->CountCharactersValue = $count_characters_value;

	  $tmp .= ">$this->Default</textarea>";
	} else {
	  if($this->Style)
		$tmp .= "<span class=\"$this->Style\">";

      $tmp .= $this->Default;

	  if($this->Style)
		$tmp .= "</span>";
	}
	return $tmp;
  }


}

?>