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

echo $url02;





?>