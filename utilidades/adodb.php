<?php

/*

ARCHIVO

        adodb.php



DESCRIPCION

    Clase para utilizar la el framework de ADODB

    Clases:        ADODB



HISTORIA



   Autor             fecha           Comentarios

  -------            -------         -------------

   S. Trujillo        09/10/2003    Creaci�n

*/




/**

 * Clase ADODB

 * @author Sebasti�n Trujillo

 */

require_once("adodb/adodb.inc.php");
class ADODB

{

    var $Host     = "";

    var $Database = "";

    var $User     = "";

    var $Password = "";

    var $R        = array();

    var $Row;

    var $Errno    = 0;

    var $Error    = "";

    var $Link_ID  = 0;

    var $ResultSet = 0;

    var $DbType   = "";

    var $NumRows = 0;

    var $adodb;

    var $EOF;

    var $ErrorNotification = 1;

    var $Query;

   var $LastId;



   function disableErrorNotification() {

     $this->ErrorNotification = 0;

   }



   function enableErrorNotification() {

     $this->ErrorNotification = 1;

   }



   function getErrno() {

     return $this->Errno;

   }



   /**

     * Constructor de la clase

     * @param $query  par�metro con el query (opcional)

     */

    function ADODB($query = "")

    {

	  Global $CONF;

      $this->User     = $CONF['CONF_DB_USER'];

      $this->Password = $CONF['CONF_DB_PASS'];

      $this->Host     = $CONF['CONF_DB_HOST'];

      $this->Database = $CONF['CONF_DB_NAME'];

      $this->DbType = $CONF['CONF_DB_TYPE'];

      $this->connect();



      //      $this->adodb = NewADOConnection($this->DbType);

        if($query!=""){

           $this->query($query);

        }



    }



   /**

     * Funci�n para conectarse con la base de datos

     * @param $Database  par�metro con el nombre de la base de datos (opcional)

     * @param $Host  par�metro con el host de la base de datos (opcional)

     * @param $User  par�metro el usuario de la base de datos (opcional)

     * @param $Password  par�metro la contrase�a del usuario de la base de datos (opcional)

     */

    function connect($Database = "", $Host = "", $User = "", $Password = null, $Type="", $Persistent=false)

    {

        if ("" != $Database)

         $this->Database = $Database;

        if ("" != $Host)

         $this->Host = $Host;

        if ("" != $User)

         $this->User = $User;

        if ($Password != null)

         $this->Password = $Password;

        if ($Type!="" )

            $this->DbType=$Type;

        $this->adodb = NewADOConnection($this->DbType);

            if($Persistent){

               $this->Link_ID = $this->adodb->PConnect($this->Host, $this->User, $this->Password, $this->Database);

            }else{

               $this->Link_ID = $this->adodb->Connect($this->Host, $this->User, $this->Password, $this->Database);

            }

//            print "<hr>".$this->Host.$this->User.$this->Password.$this->Database."<hr>";

            if (!$this->Link_ID)

            {

                $this->halt("Database Connect($Host, $User, \$Password, $Database) failed.");

                return 0;

            }

        return $this->Link_ID;

    }



   /**

     * Funci�n para liberar la memoria

     */

    function free()

    {

      $this->ResultSet = 0;

      $this->adodb = NewADOConnection($this->DbType);

    }



   /**

     * Funci�n para ejecutar el query en la base de datos

     * @param $Query_String  par�metro con el query

     */

    function query($Query_String)

    {

        if ($Query_String == "")

            return 0;

        if (!is_object($this->adodb))

           return 0;



        /*if (Is_Object($this->ResultSet))

        {

         $this->ResultSet = $this->adodb->Execute($Query_String);

        } */

      $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

      $this->Query = $Query_String;

      $this->ResultSet = $this->adodb->Execute($this->Query);

     $this->LastId = $this->adodb->Insert_ID();

      if (is_object($this->ResultSet))

      {

            $this->NumRows = $this->ResultSet->RowCount();

      }



        $this->Row = 0;

        $this->Errno = $this->adodb->ErrorNo();

        $this->Error = $this->adodb->ErrorMsg();

        if (!Is_Object($this->ResultSet))

            $this->halt("Invalid SQL: ".$Query_String);



      if (Is_Object($this->ResultSet))

           return 1;

      else

         return 0;

    }



   /**

     * Funci�n para ejecutar el query en la base de datos

     * @param $Query_String  par�metro con el query

     */

    function selectLimit($Query,$num_results,$offset)

