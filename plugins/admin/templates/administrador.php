<script language="javascript">

function viewContentTabs(objDiv){

	var objTabs = $('tabs').childElements();
	objTabs.each( 
		function( elemento ){ 
			$(elemento.id + "_content").hide(); 
			$(elemento.id).className = "tab";
		} 
	);
	
	$(objDiv.id + "_content").show();
	$(objDiv).className = "tabClic";
	

}

function createTab(objDiv){

	//CREAMOS EL NUEVO TAB PARA EL MENU SELECCIONADO
	
	//VISUALIZAMOS EL NUEVO TAB
	viewContentTabs(objDiv);
	
	//TRAEMOS LA LISTA DE DATOS
	procesoAjax('admin','listDatos','registro','','','registro_content','Cargando...');
	

}


</script>
<style>

	.tab{
		height:20px;
		border-left:1px solid #919b9c;
		border-right:1px solid #919b9c;
		border-bottom:1px solid #919b9c;
		color:white;
		font-weight: bold;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;		
		padding:5px;
		float:left;
		background-color:#29547E;
	}

	.tabClic{
		height:20px;
		border-left:1px solid #919b9c;
		border-right:1px solid #919b9c;
		border-bottom:1px solid #919b9c;
		color:white;
		font-weight: bold;
		font-family: Arial, Helvetica, sans-serif;
		font-size: 12px;		
		padding:5px;
		float:left;
		background-color:#919b9c;
	}

	.paneTab{				
		height:30px;
		vertical-align:middle;
		background-repeat:no-repeat;		
		cursor:pointer;		
		bottom:-1px;
		border-left:1px solid #919b9c;
		border-right:1px solid #919b9c;
		border-top:1px solid #919b9c;
		border-bottom:1px solid #919b9c;
		#background-color: #FFFF00;
	}

	.contentTab{				
		height:100%;
		vertical-align:top;
		background-repeat:no-repeat;		
		bottom:-1px;
		border-left:1px solid #919b9c;
		border-right:1px solid #919b9c;
		border-top:1px solid #919b9c;
		border-bottom:1px solid #919b9c;
		#background-color: #FFFF00;
	}

	
	.linkTab{
		color:white;
		text-decoration: none;
	}
	
	.linkTab:hover{
		color:FFFF00;
		text-decoration: underline;
	}
	
	
</style>
<?php
	
	echo "<table width='100%' border='2' bordercolor='red' align='center'>";
	echo "<tr>";
	echo "<td align='center'>";
	echo "<div id='contenedorMenu'></div><br>";
	echo $menu;
	echo "</td>";
	echo "</tr>";
?>
<tr>
<td>
<div id='tabs' class="paneTab">
	<!--
	<div id='registro' class="tab" onclick="viewContentTabs(this);"><a href="#" class="linkTab">Registro</a></div>
	!-->
	<div id='registro' class="tab" onclick="createTab(this);"><a href="#" class="linkTab">Registro</a></div>
</div>
</td>
</tr>
<tr>
<td>
<div id='contentTabs' class="contentTab">
	<div id="registro_content" style="display:none"></div>
</div>
</td>
</tr>
</table>