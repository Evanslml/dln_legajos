<?php

echo password_hash('password',PASSWORD_DEFAULT,array(
	'cost'=>12,
	'salt'=>'1111111111111111111111'
	)
);

echo '<br>';
//$clave_crypt = crypt($pass, $salt);



$Permiso[]='';

var_dump($Permiso);


$url= "00000001";
$url01=base64_encode($url);

echo $url01.'<br>';

$url02=base64_decode($url01);

echo $url02.'<br>';



echo base64_decode("MTUzODU5ODM5MF8wMDAwMDAwM18wMV9kb2N1bWVudG9fZWplbXBsby5wZGY=").'<br>';
echo "1538598390_00000003_01_documento_ejemplo.pdf".'<br>';
echo base64_encode("1538598390_00000003_01_documento_ejemplo.pdf").'<br>';
echo "MTUzODU5ODM5MF8wMDAwMDAwM18wMV9kb2N1bWVudG9fZWplbXBsby5wZGY=".'<br>';


$var= "1538598390_00000003_01_documento_ejemplo.pdf";
$porciones = explode("_", $var);

echo $porciones[0].'<br>';
echo $porciones[1].'<br>';
echo substr($var,23);
?>