<?php
/**
class param extends ADOdb_Active_Record{
	var $Database;

	function makeParam(){
		global $db;		
		$sql="SELECT hbp_param.*, app_paginas.alias, app_paginas.target
		$rs=@mysqli_query($sql);
		if($rs){			   
			   while($arr=mysqli_fetch_array($rs)){
			   }
		}    
	}  
}
?>