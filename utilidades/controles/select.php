<?php
/*
ARCHIVO
        select.php

DESCRIPCION
    Clase para utilizar el control de checkbox
                Clases:        Select

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   C.Sarmiento       10/04/2003       Creaci�n del prototipo
   M.Miechowicz      15/04/2003       Modificaciones
*/


/**
 * Clase Select
 * @author Maciej Miechowicz
 */
class Select
{

  var $ID;
  var $Name;
  var $FieldName;
  var $Query;
  var $IsObligatory;
  var $Default;
  var $IsMultiple;
  var $Size;
  var $Style;
  var $OnChangeAction;
  var $PrintOnly;
  var $Disabled;

  var $ShowBlankOption = 0;
  var $TextBlankOption;
  var $Results = array();
  var $Datasource;

  var $JsCode;


  function enableBlankOption($texto = "") {
	$this->ShowBlankOption = 1;
	$this->TextBlankOption = $texto;
  }

  function disableBlankOption() {
	$this->ShowBlankOption = 0;
  }

 function Clean(){
 	$this->Results=NULL;
 }
  /**
   * Constructor de la clase
   */
  function Select($field_name = "", $name = "", $datasource = "", $query = "", $is_obligatory = 1, $default = "", $style = "", $is_multiple = 0, $size = 0, $onChangeAction = "", $print_only = 0)
  {

	$this->Name       = $name;
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
	$this->Size         = $size;
	$this->Style        = $style;
	$this->OnChangeAction = $onChangeAction;
	$this->PrintOnly    = $print_only;

	$this->ID = ($this->IsObligatory?"_O_":"")."__CLista__".$this->FieldName;

	if($this->Query && is_object($this->Datasource)) {
	  global $db;	  	  	  
	  $rs = $db->Execute($this->Query);
	  while(!$rs->EOF){
		$this->Results[$rs->fields[0]] = $rs->fields[1];
		$rs->MoveNext();
	  }
	}

    return $this->genCode();
  }

  function genCode() {
	if(!$this->PrintOnly) {
	  if($this->JsCode)
	    $tmp .= $this->JsCode;
	  $tmp .= "<script type=\"text/javascript\">nombres_campos['$this->FieldName'] = '$this->Name';</script>\n";
	  $tmp .= "<select";
	  $tmp .= " id=\"$this->ID\"";
	  $tmp .= " name=\"$this->FieldName".($this->IsMultiple?"[]":"")."\"";
	  if($this->IsMultiple)
	    $tmp .= " multiple";
	  if($this->Size)
	    $tmp .= " size=\"$this->Size\"";
	  if($this->Style)
	    $tmp .= " class=\"$this->Style\"";
	  if($this->OnChangeAction)
	    $tmp .= " onchange=\"$this->OnChangeAction\"";
	  if($this->Disabled)
	    $tmp .= " disabled=\"$this->Disabled\"";	    
	  $tmp .= ">\n";

	  if($this->ShowBlankOption){
	  	$strTextOption = "Select ...";
	  	if ($this->TextBlankOption)
	  		$strTextOption = $this->TextBlankOption;

	    $tmp .= "<option value=\"\">".$strTextOption."</option>\n";
  	  }


	  foreach($this->Results as $key=>$val)
	    $tmp .= "<option value=\"$key\"".((is_array($this->Default) && in_array($key,$this->Default)) || $key == $this->Default?" selected='selected'":"").">$val</option>\n";

	  $tmp .= "</select>\n";
	} else {
	  if($this->Style)
		$tmp .= "<span class=\"$this->Style\">";

	  if(is_array($this->Default)) {
		foreach($this->Default as $def)
		  $tmp .= ($tmp?", ":"").$this->Results[$def];
	  } else if($this->Default) {
		$tmp .= $this->Results[$this->Default];
	  }

	  if($this->Style)
		$tmp .= "</span>";
	}
	return $tmp;
  }


