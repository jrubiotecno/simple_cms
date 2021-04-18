<?php

class Paginador{

	var $CurrPage = 0;
    var $TotalPages = 0;
    var $TotalResults = 0;
    var $TotalRegistros = 0;
    var $CantidadPaginador = 0;
    var $SQL = 0;
    var $ArchivoControl = "";
    var $Modulo = "";
    var $Mensaje = "";
    var $Accion = "";
    var $PId = "";
    var $POptions = "";
    var $POptions2 = "";

	function Paginador($rs,$mensaje,$archivo_control,$accion,$p_id="",$p_options="",$p_options2="",$modulo=""){

		$this->CurrPage = $rs->_currentPage;
		$this->TotalPages = $rs->_lastPageNo;
		$this->TotalResults = $rs->_maxRecordCount;
		$this->TotalRegistros = $rs->_numOfRows;
		$this->CantidadPaginador = $rs->rowsPerPage;
		$this->SQL = $rs->sql;
		$this->ArchivoControl = $archivo_control;
		$this->Modulo = $modulo;
		$this->Mensaje = $mensaje;
		$this->Accion = $accion;
		$this->PId = $p_id;
		$this->POptions = $p_options;
		$this->POptions2 = $p_options2;

	}

	function getCurrPage(){

		return $this->CurrPage;

	}

	function getTotalPages(){

		return $this->TotalPages;

	}

	function getTotalResults(){

		return $this->TotalResults;

	}

	function getSql(){

		return $this->SQL;

	}

	function setArchivoControl($param){

		$this->ArchivoControl = $param;

	}

	function getArchivoControl(){

		return $this->ArchivoControl;

	}

	function setMensaje($param){

		$this->Mensaje = $param;

	}

	function getMensaje(){

		return $this->Mensaje;

	}

	function setAccion($param){

		$this->Accion = $param;

	}

	function getAccion(){

		return $this->Accion;

	}

	function all_pages($tipo_paginador){


		if ($tipo_paginador=="numeros")
			$this->getNumeros();
		else if ($tipo_paginador=="select")
			$this->getSelect();
		else if ($tipo_paginador=="imagen")
			$this->getImagen();
		else if ($tipo_paginador=="flechas")
			$this->getFlechas();
		else if ($tipo_paginador=="palabras")
			$this->getPalabras();

	}

	function getNumeros($className,$classLink){

		$strPaginador = "";
		$strPaginador .= "<table width='100%' class='".$className."' border='0'>";
		$strPaginador .= "<tr>";
		$strPaginador .= "<td nowrap align='left'>";
		$strPaginador .= "P&aacute;gina <b>".$this->getCurrPage()."</b> de <b>".$this->getTotalPages()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='center'>";

		$lista .= "<table width='100%' cellspacing='1' border='0' cellpadding='1' class='".$className."'>";
		$lista .= "<tr>";


		//ofTERMINAMOS SI PUEof IR HACIA ATRAS
		if ($this->getCurrPage()>1){
			$lista .= "<td align='center'>";
			$lista .= "<a href=\"javascript:paginadorAjax('1','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>|<</a>";
			$lista .= "</td>";
		}

		//ARMAMOS LA PAGINACION
		for ($pag=1;$pag<=$this->TotalPages;$pag++){

			$lista .= "<td align='center' class='".$classLink."'>";

			if ($pag!=$this->getCurrPage())
				$lista .= "<a href=\"javascript:paginadorAjax('".$pag."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>".$pag."</a>";
			else
				$lista .= "<strong>".$pag."</strong>";

			$lista .= "</td>";
		}

		//ofTERMINAMOS SI PUEof IR HACIA AofLANTE
		if ($this->getCurrPage()!=$this->getTotalPages()){
			$lista .= "<td align='center'>";
			$lista .= "<a href=\"javascript:paginadorAjax('".$this->getTotalPages()."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>>|</a>";
			$lista .= "</td>";
		}
		$lista .= "</tr>";
		$lista .= "</table>";

		$strPaginador .= $lista;
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='right'>";
		$strPaginador .= "Total registros : <b>".$this->getTotalResults()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "</tr>";
		$strPaginador .= "</table>";


		return $strPaginador;
	}


