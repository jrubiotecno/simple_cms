<?php
/*
ARCHIVO
        date_box.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        DateBox

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      16/04/2003       Modificaciones
*/


/**
 * Clase DateBox
 * @author Maciej Miechowicz
 */
class DateBox extends Textbox
{

  var $DateFrom;
  var $DateTo;
  var $DateFormat;

  /**
   * Constructor de la clase
   */
  function DateBox($field_name = "", $name = "", $is_obligatory = 1, $default = "", $style = "", $size = "", $max_length = "", $on_blur_script = "", $read_only = "", $print_only = "", $date_from = "", $date_to = "", $date_format = "yyyy-mm-dd")
  {
	$this->Textbox($field_name, $name, $is_obligatory, $default, $style, $size, $max_length, "$on_blur_script;", $read_only, $print_only);
	$this->DateFrom = $date_from;
	$this->DateTo = $date_to;
	$this->DateFormat = $date_format;

	$this->ID .= "__CDate__".$this->FieldName;
	$this->AddID = 0;

	return $this->genCode();

  }

  function genCode() {
	$tmp  = parent::genCode();
	$tmp .= $this->genCalendar();

	return $tmp;
  }

  function genTextbox() {
	$tmp  = parent::genCode();
	return $tmp;
  }

  function genCalendar() {

	if(!$this->PrintOnly) {
      $fromTo = 0;
      if($this->DateFrom!="" || $this->DateTo!="")
      {
	    if($this->DateFrom) {
          $fromYear=substr($this->DateFrom,0,4);
          $fromMonth=substr($this->DateFrom,5,2);
          $fromDay=substr($this->DateFrom,-2);
          $fromMonth--;
	    }
	    if($this->DateTo) {
          $toYear=substr($this->DateTo,0,4);
          $toMonth=substr($this->DateTo,5,2);
          $toDay=substr($this->DateTo,-2);
          $toMonth--;
	    }
        $fromTo = 1;
      }

	  //INICIA VARIABLE PARA VER EL LANZADAR DEL SCRIPT
	  $lanzador = $this->FieldName."_lanzador";
      if($fromTo)
      {
		  	//ESTA OPCION ES PARA CUANDO TIENE UNA FECHA DESDE HASTA EL CALENDARIO
		  	//FALTA REVISARLA CON EL NUEVO SCRIPT
			/*
			$tmp .= "&nbsp;<a href=\"#\" onMouseOver=\"if (timeoutId) clearTimeout(timeoutId);window.status='Calendario';return true;\"".
                    " onMouseOut=\"if (timeoutDelay) calendarTimeout();window.status='Calendario';\"".
                    " onClick=\"g_Calendar.show(event,getFormName('".$this->FieldName."'),true,'".$this->DateFormat."', new Date(".$fromYear.",".$fromMonth.",".$fromDay.")".($this->DateTo?",new Date(".$toYear.",".$toMonth.",".$toDay.")":"")."); return false;\">".
                    "<img src=\"imagenes/calendar.gif\" name=\"".$this->Name."imgCalendar\" border='0 width='34' height='21'></a>\n";
            */
            $tmp.= "<a href=\"#\" onclick=\"Calendar.setup({inputField:document.forms.forma.".$this->FieldName.",ifFormat:'%Y-%m-%d',button: '".$lanzador."'});\" onMouseOver=\"Calendar.setup({inputField:document.forms.forma.".$this->FieldName.",ifFormat:'%Y-%m-%d',button: '".$lanzador."'});\"><img src=\"../images/calendar.gif\" id=\"".$lanzador."\" border='0' width='34' height='21' valign='bottom'></a>\n";
      }
      else
			$tmp.= "<a href=\"#\" onclick=\"Calendar.setup({inputField:document.forms.forma.".$this->FieldName.",ifFormat:'%Y-%m-%d',button: '".$lanzador."'});\" onMouseOver=\"Calendar.setup({inputField:document.forms.forma.".$this->FieldName.",ifFormat:'%Y-%m-%d',button: '".$lanzador."'});\"><img src=\"../images/calendar.gif\" id=\"".$lanzador."\" border='0' width='34' height='21' valign='bottom'></a>\n";
	}

	return $tmp;
  }

}

?>