  function relateWith($name, $datasource, $query, $field_name) {

	$tmp = strtolower($query);
	$from_pos = strpos($tmp,"from");
	$select_fields = trim(substr($query,0,$from_pos));
	$query = $select_fields.", $field_name ".substr($query,$from_pos,strlen($query));

	$tmp_ids = "";
	foreach($this->Results as $key=>$val)
	  $tmp_ids .= ($tmp_ids?",":"")."'$key'";

	$tmp = strtolower($query);
	$where_pos = strpos($tmp,"where");
	$order_pos = strpos($tmp,"order");
	if($tmp_ids) {
	  if($where_pos !== false) {
	    $where_pos += 5;
	    $query = substr($query,0,$where_pos)." (".substr($query,$where_pos,($order_pos?$order_pos-$where_pos:strlen($query))).") AND $field_name IN ($tmp_ids) ".($order_pos !== false?substr($query,$order_pos,strlen($query)):"");
	  } else {
	    if($order_pos !== false)
		  $query = substr($query,0,$order_pos)."WHERE $field_name IN ($tmp_ids) ".substr($query,$order_pos,strlen($query));
	    else
		  $query .= " WHERE $field_name IN ($tmp_ids)";
	  }
    }

	global $tmp_select_counter;
	$tmp_field = $this->FieldName.$tmp_select_counter++;

    $jsArrayValues1 = "var arr_".$tmp_field."_valores = new Array(";
    $jsArrayTextos1 = "var arr_".$tmp_field."_textos = new Array(";

	foreach($this->Results as $key=>$val) {
      $jsArrayValues1 .= "'".$key."',";
      $jsArrayTextos1 .= "'".$val."',";
	}

	if(substr($jsArrayValues1,-1) != "(")
      $jsArrayValues1 = substr($jsArrayValues1,0,strlen($jsArrayValues1)-1);
	if(substr($jsArrayTextos1,-1) != "(")
      $jsArrayTextos1 = substr($jsArrayTextos1,0,strlen($jsArrayTextos1)-1);
    $jsArrayValues1.= ");\n";
    $jsArrayTextos1 .= ");\n";

    $jsArrayValues2 = "var arr_".$name."_valores = new Array(";
    $jsArrayTextos2 = "var arr_".$name."_textos = new Array(";
    $jsArrayFks2    = "var arr_".$name."_fks = new Array(";

	$db = $datasource;
	$db->query($query);

	while($db->next_row()) {
      $jsArrayValues2 .= "'".$db->R[0]."',";
      $jsArrayTextos2 .= "'".$db->R[1]."',";
      $jsArrayFks2 .= "'".$db->R[2]."',";
	}

	if(substr($jsArrayValues2,-1) != "(")
      $jsArrayValues2 = substr($jsArrayValues2,0,strlen($jsArrayValues2)-1);
	if(substr($jsArrayTextos2,-1) != "(")
      $jsArrayTextos2 = substr($jsArrayTextos2,0,strlen($jsArrayTextos2)-1);
	if(substr($jsArrayFks2,-1) != "(")
	  $jsArrayFks2 = substr($jsArrayFks2,0,strlen($jsArrayFks2)-1);
    $jsArrayValues2 .= ");\n";
    $jsArrayTextos2 .= ");\n";
    $jsArrayFks2 .= ");\n";

    $js = "<script language='JavaScript'>\n";
    $js .= $jsArrayValues1.$jsArrayTextos1.$jsArrayValues2.$jsArrayTextos2.$jsArrayFks2."\n";

	$func_name = "actualizar_detalle_".$this->FieldName."_".$name;
    $js.= "function $func_name (select1, select2)\n".
            "{\n".
            "  if(select1.options[select1.selectedIndex].value==0)\n".
            "  {\n".
            "    select2.length = 1;\n".
            "    select2.options[0].text = 'Seleccione uno ...';\n".
            "    select2.options[0].value = 0;\n".
            "  }\n".
            "  else\n".
            "  {\n".
            "    select2.length = 1;\n".
            "    select2.options[0].text = 'Seleccione uno ...';\n".
            "    select2.options[0].value = 0;\n".
            "    var seleccion = select1.options[select1.selectedIndex].value;\n".
            "    var tam=arr_".$name."_valores.length;\n".
            "    var j=1;\n".
            "    for(var i=0; i < tam; i++)\n".
            "    {\n".
            "      if(arr_".$name."_fks[i]==seleccion)\n".
            "      {\n".
            "        select2.length++;\n".
            "        select2.options[j].text = arr_".$name."_textos[i];\n".
            "        select2.options[j].value = arr_".$name."_valores[i];\n".
            "        j++;\n".
            "      }\n".
            "    }\n".
            "  }\n".
            "}\n";

    $js.="</script>\n";

	$this->JsCode = $js;
	$this->OnChangeAction = $func_name."(this,$name);".$this->OnChangeAction;

  }