	function getSelectAdmin($className,$classLink){


		//ARMAMOS LA PAGINACION ofNTRO of UN SELECT
		$select .= "<select id='paginadorSelect' name='paginadorSelect' class='".$classLink."' onchange=\"javascript:paginadorAjaxAdmin(this.value,'','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\">\n";
		for ($pag=1;$pag<=$this->TotalPages;$pag++){

			$selected = "";
			if ($pag==$this->CurrPage)
				$selected = "selected";

			$select .= "<option value='".$pag."' ".$selected.">".$pag."</option>\n";
		}

		$select .= "</select>";

		$strPaginador = "<table width='100%' class='".$className."' border='0'>";
		$strPaginador .= "<tr>";
		$strPaginador .= "<td nowrap align='left'>";
		$strPaginador .= "P&aacute;gina ".$select." de <b>".$this->getTotalPages()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='right'>";
		$strPaginador .= "Total registros : <b>".$this->getTotalResults();
		$strPaginador .= "</td>";
		$strPaginador .= "</tr>";
		$strPaginador .= "</table>";

		return $strPaginador;

	}


	function getSelect($className,$classLink){


		//ARMAMOS LA PAGINACION ofNTRO of UN SELECT
		$select .= "<select id='paginadorSelect' name='paginadorSelect' class='".$classLink."' onchange=\"javascript:paginadorAjax(this.value,'','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\">\n";
		for ($pag=1;$pag<=$this->TotalPages;$pag++){

			$selected = "";
			if ($pag==$this->CurrPage)
				$selected = "selected";

			$select .= "<option value='".$pag."' ".$selected.">".$pag."</option>\n";
		}

		$select .= "</select>";

		$strPaginador = "<table width='100%' class='".$className."' border='0'>";
		$strPaginador .= "<tr>";
		$strPaginador .= "<td nowrap align='left'>";
		$strPaginador .= "P&aacute;gina ".$select." de <b>".$this->getTotalPages()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='right'>";
		$strPaginador .= "Total registros : <b>".$this->getTotalResults()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "</tr>";
		$strPaginador .= "</table>";

		return $strPaginador;

	}

	function getPalabras($className,$classLink){

		$strPaginador = "<table width='100%' class='".$className."' border='0'>";
		$strPaginador .= "<tr>";
		$strPaginador .= "<td nowrap align='left' width='300'>";
		$strPaginador .= "P&aacute;gina <b>".$this->getCurrPage()."</b> de <b>".$this->getTotalPages()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='center'>";

		$lista .= "<table width='100%' cellspacing='1' border='0' cellpadding='1' class='".$className."'>";
		$lista .= "<tr>";

		$lista .= "<td align='center'>";
		$lista .= "<a href=\"javascript:paginadorAjax('1','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>First</a>";
		$lista .= "</td>";
		$lista .= "<td align='center'>";
		$lista .= "<a href=\"javascript:paginadorAjax('".($this->getCurrPage()-1)."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>Previous</a>";
		$lista .= "</td>";
		
		$lista .= "<td align='center'>";
		$lista .= "<a href=\"javascript:paginadorAjax('".($this->getCurrPage()+1)."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>Next</a>";
		$lista .= "</td>";
		$lista .= "<td align='center'>";
		$lista .= "<a href=\"javascript:paginadorAjax('".$this->getTotalPages()."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."')\" class='".$classLink."'>Last</a>";
		$lista .= "</td>";

		$lista .= "</tr>";
		$lista .= "</table>";

		$strPaginador .= $lista;
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='right' width='300'>";
		$strPaginador .= "Total registros : <b>".$this->getTotalResults()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "</tr>";
		$strPaginador .= "</table>";

		return $strPaginador;
	}

