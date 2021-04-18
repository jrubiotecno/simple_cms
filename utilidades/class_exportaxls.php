<?

//Para su uso gratis debe existir este encabezado
        //////////////////////////////////////////////////////////////
   //genXLS Class v1.0 (Generador de archivos excel)           //
  //Octubre 23 de 2001                                        //
 //Derechos de autor Ariel Patiño aamultimedia@hotmail.com //
//////////////////////////////////////////////////////////////
//Modo de uso Ej:
//$mi_xls = new genXLS("este_nombre_de_archivo");
//$mi_xls->genXLS_insNumero($mi_xls->fila,$mi_xls->columna,123);
//$mi_xls->genXLS_insBlank($mi_xls->fila+1,$mi_xls->columna);
//$mi_xls->genXLS_insTexto($mi_xls->fila+1,$mi_xls->columna,"hola");
//$mi_xls->genXLS_enviaXls();
//
//A continuación lo explicare linea por linea
//Aquí creamos una instancia llamada $mi_xls y le asignamos un nombre al archivo "este_nombre_de_archivo"
//$mi_xls = new genXLS("este_nombre_de_archivo");
//Aquí vamos a insertar un número con el metodo $my_sql->genXLS_insNumero($fila,$columna,$valor)
//el numero a insertar es 123, en la fila $mi_xls->fila y columna $mi_xls->columna
//Estas 2 propiedades van guardando la fila y la columna actual y están inicializadas en 0.
//$mi_xls->genXLS_insNumero($mi_xls->fila,$mi_xls->columna,123);
//Con este metodo $mi_xls->genXLS_insBlank($fila,$columna) insertamos una celda en blanco
//$mi_xls->genXLS_insBlank($mi_xls->fila+1,$mi_xls->columna);
//Con este metodo $mi_xls->genXLS_insTexto($fila,$columna,$texto) insertamos una celda con texto
//$mi_xls->genXLS_insTexto($mi_xls->fila+1,$mi_xls->columna,"hola");
//Con este metodo $mi_xls->genXLS_enviaXls(); se finaliza el archivo excel y se envía
//automáticamente al usuario
//$mi_xls->genXLS_enviaXls();
//Proximamente se podrá escribir el archivo en un archivo fisico
//y colocarle colores a las celdas(si es que logro decifrar esa parte)
class genXLS
{
        //propiedades
        var $nombre;
        var $contenido;
        var $fila;
        var $columna;

        //metodos
        function genXLS($v_nombre_archivo)
        {
                $this->nombre = $v_nombre_archivo;
                $this->contenido = $this->genXLS_BOF();
                $this->fila = 0;
                $this->columna = 0;
        }
        function genXLS_BOF()
        {
                //encabezado basico
                //return pack("ssss", 0x0409, 0x0004, 0x4, 0x10);
                return pack("s*", 0x0809, 0x0010,0x6 ,0x10 ,0x0e1c ,0x07cc ,0x00c9 ,0x0000,0x0006 ,0x0000);
        }
        function genXLS_EOF()
        {
                return pack("ss", 0x000A, 0x0000);
        }
        function genXLS_NuevaFila()
        {
                $this->fila = $this->fila+1;
                $this->columna = 0;
        }
        function genXLS_NuevaColumna()
        {
                $this->columna = $this->columna+1;
        }
        function genXLS_insBlank($fila,$columna)
        {
                $this->contenido.= pack( "s*", 0x0201, 6, $fila, $columna, 0x0000);
                $this->fila = $fila;
                $this->columna = $columna;
        }
        function genXLS_insNumero($fila,$columna,$valor)
        {
                $this->contenido.= pack( "sssssd", 0x0203, 14, $fila, $columna, 0x0000, $valor );
                $this->fila = $fila;
                $this->columna = $columna;
        }
        function genXLS_insTexto($fila,$columna, $valor)
        {
                $longitud = strlen($valor);
                if($longitud > 255)
                {
                        $longitud = 255;
                        $valor = substr($valor,0,$longitud);
                }
                $this->contenido.= pack( "s*", 0x0204, 8 + $longitud, $fila, $columna, 0x07, $longitud );
                $this->contenido.= $valor;
                $this->fila = $fila;
                $this->columna = $columna;
        }
        function genXLS_enviaXls()
        {
            $this->contenido .= $this->genXLS_EOF();
            header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
            header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
            header ( "Cache-Control: no-cache, must-revalidate" );
            header ( "Pragma: no-cache" );
            header ( "Content-type: application/x-msexcel" );
            header ( "Content-Disposition: attachment; filename=".$this->nombre );
            header ( "Content-Description: Generador XLS" );
            print $this->contenido;
         }
}

/*
Modificado por C. Camargo versión para Postgres
*/

$p_query = str_replace ("\\", "", $p_query);
include "db_psql.php";
$db = new DB_Psql;
$db->query($p_query);
if($db->next_row()) {
        if($p_archivo == "") $p_archivo = "temp.xls";
        $mi_xls = new genXLS($p_archivo);
        $numero_campos=$db->num_fields();
        for ($i=0;$i<$numero_campos;$i++){
               print $db->get_field($i)."<br>";
                $mi_xls->genXLS_insTexto($mi_xls->fila,$mi_xls->columna,$db->get_field_name($i));
                $mi_xls->genXLS_NuevaColumna();
        }
        $mi_xls->genXLS_NuevaFila();
        while($db->next_row())
        {
                for($i=0;$i<$numero_campos;$i++)
                {
                        $mi_xls->genXLS_insTexto($mi_xls->fila,$mi_xls->columna,get_field_name($i));
                        $mi_xls->genXLS_NuevaColumna();
                }
                $mi_xls->genXLS_NuevaFila();
        }
        $mi_xls->genXLS_enviaXls();
}
?>