  function relateWithArray($detail_name,$datasource, $detail) {



   // $name_detail nombre del control detalle

   // $datasource  arreglo maestro [Colombia,Brasil,Venezuela]

   // $detail arreglo detalle  Array [Colombia,Bogota],[Colombia,Cali],[Brasil,SaoPaulo],[Venezuela,San Cristobal]



    global $language;

    $master_name = $this->FieldName;

    $jsArrayValues1 = "var arr_".$master_name."_valores = new Array(";

    $jsArrayTextos1 = "var arr_".$master_name."_textos = new Array(";

    $jsArrayValues2 = "var arr_".$detail_name."_valores = new Array(";

    $jsArrayTextos2 = "var arr_".$detail_name."_textos = new Array(";

    $jsArrayFks2    = "var arr_".$detail_name."_fks = new Array(";



     foreach($datasource as $value=>$text) {

        $jsArrayValues1 .= "'".$value."',";

        $jsArrayTextos1 .= "'".$value."',";

   }



     foreach($detail as $key=>$value) {

        $jsArrayValues2 .= "'".$value[1]."',";

        $jsArrayTextos2 .= "'".$value[1]."',";

        $jsArrayFks2 .= "'".$value[0]."',";

   }

    $jsArrayValues1 = substr($jsArrayValues1,0,strlen($jsArrayValues1)-1);

    $jsArrayTextos1 = substr($jsArrayTextos1,0,strlen($jsArrayTextos1)-1);

    $jsArrayValues2 = substr($jsArrayValues2,0,strlen($jsArrayValues2)-1);

    $jsArrayTextos2 = substr($jsArrayTextos2,0,strlen($jsArrayTextos2)-1);

    $jsArrayFks2 = substr($jsArrayFks2,0,strlen($jsArrayFks2)-1);

    $jsArrayValues1 .= ");\n";

    $jsArrayTextos1 .= ");\n";

    $jsArrayValues2 .= ");\n";

    $jsArrayTextos2 .= ");\n";

    $jsArrayFks2 .= ");\n";



    $js = "<script language='JavaScript'>\n";

    $js .= $jsArrayValues1.$jsArrayTextos1.$jsArrayValues2.$jsArrayTextos2.$jsArrayFks2."\n";



   $func_name = "actualizar_detalle_array_".$master_name."_".$detail_name;

    $js.= "function $func_name (select1)\n".

            "{\n".

         "   select2 = document.forma.elements[\"$detail_name\"];".

            "  if(select1.options[select1.selectedIndex].value==0)\n".

            "  {\n".

            "    select2.length = 1;\n".

            "    select2.options[0].text = 'Selecione...';\n".

            "    select2.options[0].value = 0;\n".

            "  }\n".

            "  else\n".

            "  {\n".

            "    select2.length = 1;\n".

            "    select2.options[0].text = 'Selecione...';\n".

            "    select2.options[0].value = 0;\n".

            "    var seleccion = select1.options[select1.selectedIndex].text;\n".

            "    var tam=arr_".$detail_name."_valores.length;\n".

         "    ".

            "    var j=1;\n".

            "    for(var i=0; i < tam; i++)\n".

            "    {\n".

            "      if(arr_".$detail_name."_fks[i]==seleccion)\n".

            "      {\n".

            "        select2.length++;\n".

            "        select2.options[j].text = arr_".$detail_name."_textos[i];\n".

            "        select2.options[j].value = arr_".$detail_name."_valores[i];\n".

            "        j++;\n".

            "      }\n".

            "    }\n".

            "  }\n".

            "}\n";



    $js.="</script>\n";



   $this->JsCode = $js;

   $this->OnChangeAction .= $func_name."(this);";



  }

function relateWith_mod($detail_name,$datasource, $detail) {



    $master_name = $this->FieldName;

    $jsArrayValues1 = "var arr_".$master_name."_valores = new Array(";

    $jsArrayTextos1 = "var arr_".$master_name."_textos = new Array(";

    $jsArrayValues2 = "var arr_".$detail_name."_valores = new Array(";

    $jsArrayTextos2 = "var arr_".$detail_name."_textos = new Array(";

    $jsArrayFks2    = "var arr_".$detail_name."_fks = new Array(";



     foreach($datasource as $value=>$text) {

        $jsArrayValues1 .= "'".$value."',";

        $jsArrayTextos1 .= "'".$value."',";

   }



     foreach($detail as $key=>$value) {

        $jsArrayValues2 .= "'".$value[1]."',";

        $jsArrayTextos2 .= "'".$value[1]."',";

        $jsArrayFks2 .= "'".$value[0]."',";

   }

    $jsArrayValues1 = substr($jsArrayValues1,0,strlen($jsArrayValues1)-1);

    $jsArrayTextos1 = substr($jsArrayTextos1,0,strlen($jsArrayTextos1)-1);

    $jsArrayValues2 = substr($jsArrayValues2,0,strlen($jsArrayValues2)-1);

    $jsArrayTextos2 = substr($jsArrayTextos2,0,strlen($jsArrayTextos2)-1);

    $jsArrayFks2 = substr($jsArrayFks2,0,strlen($jsArrayFks2)-1);

    $jsArrayValues1 .= ");\n";

    $jsArrayTextos1 .= ");\n";

    $jsArrayValues2 .= ");\n";

    $jsArrayTextos2 .= ");\n";

    $jsArrayFks2 .= ");\n";



    $js = "<script language='JavaScript'>\n";

    $js .= $jsArrayValues1.$jsArrayTextos1.$jsArrayValues2.$jsArrayTextos2.$jsArrayFks2."\n";



   $func_name = "actualizar_detalle_array_".$master_name."_".$detail_name;

    $js.= "function $func_name (select1)\n".

            "{\n".

         "   select2 = document.forma.elements[\"$detail_name\"];".

            "  if(select1.options[select1.selectedIndex].value==0)\n".

            "  {\n".

            "    select2.length = 1;\n".

            "    select2.options[0].text = 'Selecione...';\n".

            "    select2.options[0].value = 0;\n".

            "  }\n".

            "  else\n".

            "  {\n".

            "    select2.length = 1;\n".

            "    select2.options[0].text = 'Selecione...';\n".

            "    select2.options[0].value = 0;\n".

            "    var seleccion = select1.options[select1.selectedIndex].text;\n".

            "    var tam=arr_".$detail_name."_valores.length;\n".

         "    ".

            "    var j=1;\n".

            "    for(var i=0; i < tam; i++)\n".

            "    {\n".

            "      if(arr_".$detail_name."_fks[i]==seleccion)\n".

            "      {\n".

            "        select2.length++;\n".

            "        select2.options[j].text = arr_".$detail_name."_textos[i];\n".

            "        select2.options[j].value = arr_".$detail_name."_valores[i];\n".

            "        j++;\n".

            "      }\n".

            "    }\n".

            "  }\n".

            "}\n";



    $js.="</script>\n";

	 return($js);

  }
}

?>