<?php
/*
ARCHIVO
        checkbox.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        Checkbox

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creación del prototipo
   M.Miechowicz      15/04/2003       Modificaciones
   C.Camargo         04/07/2003       Se agrega método CheckboxTodos
   S.Trujillo       29/07/2003        Adición del evento OnClick
   S.Trujillo        30/07/2003        Adición del evento OnClick al método CheckboxTodos
*/


/**
 * Clase Checkbox
 * @author Maciej Miechowicz
 */
class Checkbox
{

  var $ID;
  var $Name;
  var $Query;
  var $IsObligatory;
  var $Default;
  var $IsMultiple;
  var $Style;
  var $PrintOnly;

  var $Results = array();
  var $Datasource;
  var $IsPrinted = 0;

  /**
   * Constructor de la clase
   */
  function Checkbox($field_name = "", $name = "", $datasource = "", $query = "", $is_obligatory = 1, $default = "", $is_multiple = 0, $style = "", $print_only = "")
  {

    $this->Name         = $name;
    $this->FieldName    = $field_name;
    if(is_array($datasource)) {
      $this->Results = $datasource;
    } else {
      $this->Datasource = $datasource;
      $this->Query = $query;
    }
    $this->IsObligatory = $is_obligatory;
    $this->Default      = $default;
    $this->IsMultiple   = $is_multiple;
    $this->Style        = $style;
    $this->PrintOnly    = $print_only;

    $this->ID = ($this->IsObligatory?"_O_":"")."__CCheckList__".$this->FieldName;

    if($this->Query && is_object($this->Datasource)) {
      $db = $this->Datasource;
      $db->query($this->Query);
      while($db->next_row())
        $this->Results[$db->R[0]] = $db->R[1];
    }
  }

  function next_entry() {
    if(key($this->Results)) {
      $tmp = new HTMLControl($this->genCode(key($this->Results)),current($this->Results));
      next($this->Results);
      return $tmp;
    } else {
      return 0;
    }
  }

  function genCode($value, $onClickAction = "", $disabled = false) {
   $this->OnClickAction = $onClickAction;
    if(!$this->PrintOnly) {
      if(!$this->IsPrinted) {
        $tmp  = "<script language='JavaScript'>nombres_campos['$this->FieldName'] = '$this->Name';</script>\n";
        $this->IsPrinted++;
      }
      $tmp .= "<input type=\"checkbox\"";
      $tmp .= " id=\"$this->ID\"";
      $tmp .= " name=\"$this->FieldName".($this->IsMultiple?"[]":"")."\"";
      $tmp .= " value=\"$value\"";
      if($this->Style)
        $tmp .= " class=\"$this->Style\"";
      if((is_array($this->Default) && in_array($value,$this->Default)) || $value == $this->Default)
        $tmp .= " checked";
     if($this->OnClickAction)
        $tmp .= " OnClick=\"$this->OnClickAction\"";
     if($disabled)
        $tmp .= " disabled";
      $tmp .= ">";
    } else {
      if($this->Style)
        $tmp .= "<span class=\"$this->Style\">";

      if((is_array($this->Default) && in_array($value,$this->Default)) || $value == $this->Default)
        $tmp .= "X";

      if($this->Style)
        $tmp .= "</span>";
    }

    return $tmp;
  }

  /**
   * @author César Camargo
   * Método para check / uncheck todos los chekcbox que contenga la forma que se llamen field_name
   */

  function CheckboxTodos($field_name = "",  $onClickAction = "")
  {
    return "<Input Name='".$this->FieldName."_CheckAll' Type='checkbox' OnClick='javascript: check_all(this);$onClickAction'>
            <script language=\"JavaScript\">
                function check_all(control){
                   forma=control.form;
                   for (i=0;i<forma.elements.length-1;i++){
                             if (forma.elements[i].name.indexOf('$field_name')==0 && !forma.elements[i].disabled){
                                        if (control.checked){
                                           forma.elements[i].checked=true
                                         }else{
                                               forma.elements[i].checked=false
                                         }
                             }
                        }
                }
            </script>
    ";
  }

}

?>