    {



      $Query_String = $Query;

      if ($Query_String == "")

          return 0;

      if (!is_object($this->adodb))

          return 0;

      $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

      $this->Query = $Query_String;

      $this->ResultSet = $this->adodb->SelectLimit($this->Query,$num_results,$offset);

      if (is_object($this->ResultSet))

      {

            $this->NumRows = $this->ResultSet->RowCount();

      }



        $this->Row = 0;

        $this->Errno = $this->adodb->ErrorNo();

        $this->Error = $this->adodb->ErrorMsg();

        if (!Is_Object($this->ResultSet))

            $this->halt("Invalid SQL: ".$Query_String);



      if (Is_Object($this->ResultSet))

           return 1;

      else

         return 0;

         $this->query=$Query;

    }





   /**

     * Funci�n para traer la proxima fila

     */

    Function Next_Row()

    {
        If($this->ResultSet->EOF)

        {

            $this->halt("next_record called with no query pending.");

            Return 0;

        }

        If(Is_Object($this->ResultSet))

      {

         ForEach($this->ResultSet->fields As $FieldName => $FieldValue)

            If(!Is_Numeric($FieldName)){

              $FieldName =  preg_replace( "/\*|\)|\(|\+|\-|\/|\^|\./", "_", $FieldName );

              @Eval("\$this->".$FieldName."=Base64_Decode(\"".Base64_Encode($FieldValue)."\");");

            }

         //print " <br>(Set) ";

      }

      ElseIf($this->Query)

      {

         print "$this->Query";

         $rs = $this->adodb->Execute($this->Query);

         ForEach($rs->fields As $FieldName => $FieldValue)

            If(!Is_Numeric($FieldName))

               Eval("UnSet(\$this->".$FieldName.");");

      }



        $this->Row   += 1;

        $this->Errno = $this->adodb->ErrorNo();

        $this->Error = $this->adodb->ErrorMsg();

        $this->R = $this->ResultSet->fields;

        $this->ResultSet->MoveNext();



      If(!$this->ResultSet->EOF or $this->Row == 1)

         $this->EOF = 1;

      Else

         $this->EOF;

      Return $this->EOF;



    }



   /**

     * Funci�n para obtener el n�mero de filas del query

     */

   Function Num_Rows() { Return $this->NumRows; }



   /**

     * Funci�n para obtener el n�mero de los campos del query

     */

    Function Num_Fields() { Return $this->ResultSet->FieldCount(); }



   /**

     * Funci�n para obtener el valor del campo con el nombre espec�fico

     * @param $Name  par�metro con el nombre del campo

     */

    Function Get_Field($Name) { Return $this->ResultSet->fields[$Name]; }





   /**

     * Funci�n para obtener un arreglo con los tipos de los campos que trae un query

     * @param $Query  par�metro con la consulta sql de la cual se quieren obtener los campos

     */

    Function GetFieldTypes($Query = "")

   {

      $campos = Array();

      If($Query == "")

         $Query = $this->Query;

      If(!Is_Object($this->ResultSet))

         $this->Query($Query);

      /*ForEach($this->ResultSet->fields As $FieldName => $FieldValue)

            If(!Is_Numeric($FieldName))

               $campos[Base64_Decode(Base64_Encode($FieldName))] =Base64_Decode(Base64_Encode($FieldName));*/

      For($i = 0; $i < count($this->ResultSet->fields)/2; $i++)

      {

         $fld = $this->ResultSet->FetchField($i);

           $type = $this->ResultSet->MetaType($fld->type);

         $campos[Base64_Decode(Base64_Encode($fld->name))] = $type;

      }



      Return $campos;

   }





   /**

     * Funci�n para obtener un arreglo con el nombre de los campos que trae un query

     * @param $Query  par�metro con la consulta sql de la cual se quieren obtener los campos

     */

    Function GetFieldNames($Query = "")

   {

      $campos = Array();

      If($Query == "")

         $Query = $this->Query;

      If(!Is_Object($this->ResultSet))

         $this->Query($Query);

      For($i = 0; $i < count($this->ResultSet->fields)/2; $i++)

      {

         $fld = $this->ResultSet->FetchField($i);

           $type = $this->ResultSet->MetaType($fld->type);

         $campos[] = Base64_Decode(Base64_Encode($fld->name));

      }



      Return $campos;

   }



   /**

     * Funci�n para parar la ejecuci�n de la clase

     * @param $msg  par�metro con el mensaje para mostrar al usuario

     */

    function halt($msg)

    {

      If($msg And $this->Errno And $this->Error)

        print "$msg<br><u>Error #$this->Errno</u>: $this->Error";

    }



   /**

     * Funci�n para cerrar la conexi�n con la base de datos

     */

    function close()

    {

       $this->free();

        //$this->ResultSet->Close();

    }

}



?>