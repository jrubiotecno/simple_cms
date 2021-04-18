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
   M.Miechowicz      31/03/2003       Creación
   C.Camargo         14/06/2003       Adición método para descargar en Excel
   S.Trujillo		 24/07/2003		  Modificación al constructor para que no limte
                                      la búsqeda si results_per_page = -1
   S.Trujillo		 25/07/2003       Se modificaron los métodos all_pages, first_page y last_page
									  para que solo impriman cuando es necesario
   S.Trujillo		 31/07/2003       Se modificaró el método pages para mostrar solo las páginas adyacentes.
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
     * @param $database  parámetro con la clase de base de datos
     * @param $query  parámetro con el query
     * @param $page  parámetro con el número de página
     * @param $results_per_page  parámetro con el número de los resultados por página
     * @param $class_name  parámetro con el nombre de la clase para poner en el listado
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
     * Función para obtener proximo objeto de la lista
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
     * Función para obtener el número de las páginas
     */
    function num_pages() {
      return $this->TotalPages;
    }

    /**
     * Función para obtener el número de los resultados
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
     * Función para pasar el código HTML para los vìnculos
     * @param $html  parámetro con el código HTML
     * @param $separatos  parámetro con el separator de los números de las páginas (opcional)
     * @param $variable  parámetro con el nombre de la variable del número de la página (opcional)
     */
    function setHtml($html, $separator = "|", $variable = "page") {
      $this->Html = $html;
      $this->HtmlSeparator = $separator;
      $this->HtmlPageVar = $variable;
    }

    /**
     * Función para obtener el vìnculo para la proxima página en la lista
     */
    function next_page() {
      if($this->CurrPage < $this->TotalPages)
        return str_replace("%$this->HtmlPageVar%",$this->CurrPage+1,$this->Html);
      else
        return;
    }

    /**
     * Función para obtener el vìnculo para la página anterior en la lista
     */
    function prev_page() {
      if($this->CurrPage > 1)
        return str_replace("%$this->HtmlPageVar%",$this->CurrPage-1,$this->Html);
      else
        return;
    }

    /**
     * Función para obtener el vìnculo para la primera página en la lista
     */
    function first_page() {
	  if($this->CurrPage > 1)
        return str_replace("%$this->HtmlPageVar%",1,$this->Html);
	  else
	  	return;
    }

    /**
     * Función para obtener el vìnculo para la última página en la lista
     */
    function last_page() {
	  if($this->CurrPage < $this->TotalPages)
        return str_replace("%$this->HtmlPageVar%",$this->TotalPages,$this->Html);
	  else
	  	return;
    }

    /**
     * Función para imprimir todos los números de las páginas
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
     * Función para mostrar el paginador
     */
    function all_pages($num_pages = 10, $tipo_menu=0, $action="", $accion="", $id="", $option="") {
	  return Show_Pager($this, $num_pages,$tipo_menu,$this->CurrPage,$action,$accion,$id,$option);
    }

    /**
     * Función para imprimir el Link para descarga de Excel
     */

    function link_excel(){
        return "
                <script language=\"javascript\">document.forma_excel.p_query.value = \"".str_replace("\r\n", " ", $this->CountQuery)."\";</script>
                <a href=\"javascript:document.forma_excel.submit()\"><img src=\"imagenes/xls.gif\" border=\"0\" alt=\"Descargar a excel\"></a></b></td>
                ";
    }
}

?>