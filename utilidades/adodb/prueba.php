<?php



include_once('adodb.inc.php');
include_once('adodb-pager.inc.php');
include_once('adodb-active-record.inc.php');


session_start();
$db = NewADOConnection('mysql');
$db->Connect('localhost','root','','cadbox2');
$sql = "select * from pruebas ";
$pager = new ADODB_Pager($db,$sql);
$pager->Render($rows_per_page=2);


$db->debug=1;
ADOdb_Active_Record::SetDatabaseAdapter($db);


class Prueba extends ADOdb_Active_Record{}
$prueba = new Prueba();

echo "<p>Output of getAttributeNames: ";
var_dump($prueba->getAttributeNames());





?>

