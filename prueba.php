<?php

$user="Sies_consul";
$pass="R5t@D1r152017";
//$serverName = "localhost"; //serverName\instanceName
$serverName = "172.16.0.3,1433\FINAL"; //serverName\instanceName
$bd = "GESDOC";

// Puesto que no se han especificado UID ni PWD en el array  $connectionInfo,
// La conexión se intentará utilizando la autenticación Windows.
$connectionInfo = array( 
	"Database"=>"$bd",
	"UID"=>"$user", 
	"PWD"=>"$pass");

$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
     echo "Conexión establecida.<br />";
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}
?>