	function getPalabrasAdmin($className,$classLink){

		$strPaginador = "<table width='100%' class='".$className."' border='0'>";
		$strPaginador .= "<tr>";
		$strPaginador .= "<td nowrap align='left'>";
		$strPaginador .= "P&aacute;gina <b>".$this->getCurrPage()."</b> de <b>".$this->getTotalPages()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='center'>";

		$lista .= "<table width='100%' cellspacing='1' border='0' cellpadding='1' class='".$className."'>";
		$lista .= "<tr>";

		//ofTERMINAMOS SI PUEof IR HACIA ATRAS
		//if ($this->getCurrPage()>1){
			$lista .= "<td align='center'>";
			$lista .= "<a href=javascript:paginadorAjaxAdmin('1','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Modulo."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."') class='".$classLink."'>Primero</a>";
			$lista .= "</td>";
			$lista .= "<td align='center'>";
			$lista .= "<a href=\"javascript:paginadorAjaxAdmin('".($this->getCurrPage()-1)."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Modulo."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>Anterior</a>";
			$lista .= "</td>";
		//}

		//ofTERMINAMOS SI PUEof IR HACIA AofLANTE
		//if ($this->getCurrPage()!=$this->getTotalPages()){

			$lista .= "<td align='center'>";
			$lista .= "<a href=\"javascript:paginadorAjaxAdmin('".($this->getCurrPage()+1)."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Modulo."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>Siguiente</a>";
			$lista .= "</td>";
			$lista .= "<td align='center'>";
			$lista .= "<a href=\"javascript:paginadorAjaxAdmin('".$this->getTotalPages()."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Modulo."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."')\" class='".$classLink."'>Ultimo</a>";
			$lista .= "</td>";
		//}
		$lista .= "</tr>";
		$lista .= "</table>";

		$strPaginador .= $lista;
		$strPaginador .= "</td>";
		$strPaginador .= "<td nowrap align='right'>";
		$strPaginador .= "Total registros : <b>".$this->getTotalResults();
		$strPaginador .= "</td>";
		$strPaginador .= "</tr>";
		$strPaginador .= "</table>";

		return $strPaginador;
	}

	function getNumerosCustom($className,$classLink){

		$strPaginador = "";
		$strPaginador .= "<table class='".$className."' border='0'>";
		$strPaginador .= "<tr>";
		$strPaginador .= "<td nowrap align='left'>";
		$strPaginador .= "P&aacute;gina. <b class='txt_ganadores'>".$this->getCurrPage()."</b> de <b class='txt_ganadores'>".$this->getTotalPages()."</b>";
		$strPaginador .= "</td>";
		$strPaginador .= "<td width=\"45\" align=\"center\" valign=\"top\"><img src=\"./images/colcafe/bul_paginador.gif\" alt=\"Colcaf&eacute; - Premios consentidores\" title=\"Colcaf&eacute; - Premios consentidores\" width=\"32\" height=\"33\"></td>";
		$strPaginador .= "<td nowrap align='center'>";

		$lista .= "<table width='100%' cellspacing='1' border='0' cellpadding='1' class='".$className."'>";
		$lista .= "<tr>";


		//ofTERMINAMOS SI PUEof IR HACIA ATRAS
		if ($this->getCurrPage()>1){
			$lista .= "<td align='center'>";
			$lista .= "<a href=\"javascript:paginadorAjax('1','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'><<</a>";
			$lista .= "</td>";
		}

		//ARMAMOS LA PAGINACION
		for ($pag=1;$pag<=$this->TotalPages;$pag++){

			$lista .= "<td align='center' class='".$classLink."'>";

			if ($pag!=$this->getCurrPage())
				$lista .= "<a href=\"javascript:paginadorAjax('".$pag."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$className."'>".$pag."</a>";
			else
				$lista .= "<strong>".$pag."</strong>";

			$lista .= " | </td>";
		}

		//ofTERMINAMOS SI PUEof IR HACIA AofLANTE
		if ($this->getCurrPage()!=$this->getTotalPages()){
			$lista .= "<td align='center'>";
			$lista .= "<a href=\"javascript:paginadorAjax('".$this->getTotalPages()."','','','".$this->Mensaje."','".$this->ArchivoControl."','".$this->Accion."','".$this->PId."','".$this->POptions."','".$this->POptions2."');\" class='".$classLink."'>&gt;&gt;</a>";
			$lista .= "</td>";
		}
		$lista .= "</tr>";
		$lista .= "</table>";

		$strPaginador .= $lista;
		$strPaginador .= "</td>";
		//$strPaginador .= "<td nowrap align='right'>";
		//$strPaginador .= "Total registries : <b>".$this->getTotalResults()."</b>";
		//$strPaginador .= "</td>";
		$strPaginador .= "</tr>";
		$strPaginador .= "</table>";


		return $strPaginador;
	}
	

}

?>