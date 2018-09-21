<?php
//cargamos el index.php desde una carpeta publica
routes(1,22);
//var_dump(routes(1,22));
if( empty($_Permisos_p)) {
	header ('Location: ./error'); //Error
} else{

	if(!empty($_Permisos_p[1][0])){ $a_men='1';}else{ $a_men='0';;}
	if(!empty($_Permisos_p[2][0])){ $a_ver='1';}else{ $a_ver='0';;}
	if(!empty($_Permisos_p[3][0])){ $a_cre='1';}else{ $a_cre='0';;}
	if(!empty($_Permisos_p[4][0])){ $a_act='1';}else{ $a_act='0';;}
	if(!empty($_Permisos_p[5][0])){ $a_eli='1';}else{ $a_eli='0';;}
	include('public/index/BandejaEntrada.php');
}

?>