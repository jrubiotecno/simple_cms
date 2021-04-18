<?php
/*
ARCHIVO
        obj_list.php

DESCRIPCION
    Clase para paginar los resultados
                Clases:        ObjList

PARAMETERS
        globales
NOTAS
POR HACER

HISTORIA

   Autor             fecha           Comentarios
  -------            -------         -------------
   M.Miechowicz      31/03/2003       Creaci�n
   C.Camargo         14/06/2003       Adici�n m�todo para descargar en Excel
   S.Trujillo		 24/07/2003		  Modificaci�n al constructor para que no limte
                                      la b�sqeda si results_per_page = -1
   S.Trujillo		 25/07/2003       Se modificaron los m�todos all_pages, first_page y last_page
									  para que solo impriman cuando es necesario
   S.Trujillo		 31/07/2003       Se modificar� el m�todo pages para mostrar solo las p�ginas adyacentes.
*/


/**
 * Clase ObjList
 * @author Maciej Miechowicz
 */
//require_once("adodb/adodb.inc.php");
class ObjList
{
    var $Database;
    var $CountQuery = "";
    var $Query = "";
    var $CurrPage = 1;
    var $TotalPages = 0;
    var $ClassName = "";
    var $TotalResults = 0;
    var $ResultsPerPage = 20;
    var $Html = "";
    var $HtmlSeparator = "";
    var $HtmlPageVar = "";
    var $Recordset = "";

    /**
     * Constructor de la clase
     * @param $database  par�metro con la clase de base de datos
     * @param $query  par�metro con el query
     * @param $page  par�metro con el n�mero de p�gina
     * @param $results_per_page  par�metro con el n�mero de los resultados por p�gina
     * @param $class_name  par�metro con el nombre de la clase para poner en el listado
     */
    function ObjList($database,$query,$page,$results_per_page,$class_name)
    {
    	
        $this->Database = $database;
        $this->CountQuery = $query;
        $this->CurrPage = $page;
        $this->ResultsPerPage = $results_per_page;
        $this->ClassName = $class_name;

        $this->Database->query($this->CountQuery);
        $this->TotalResults = $this->Database->num_rows();
        $this->TotalPages = ceil($this->TotalResults/$this->ResultsPerPage);

		$this->Query = "$this->CountQuery";
        if($this->Database->DbType == "psql" and $results_per_page != -1)
          $this->Query .= " LIMIT ".$this->ResultsPerPage.",".(($this->CurrPage - 1)*$this->ResultsPerPage);
        else
			if($results_per_page != -1)
         	  $this->Query .= " LIMIT ".(($this->CurrPage - 1)*$this->ResultsPerPage).",".$this->ResultsPerPage;

		
		$this->Database->query($this->Query);
		//$this->Database->PageExecute($query, $results_per_page, $page, false, 0);

		
    }

    /**
     * Funci�n para obtener proximo objeto de la lista
     */
    function next_entry() {       	
      
      //print_r($this);
      if($this->Database->next_row()) {
        eval("\$tmp = new $this->ClassName();");
        $tmp->setData($this->Database);
        return $tmp;
      } 
      else
        return 0;     

    }


    /**
     * Funci�n para obtener el n�mero de las p�ginas
     */
    function num_pages() {
      return $this->TotalPages;
    }

    /**
     * Funci�n para obtener el n�mero de los resultados
     */
    function num_results() {
      return $this->TotalResults;
    }

    function GetResultsPerPage() {
      return $this->ResultsPerPage;
    }

    function GetTotalPages() {
      return $this->TotalPages;
    }

    function GetCurrPage() {
      return $this->CurrPage;
    }

    /**
     * Funci�n para pasar el c�digo HTML para los v�nculos
     * @param $html  par�metro con el c�digo HTML
     * @param $separatos  par�metro con el separator de los n�meros de las p�ginas (opcional)
     * @param $variable  par�metro con el nombre de la variable del n�mero de la p�gina (opcional)
     */
    function setHtml($html, $separator = "|", $variable = "page") {
      $this->Html = $html;
      $this->HtmlSeparator = $separator;
      $this->HtmlPageVar = $variable;
    }

    /**
     * Funci�n para obtener el v�nculo para la proxima p�gina en la lista
     */
    function next_page() {
      if($this->CurrPage < $this->TotalPages)
        return str_replace("%$this->HtmlPageVar%",$this->CurrPage+1,$this->Html);
      else
        return;
    }

    /**
     * Funci�n para obtener el v�nculo para la p�gina anterior en la lista
     */
    function prev_page() {
      if($this->CurrPage > 1)
        return str_replace("%$this->HtmlPageVar%",$this->CurrPage-1,$this->Html);
      else
        return;
    }

    /**
     * Funci�n para obtener el v�nculo para la primera p�gina en la lista
     */
    function first_page() {
	  if($this->CurrPage > 1)
        return str_replace("%$this->HtmlPageVar%",1,$this->Html);
	  else
	  	return;
    }

    /**
     * Funci�n para obtener el v�nculo para la �ltima p�gina en la lista
     */
    function last_page() {
	  if($this->CurrPage < $this->TotalPages)
        return str_replace("%$this->HtmlPageVar%",$this->TotalPages,$this->Html);
	  else
	  	return;
    }

    /**
     * Funci�n para imprimir todos los n�meros de las p�ginas
     */
    function pages($num_pages = -1) {
	  $paginador = "";

	  if($this->TotalPages > 1)
	  {
	  	if($this->TotalPages)
        	$paginador.= " ".$this->HtmlSeparator." ";
		if($num_pages != -1)
		{
			if($num_pages > $this->TotalPages)
				$num_pages = $this->TotalPages;
			$limite_inf = $this->CurrPage - Ceil($num_pages / 2) + 1;
			$limite_sup = $this->CurrPage + ($num_pages - Ceil($num_pages / 2));
			if($limite_inf < 1)
			{
				$limite_inf -= $this->CurrPage - Ceil($num_pages / 2);
				$limite_sup -= $this->CurrPage - Ceil($num_pages / 2);
			}
			if($limite_sup > $this->TotalPages)
			{
				$limite_inf -= ($limite_sup - $this->TotalPages);
				$limite_sup -= ($limite_sup - $this->TotalPages);
			}
		}
		else
		{
			$limite_inf = 1;
			$limite_sup = $this->TotalPages;
		}
      	for($i = $limite_inf; $i <= $limite_sup; $i++) {
        	if($i == $this->CurrPage)
          		$paginador.= "$i ".$this->HtmlSeparator." ";
        	else
          	$paginador.= str_replace("%$this->HtmlPageVar%",$i,$this->Html)." ".$this->HtmlSeparator." ";
      	}
	  }
	  return $paginador;
    }

    /**
     * Funci�n para mostrar el paginador
     */
    function all_pages($num_pages = 10, $tipo_menu=0, $action="", $accion="", $id="", $option="") {
	  return Show_Pager($this, $num_pages,$tipo_menu,$this->CurrPage,$action,$accion,$id,$option);
    }

    /**
     * Funci�n para imprimir el Link para descarga de Excel
     */

    function link_excel(){
        return "
                <script language=\"javascript\">document.forma_excel.p_query.value = \"".str_replace("\r\n", " ", $this->CountQuery)."\";</script>
                <a href=\"javascript:document.forma_excel.submit()\"><img src=\"imagenes/xls.gif\" border=\"0\" alt=\"Descargar a excel\"></a></b></td>
                ";
    }
}

?>