<?php
/*** Adminsitraci�n de paginas para armar un menu de navegacion* @version 1.0* El constructor de esta clase es {@link param()}*/
class param extends ADOdb_Active_Record{
	var $Database;  	var $ID;	var $param;	var $footer;	function setParam($param){		$this->param=$param;	}	function getParam(){		return $this->param;	}		function setFooter($footer){		$this->footer=$footer;	}	function getFooter(){		return $this->footer;	}	

	function makeParam(){
		global $db;		
		$sql="SELECT hbp_param.*, app_paginas.alias, app_paginas.target				FROM hbp_param				LEFT JOIN app_paginas ON hbp_param.link = app_paginas.id_pagina";
		$rs=@mysqli_query($sql);
		if($rs){			   				//$datosPaginas = array();				$a=0;
			   while($arr=mysqli_fetch_array($rs)){			   					$datosPaginas[$a++]=$arr["nombre"];				$datosPaginas[$a++]=$arr["archivo"];				$datosPaginas[$a++]=$arr["target"];				$datosPaginas[$a++]=$arr["alias"];								$param[$arr["tipo"]][]=$datosPaginas;												$a=0;
			   }
		}    		$this->setParam($param);				//pie de pagina				$sql="SELECT texto_contenido				FROM contenido				WHERE titulo='Pie' order by 1 desc limit 1";		$rs=@mysqli_query($sql);		if($rs){			   while($arr=mysqli_fetch_array($rs)){				$this->setFooter($arr["texto_contenido"]);			   }		}    		/*echo "<pre>";		print_r($param);		echo "</pre>";*/
	}  
}
?>