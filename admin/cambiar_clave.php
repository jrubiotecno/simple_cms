<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<form method="post" action="control_usuarios.php" name="forma" onsubmit="return validarForma(this);"> 
    <table width="100%" cellspacing="0" cellpadding="0" align="center">
	  <tr> 
	   	 <td height="60" bgcolor="#FFCC00"> 
			<?include("includes/general/encabezado.php");?>
	  	 </td>
      </tr>
	  <tr>
		
      <td height="46"> 
        <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="33" class="titletable">&nbsp;<b>Cambiar Clave</b></td>
          </tr>
        </table>
		</td>
	  </tr>
	</table><br>

  <table width="400" border="0" cellspacing="0" cellpadding="1" align="center">
    <tr>
      <td>
        <table width="400" border="0" cellspacing="1" cellpadding="2" align="center" >
          <?php
          	if ($error){
          		echo "<tr class='Normal'>";
			  	echo "<td class='Normal' colspan='2' align='center'><b>$error</b></td>";
          		echo "</tr>";
          	}
          ?>
          <tr class="Normal"> 
            <td class="Normal">* Clave Actual:</td>
            <td> 
              <input type="password" name="clave_actual" class="textfields" size="20" maxlength="8">
            </td>
          </tr>
          <tr class="Normal"> 
            <td>* Nueva Clave:</td>
            <td> <?$c_password = new Password;
				print $c_password->Password ("clave_nueva", "Nueva Clave", 1, "", "textfields", 20, 8, "", "");?> 
            </td>
          </tr>
          <tr class="Normal"> 
            <td>* Confirmar Nueva Clave:</td>
            <td> <?$c_password = new PasswordConfirm;
				print $c_password->PasswordConfirm ("clave_nueva_conf", "Confirmar Nueva Clave", "clave_nueva" , 1, "", "textfields", 20, 8, "", "");?> 
            </td>
          </tr>
          <tr align="center"> 
            <td height="45" colspan="2"> 
              <input type="submit" name="Submit" value="Aceptar" class="buttons">         
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
  <input type="hidden" name="accion" value="cambiar_clave">
  <input type="hidden" name="actualizar" value="1">
</form>
<?include("includes/general/pie.php");?>
</body>
</html>
