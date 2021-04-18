<div id="contentErrorLogueo" style="display:none">
  <table width="203" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td height="15" align="right" class="txt_registro"><img src="./images/campeonato/sup_alerta.gif" width="203" height="15"  alt="imagen_superior"/></td>
    </tr>
    <tr>
      <td align="center" style="background-image: url(./images/campeonato/fond_alerta.gif)" class="txt_registro"><div id="msjErrorLogueo"></div></td>
    </tr>
    <tr>
      <td align="center" class="txt_registro"><img src="./images/campeonato/inf_alerta.gif" width="203" height="11" alt="imagen_inferior"/></td>
    </tr>
  </table>
</div>

<div id="sup_registro">
<table width="294" border="0" cellspacing="0" cellpadding="0">
<tr>
  <td><a href="#" onfocus="if(this.blur)this.blur()"><img src="./images/campeonato/tit_nuevos.gif" alt="Pacientes nuevos" width="287" height="55" border="0" /></a></td>
</tr>
</table>
</div>
<div id="registro_fond">
  <table width="287" border="0" cellpadding="0" cellspacing="0">
    <tr>
      <td width="8%" align="left">&nbsp;</td>
      <td width="42%" align="center">
        <input name="textfield2" type="text" class="campo_ingreso" id="usuario" value="" />
      </td>
      <td width="40%" align="left"><input name="clave" type="password" class="campo_ingreso" id="clave" /></td>
      <td width="10%" align="left"><a href="#" onclick="javascript:loguear();"><img src="./images/campeonato/bot_registro.gif" alt="Ir" width="24" height="24" border="0" /></a></td>
    </tr>
    <tr>
      <td height="72">&nbsp;</td>
      <td colspan="3" class="txt_registro"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="34" valign="top"><img src="imagenes/bullet_rojo.gif" alt="" width="4" height="10" /></td>
          <td width="55%" align="left" valign="top" class="txt_registro">Si usted ya es nuestro <br />
            paciente, ingrese sus datos.</td>
          <td width="5%" align="left" class="txt_registro">&nbsp;</td>
          <td width="36%" align="left" class="txt_recordar"><a onclick="formRecordarClave();" href="#" class="txt_recordar">Recordar clave</a></td>
        </tr>
        <tr>
          <td width="4%" height="34" align="center" valign="baseline">&nbsp;</td>
          <td colspan="3" align="center" class="txt_registro"><a href="#"><img src="./images/campeonato/bot_paciente_nuevo.gif" alt="Si usted a&uacute;n no es paciente nuestro&sbquo; haga clic aqui" width="165" height="24" border="0" /></a></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>

<div id="registro_sombra"><img src="./images/campeonato/sombra_registro.gif" width="287" height="16" alt="subtitulo_registro"/></div>

<div id="ligthbox" style="display:none">
  <table width="401" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="290"><img src="./images/campeonato/tit_lightbox.gif" alt="Recordar clave" width="290" height="49" /></td>
      <td width="111"><a href="#" onclick="document.getElementById('fade').style.display='none';Effect.BlindUp('ligthbox'); return false;"><img src="./images/campeonato/cerrar_lightbox.gif" alt="Cerrar" width="111" height="49" border="0" /></a></td>
    </tr>
    <tr>
      <td height="155" colspan="2" valign="top" style="background-image: url(./images/campeonato/fond_lightbox.gif)"><table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><table width="57%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="30" colspan="3" align="center" class="txt_registro" id="msjError"></td>
            </tr>
            <tr>
              <td width="39%" align="right" class="txt_registro">Digite su su e-mail</td>
              <td width="2%">&nbsp;</td>
              <td width="59%"><input name="email" type="text" class="campo_ingreso" id="email" /></td>
            </tr>
            <tr>
              <td colspan="3" align="center" class="txt_registro">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center" class="txt_registro"><a href="#" onclick="recordarClave();"><img src="./images/campeonato/bot_enviar.gif" alt="Enviar" width="66" height="17" border="0" /></a></td>
            </tr>
          </table></td>
        </tr>
      </table></td>
    </tr>
  </table>
</div>
	
